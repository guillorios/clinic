<?php

namespace App;

use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'dob', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates =[
        'dob',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     //.Relaciones.

     Public function permissions(){
        return $this->belongsToMany('App\Permission');
    }

    public function roles(){
        return $this->belongsToMany('App\Role')->withTimestamps();

    }

    public function specialities(){
        return $this->belongsToMany('App\Speciality')->withTimestamps();
    }

    public function invoices(){
        return $this->hasMany('App\Invoice');
    }

    public function appointments(){
        return $this->hasMany('App\Appointment');
    }

    public function clinic_datas()
    {
        return $this->hasMany('App\ClinicData');
    }

    public function clinic_notes()
    {
        return $this->hasMany('App\ClinicNote');
    }

    public function doctor_schedules()
    {
        return $this->hasMany('App\DoctorSchedule');
    }

    public function disable_dates()
    {
        return $this->hasMany('App\DisableDate');
    }

    public function disable_times()
    {
        return $this->hasMany('App\DisableTime');
    }

    //.Almacenamiento.

    public function store($request){
        $user = self::create($request->all());
        $user->update(['password' => Hash::make($request->password)]);
        $roles = [$request->role];
        $user->role_assignment(null, $roles);
        alert('Exito', 'Usuario creado con exito', 'success');
        return $user;
    }

    public function my_update($request){
        self::update($request->all());
        alert('Exito', 'Usuario actualizado con exito', 'success');
    }

    public function role_assignment($request, array $roles = null){
        $roles = (is_null($roles)) ? $request->roles : $roles ;
        $this->permission_mass_assignment($roles);
        $this->roles()->sync($roles);
        $this->verify_permission_integrity($roles);
        alert('Exito', 'Roles asignados', 'success');
    }

    //.Validación.

    public function is_admin($id){
        $admin = config('app.admin_role');
        if($this->has_role($admin)){
            return true;
        } else {
            return false;
        }
    }


    public function has_role($id){
        foreach ($this->roles as $role){
            if ($role->id == $id || $role->slug == $id) return true;
        }
        return false;
    }

    public function has_any_role(array $roles){
        foreach ($roles as $role) {
            if($this->has_role($role)) return true;
        }
        return false;
    }

    public function has_permission($id){
        foreach ($this->permissions as $permission){
            if ($permission->id == $id || $permission->slug == $id) return true;
        }
        return false;
    }

    public function has_speciality($id){
        foreach ($this->specialities as $speciality){
            if ($speciality->id == $id) return true;
        }
        return false;
    }


    //.Recuperación.de.Información

    public function age(){

        if(!is_null($this->dob)){
            $age = $this->dob->age;
            $years = ($age == 1 ) ? 'año' : 'años';
            $msj = $age . ' '. $years;
        }else{
            $msj = 'indefinido';
        }

        return $msj;

    }

    public function visible_users(){
        if($this->has_role(config('app.admin_role'))){
            $users = self::all();
        }elseif($this->has_role(config('app.secretary_role'))) {
            $users = self::whereHas('roles', function($q){
                $q->whereIn('slug', [
                    config('app.doctor_role'),
                    config('app.patient_role'),
                ]);
            })->get();
        }elseif($this->has_role(config('app.doctor_role'))) {
            $users = self::whereHas('roles', function($q){
                $q->whereIn('slug', [
                    config('app.patient_role'),
                ]);
            })->get();
            return $users;
        }
        return $users;
    }

    public function visible_roles(){
        if($this->has_role(config('app.admin_role'))) $roles = Role::all();
        if($this->has_any_role([config('app.secretary_role'), config('app.doctor_role')])) {
            $roles = Role::where('slug', config('app.patient_role'))
                          ->orWhere('slug', config('app.doctor_role'))
                          ->get();
        }
        return $roles;
    }

    public function list_roles(){
        $roles = $this->roles->pluck('name')->toArray();
        $string = implode(', ', $roles );
        return $string;
    }

    public function list_specialities(){
        $specialities = $this->specialities->pluck('name')->toArray();
        $string = implode(', ', $specialities );
        return $string;
    }

    public function clinic_data_array()
    {
        $datas = $this->clinic_datas->pluck('value','key')->toArray();
        return $datas;
    }

    public function clinic_data($key, $array = null, $default = null)
    {
        $array = (!is_null($array)) ? $array : $this->clinic_data_array();
        if(array_key_exists($key, $array)){
            $value = $array[$key];
        }else{
            $value = $default;
        }
        return $value;
    }

    //.Otras.Operaciones

    public function verify_permission_integrity(array $roles){

        $permissions = $this->permissions;
        foreach ($permissions as $permission) {
            if (!in_array($permission->role->id, $roles)) {
                $this->permissions()->detach($permission->id);
            }
        }
    }

    public function permission_mass_assignment(array $roles){

        foreach ($roles as $role) {
            if (!$this->has_role($role)) {
                $role_obj = \App\Role::findOrFail($role);
                $permissions= $role_obj->permissions;
                $this->permissions()->syncWithoutDetaching($permissions);
            }
        }

    }

    public function edit_view($view = null){

        $auth = auth()->user();

        if (!is_null($view) && $view == 'frontoffice') {
            return 'theme.frontoffice.pages.user.edit';
        }else if($auth->has_any_role([config('app.admin_role'), config('app.secretary_role')])){
            return 'theme.backoffice.pages.user.edit';
        }else {
            abort(404);
        }

    }

    public function user_show($view= null){
        $auth = auth()->user();
        if (!is_null($view) && $view == 'frontoffice') {
            return 'frontoffice.user.profile';
        }else if($auth->has_any_role([config('app.admin_role'), config('app.secretary_role')])){
            return 'backoffice.user.show';
        }else {
            return 'frontoffice.user.profile';
        }
    }

    public function days_off()
    {
        $days_off = $this->disable_dates()->where('key', 'days_off')->first();
        if(!is_null($days_off)){
            return $days_off->value;
        }else{
            return null;
        }
    }

    public function hours()
    {
        $hours = $this->disable_times()->where('key', 'hours')->first();
        if(!is_null($hours)){
            return $hours->value;
        }else{
            return null;
        }
    }

    public function doctor_appointments()
    {
        return $this->hasMany('App\Appointment', 'doctor_id');
    }

}

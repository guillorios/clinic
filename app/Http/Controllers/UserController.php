<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\ChangePasswordRequest;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        /* $this->middleware('role:' . config('app.admin_role')); */
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', User::class);
        return view('theme.backoffice.pages.user.index', [
            'users' => auth()->user()->visible_users(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        return view('theme.backoffice.pages.user.create', [
            'roles' => auth()->user()->visible_roles(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, User $user)
    {
        $user = $user->store($request);
        return redirect()->route('backoffice.user.show', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('theme.backoffice.pages.user.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $view = (isset($_GET['view'])) ? $_GET['view'] : null;
        return view($user->edit_view($view), [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        $user->my_update($request);
        $view = (isset($_GET['view'])) ? $_GET['view'] : null;
        return redirect()->route($user->user_show($view), $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        alert('Exito', 'Usuario eliminado', 'success');
        return redirect()->route('backoffice.user.index');
    }

    /* Mostrar formulario para asignar role */

    public function assign_role(User $user)
    {
        $this->authorize('assign_role', $user);
        return view('theme.backoffice.pages.user.assign_role', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    /* Asignar los roles en la base de datos */

    public function role_assignment(Request $request, User $user)
    {
        $this->authorize('assign_role', $user);
        $user->role_assignment($request);
        return redirect()->route('backoffice.user.show', $user);

    }

    /* Mostrar formulario para asignar permisos */

    public function assign_permission(User $user)
    {
        $this->authorize('assign_permission', $user);
        return view('theme.backoffice.pages.user.assign_permission', [
            'user' => $user,
            'roles' => $user->roles,
        ]);
    }
    /* Asignar los permisos en la base de datos */

    public function permission_assignment(Request $request, User $user)
    {
        $this->authorize('assign_permission', $user);
        $user->permissions()->sync($request->permissions);
        alert('Exito', 'Permisos asignados', 'success');
        return redirect()->route('backoffice.user.show', $user);

    }

    /* Mostrar formulario para importar los usuarios */

    public function import(User $user){
        $this->authorize('import', $user);
        return view('theme.backoffice.pages.user.import');

    }

    /* Importar usuarios de una hoja de excel */

    public function make_import(Request $request, User $user){

        $this->authorize('import', $user);
        Excel::import(new UsersImport, $request->file('excel'));
        alert('Exito', 'Usuarios importados', 'success');
        return redirect()->route('backoffice.user.index');

    }

    /* Funcion para los perfiles de pacientes */
    public function profile()
    {
        $user = auth()->user();
        return view('theme.frontoffice.pages.user.profile',[
            'user' => $user,
        ]);
    }

    public function edit_password(){
        $this->authorize('update_password', auth()->user());
        return view('theme.frontoffice.pages.user.edit_password');
    }

    public function change_password(ChangePasswordRequest $request){
        $request->user()->password = Hash::make($request->password);
        $request->user()->save();
        alert('Exito', 'Contraseña actualizada', 'success');
        return redirect()->back();
    }



}

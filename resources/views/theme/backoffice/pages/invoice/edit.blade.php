@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar factura de : '. $invoice->id)

@section('head')
@endsection

@section('breadcrumbs')
    <li class="active">Editar factura {{ $invoice->id }}</li>
@endsection

@section('dropdown_settings')
    {{-- <li><a href="{{ route('backoffice.invoice.create') }}" class="grey-text text-darken-2">Crear factura</a></li> --}}
@endsection

@section('content')

<section id="content">
    <!--start container-->
    <div class="container">
        <div class="section">
            <p class="caption">Introduce los datos para editar la factura.</p>
            <div class="divider"></div>
            <!--Basic Form-->
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Editar Permiso</span>
                                <div class="row">
                                    <form class="col s12" method="POST" action="{{ route('backoffice.patient.invoice.update', [$user, $invoice]) }}">
                                        @csrf
                                        <div class="row">
                                            <div class="input-field col s12">
                                            <input id="amount" type="text" name="amount" value="{{ $invoice->amount }}">
                                            <label for="amount">Monto de la factura</label>
                                            @if ($errors->has('amount'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $errors->first('amount') }}</strong>
                                                </span>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <select name="status" id="">
                                                    <option value="pending"   @if($invoice->status == 'pending') selected @endif>Pendiente</option>
                                                    <option value="approved"  @if($invoice->status == 'approved') selected @endif>Pagado</option>
                                                    <option value="rejected"  @if($invoice->status == 'rejected') selected @endif>Rechazado</option>
                                                    <option value="cancelled" @if($invoice->status == 'cancelled') selected @endif>Cancelado</option>
                                                    <option value="refunded"  @if($invoice->status == 'refunded') selected @endif>Devuelto</option>
                                                </select>
                                                @if ($errors->has('status'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color:red">{{ $errors->first('status') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button class="btn waves-effect waves-light right" type="submit">ACTUALIZAR
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('foot')

@endsection

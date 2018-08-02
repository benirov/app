@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')
<style type="text/css">
  .sans-serif {
    font-family: fa5-proxima-nova,"Helvetica Neue",Helvetica,Arial,sans-serif;
</style>

<body class="hold-transition register-page">
    <div id="app">
        <div class="container-fluid">
          @include('adminlte::layouts.partials.modal')
            <div class="row">
                <div class="register-logo">
                    <b>Registrate</b>
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                    <div class="register-box-body">
                        <form id="formUser" action="{{ secure_url('/company') }}" method="post">
                          <div class="userInfo">
                            <center><label class="sans-serif"  for=""><h3><b>datos de cliente</b><h3></label></center>
                            <br>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="txtname"><b>{{ trans('message.fullname') }}</b></label>
                                         <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input id="txtname" type="text" class="form-control  Requerido  RegNombre" placeholder="{{ trans('message.fullname') }}" name="nameclient" value="{{ old('nameclient') }}" required/>
                                         </div>
                                        <span for="txtname" class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="txtlastname"><b>{{ trans('message.lastname') }}</b></label>
                                         <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input id="txtlastname" type="text" class="form-control  RegApellido" placeholder="{{ trans('message.lastname') }}" name="lastnameclient" value="{{ old('lastnameclient') }}"/>
                                         </div>
                                        <span for="txtlastname" class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Datos de documentos -->

                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="txttypedoc"><b>{{ trans('message.typedocument') }}</b></label>
                                         <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                              <select id="txttypedoc" class="form-control  Requerido"  name="typedoc">
                                              </select>
                                         </div>
                                        <span for="txttypedoc" class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="txtdocument"><b>{{ trans('message.document') }}</b></label>
                                         <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                                            <input id="txtdocument" type="text" class="form-control   Requerido RegNumsimple" placeholder="{{ trans('message.document') }}" name="lastname"/>
                                         </div>
                                        <span for="txtdocument" class="help-block"></span>
                                    </div>
                                </div>
                            </div>


                            <!-- fecha de nacimiento y sexo-->

                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="txtbirth"><b>{{ trans('message.birth') }}</b></label>
                                         <div class="input-group">
                                            <span class="input-group-addon"><i class="fas fa-calendar-alt"></i></span>
                                              <input id="txtbirth" type="text" class="form-control   Requerido" placeholder="{{ trans('message.document') }}" name="birth"/>
                                         </div>
                                        <span for="txtbirth" class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="txtsex"><b>{{ trans('message.sex') }}</b></label>
                                         <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                                              <select id="txtsex" class="form-control  Requerido"  name="typedoc">
                                              </select>
                                         </div>
                                        <span for="txtsex" class="help-block"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="txtage"><b>{{ trans('message.age') }}</b></label>
                                         <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input id="txtage" type="number" class="form-control  RegNumsimple" placeholder="{{ trans('message.age') }}" name="age" value="{{ old('age') }}"/>
                                         </div>
                                        <span for="txtage" class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="txtemail"><b>{{ trans('message.email') }}</b></label>
                                         <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                             <input id="txtemail" type="email" class="form-control  Requerido  RegCorreo" placeholder="{{ trans('message.email') }}" name="email" value="{{ old('email') }}" />
                                         </div>
                                        <span for="txtemail" class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="txtpassword"><b>{{ trans('message.password') }}</b></label>
                                         <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                             <input id="txtpassword" type="password" class="form-control  Requerido  RegClave" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                                         </div>
                                        <span for="txtpassword" class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="txtpasswordconfirmation"><b>{{ trans('message.password') }}</b></label>
                                         <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                             <input id="txtpasswordconfirmation" type="password" class="form-control  Requerido  RegClave" placeholder="{{ trans('adminlte_lang::message.retrypepassword') }}" name="password_confirmation" />
                                         </div>
                                        <span for="txtpasswordconfirmation" class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="txttypeuser"><b>{{ trans('message.typeuser') }}</b></label>
                                         <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-users-cog"></i></span>
                                             <select id="txttypeuser" class="form-control  Requerido"  name="typeUser">
                                                        @foreach ($typeUser as $users)
                                                                <option value="{{ $users->id }}">{{ $users->name }}</option>
                                                            <p>This is user {{ $user->id }}</p>
                                                        @endforeach

                                                  <!-- <option value="1">Administrador</option>
                                                  <option value="2">Cliente</option> -->
                                            </select>
                                         </div>
                                        <span for="txttypeuser" class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class=infoCompany>
                            <center><label for=""><h3><b>datos de empresa</b><h3></label></center>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="txtnamecompany"><b>{{ trans('message.nickcompany') }}</b></label>
                                         <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                             <input id="txtnamecompany" type="text" class="form-control  Requerido  RegDescrip" placeholder="{{ trans('message.nickcompany') }}" name="namecompany" value="{{ old('name') }}" required/>
                                         </div>
                                        <span for="txtnamecompany" class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="txturl"><b>{{ trans('message.url') }}</b></label>
                                         <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                             <input id="txturl" type="text" class="form-control  Requerido  RegNombreDominio" placeholder="{{ trans('message.url') }}" name="url" value="{{ old('url') }}" required/>
                                         </div>
                                        <span for="txturl" class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <br>
                            <div class="row">
                                <!-- <div class="col-xs-1">
                                    <label>
                                        <div class="checkbox_register icheck">
                                            <label>
                                                <input type="checkbox" name="terms">
                                            </label>
                                        </div>
                                    </label>
                                </div> -->
                                <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
                                  <center>
                                      <button id="InsertUser" type="button" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.register') }}</button>
                                  </center>
                                </div><!-- /.col -->
                            </div>
                        </form>
                        <br>
                        <center>
                          <a href="{{ url('/login') }}" class="text-center">{{ trans('message.Login') }}</a>
                        <center>
                    </div><!-- /.form-box -->
                </div>
            </div><!-- /.register-box -->
        </div>
    </div>

    @include('adminlte::layouts.partials.scripts_auth')
    @include('adminlte::layouts.partials.contentplugin')


    @include('adminlte::auth.terms')
    <script src="{{secure_asset('/js/registration.js')}}"></script>

</body>

@endsection

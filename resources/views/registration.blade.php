@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

<style type="text/css">
    .login-box, .register-box {
         width: 50% !important; 
    }
</style>>

<body class="hold-transition register-page">
    <div id="app">
        <div class="register-box">
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

            <div class="register-box-body">
                <form id="formUser" action="{{ url('/users') }}" method="post">
                  <div class="userInfo">
                    <center><label for=""><h3><b>datos de usuario</b><h3></label></center>
                    <br>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="txtname">{{ trans('message.fullname') }}</label>
                                 <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="txtname" type="text" class="form-control" placeholder="{{ trans('message.fullname') }}" name="name" value="{{ old('name') }}" required/>
                                 </div>
                                <span for="txtname" class="help-block"></span>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group  has-feedback">
                                <label for="txtname">{{ trans('message.fullname') }}</label>
                                <input id="txtname" type="text" class="form-control" placeholder="{{ trans('message.fullname') }}" name="name" value="{{ old('name') }}" required/>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="form-group  has-feedback  col-md-6 col-sm-6 col-xs-12">
                            <label for="txtname">{{ trans('message.lastname') }}</label>
                           <input type="text" class="form-control" placeholder="{{ trans('message.lastname') }}" name="lastname" value="{{ old('name') }}"/>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span> 
                        </div>
                        
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="{{ trans('message.age') }}" name="age" value="{{ old('name') }}"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="{{ trans('message.email') }}" name="email" value="{{ old('email') }}" required/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password" required/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.retrypepassword') }}" name="password_confirmation"/>
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="typeUser"><b>{{ trans('message.typeuser') }}</b></label>
                        <select type="password" class="form-control"  name="typeUser">
                          <option value="1">Administrador</option>
                          <option value="2">Cliente</option>
                        </select>
                    </div>
                  </div>
                  <div class=infoCompany>
                    <center><label for=""><h3><b>datos de empresa</b><h3></label></center>
                    <br>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="{{ trans('message.nickcompany') }}" name="namecompany" value="{{ old('name') }}" required/>
                        <span class="fa fa-building form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="{{ trans('message.url') }}" name="url" value="{{ old('name') }}" required/>
                        <span class="fa fa-globe form-control-feedback"></span>
                    </div>
                  </div>
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
                        <div class="col-xs-4 col-xs-push-4">
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
        </div><!-- /.register-box -->
    </div>

    @include('adminlte::layouts.partials.scripts_auth')
    @include('adminlte::layouts.partials.contentplugin')


    @include('adminlte::auth.terms')
    <script src="{{secure_asset('/js/registration.js')}}"></script>

</body>

@endsection

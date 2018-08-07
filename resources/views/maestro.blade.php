@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-8"></div>
			<label for="txtdocument"><b>Seleccione Categoria</b></label>
			<select id="idmaster" class="form-control select2" name="master">
				
			</select>
			<!-- <div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Home</div>

					<div class="panel-body">
						{{ trans('adminlte_lang::message.logged') }}
					</div>
				</div>
			</div> -->
		</div>
	</div>
@endsection
<script src="{{secure_asset('/js/maestro.js')}}"></script>
@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div clas="box">
				<div id="divMaster" class="col-md-5 col-sm-4 col-xs-12">
					<div class="col-md-8 col-sm-8 col-xs-8">
						<h3 class="box-title">Categorias</h3>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<button type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Agregar Categoria">><i class="fas fa-plus"></i></button>
					</div>
					<div id="jsGrid">
						
					</div>
					<br>
					<!-- <table id="mastertable" class="table table-bordered table-hover dataTable" role="gridMaster">
						<thead class="colorblue">
			                <tr role="row">
			                	<th class="sorting_asc" tabindex="0">Id
			                	</th>
			                	<th class="sorting" tabindex="0">descIngles</th>
			                	<th class="sorting" tabindex="0" >descEspañol
			                	</th>
			                	<th class="sorting" tabindex="0">Status
			                	</th>
			                </tr>
	                </thead>
	                <tbody>
	                	
	                </tbody>
						
					</table> -->
				</div>
			</div>	
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

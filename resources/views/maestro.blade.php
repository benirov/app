@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div id="divMaster" class="col-md-4 col-sm-4 col-xs-12 hidden">
				<table id="mastertable" class="table table-bordered table-hover dataTable" role="gridMaster">
					<thead>
		                <tr role="row">
		                	<th class="sorting_asc" tabindex="0">Id
		                	</th>
		                	<th class="sorting" tabindex="0">name
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
					
				</table>
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

@extends('layouts.admin_layout')
@section('content')


@include('errors.list')

	{!! Form::model($oem,['method'=>'PATCH','url'=>'edit_oem/'.$oem->id,'onsubmit' => 'showWait()']) !!}
	
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Edit Operator (OEM) : <b>{{$oem->name}}</b></h6>
		</div>
	<div class="card-body">
		
	<fieldset>
		<legend>
			Edit Operator (OEM) : <b>{{$oem->name}}
		</legend>
		<div class="form-group">
			
			{!! Form::label('name', 'Name')!!}
			<span class="symbol required"></span>
			<div class="form-group">
			{!! Form::text('name', null, ['class' => 'form-control','data-required'=>'1','required']) !!}
			</div>
			
			
			{!! Form::label('address', 'Address')!!}
			<span class="symbol required"></span>
			<div class="form-group">
			{!! Form::textarea('address', null, ['class' => 'form-control','data-required'=>'1','required']) !!}
			</div>
			
		</div>
	
		{!! Form::label('active', 'Active')!!}
		<span class="symbol required"></span>
		<div class="form-control">
		{!! Form::select('active', ['' => '--Active?--', '1' => 'Yes', '0' => 'No']) !!}
		</div>
		
	</fieldset>
	<br/>
	<button type="submit" class="btn btn-o btn-success btn-wide btn-scroll btn-scroll-left ti-check" onclick="javascript:return confirm('Are you sure you want to save?')"><span>Save</span> </button>
	<button type="Reset" class="btn btn-o btn-warning btn-wide btn-scroll btn-scroll-left  ti-back-right"><span>Reset</span></button>
	
	</div>
  </div>
 </div>

	{!! Form::close() !!}
				
@stop
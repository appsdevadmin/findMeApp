@extends('layouts.admin_layout')
@section('content')


@include('errors.list')

	{!! Form::model($user,['method'=>'PATCH','url'=>'edit_user/'.$user->id,'onsubmit' => 'showWait()']) !!}
	
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Edit User : <b>{{$user->name}}</b></h6>
		</div>
	<div class="card-body">
	<fieldset>
		<div class="form-group">
			
			{!! Form::label('name', 'Name')!!}
			<span class="symbol required"></span>
			<div class="form-group">
			{!! Form::text('name', null, ['class' => 'form-control','data-required'=>'1','required']) !!}
			</div>
			
			{!! Form::label('email', 'Email')!!}
			<span class="symbol required"></span>
			<div class="form-group">
			{!! Form::text('email', null, ['class' => 'form-control','data-required'=>'1','required']) !!}
			</div>		
		</div>
	</fieldset>
	<fieldset>
		<legend>
			System Details
		</legend>
		<div class="form-group">
			<label>
				Role?<span class="symbol required"></span> ({{$user_role->name}})
			</label>
			<div class="form-group">			
			<select name="role_id" class="js-example-basic-single js-states form-control" selected="{{ old('role_id') }}" required>
					 <option value="">Role?</option>
					  @foreach ($roles as $role)
						<option value="{!!$role->id!!}">{{$role->name}}</option>  
					  @endforeach
			</select>
			</div>
				{!! Form::label('active', 'Active')!!}
			<span class="symbol required"></span>
			<div class="form-control">
			{!! Form::select('active', ['' => '--Active?--', '1' => 'Yes', '0' => 'No']) !!}
			</div>
		</div>
	</fieldset>
	<button type="submit" class="btn btn-o btn-success btn-wide btn-scroll btn-scroll-left ti-check" onclick="javascript:return confirm('Are you sure you want to save?')"><span>Save</span> </button>
	<button type="Reset" class="btn btn-o btn-warning btn-wide btn-scroll btn-scroll-left  ti-back-right"><span>Reset</span></button>
	
	</div>
  </div>
 </div>

	{!! Form::close() !!}
				
@stop
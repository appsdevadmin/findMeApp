@extends('layouts.admin_layout')
@section('content')


@include('errors.list')

	{!! Form::open(['method'=>'POST','url'=>'create_user','onsubmit' => 'showWait()']) !!}
	
<div class="container-fluid">
	<div class="card shadow mb-4">
		
	<div class="card-body">
		<legend>
			Name & Contact Details
		</legend>
		<fieldset>
		<div class="form-group">
			<label>
				Name<span class="symbol required"></span>
			</label>
			<div class="form-group">
				<input type="text" placeholder="Name" name="name" id="name" class="form-control" required value="{{ old('name') }}">
			</div>
		
			<label>
				E-mail <span class="symbol required"></span>
			</label>
			<div class="form-group">
				<input type="email" placeholder="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
			</div>
		
			<label>
				Phone<span class="symbol required"></span>
			</label>
			<div class="form-group">
				<input type="number" placeholder="Phone" name="phone" id="phone" class="form-control" required value="{{ old('phone') }}">
			</div>
			<label>
				Address<span class="symbol required"></span>
			</label>
			<div class="form-group">
				<textarea placeholder="Address" class="form-control" name="address" id="address" required value="{{ old('address') }}"></textarea>
			</div>
		</div>
	</fieldset>
	<fieldset>
		<legend>
			System Details
		</legend>
			<label>
				Role?<span class="symbol required"></span>
			</label>
			<div class="form-group">
			<select name="role_id" class="js-example-basic-single js-states form-control" value="{{ old('role_id') }}" required>
					 <option value="">Role?</option>
					  @foreach ($roles as $role)
						<option value="{!!$role->id!!}">{{$role->name}}</option>  
					  @endforeach
			</select>
			</div>
			<label>
				Active?<span class="symbol required"></span>
			</label>
			<div class="form-group">
			<select name="active" class="js-example-basic-single js-states form-control" value="{{ old('active') }}" required>
					 <option value="">Active?</option>
					 <option value="1">Yes</option>
					 <option value="0">No</option>
			</select>
			</div>
	</fieldset>
	<button type="submit" class="btn btn-o btn-success btn-wide btn-scroll btn-scroll-left ti-check" onclick="javascript:return confirm('Are you sure you want to save?')"><span>Save</span> </button>
	<button type="Reset" class="btn btn-o btn-warning btn-wide btn-scroll btn-scroll-left  ti-back-right"><span>Reset</span></button>
	
	</div>
  </div>
 </div>

	{!! Form::close() !!}
				
@stop
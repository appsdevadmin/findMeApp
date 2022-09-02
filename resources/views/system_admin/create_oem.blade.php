@extends('layouts.admin_layout')
@section('content')


@include('errors.list')

	{!! Form::open(['method'=>'POST','url'=>'create_oem','onsubmit' => 'showWait()']) !!}
	
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Operator (OEM) Details</h6>
		</div>
	<div class="card-body">
	 
		<fieldset>
		<div class="form-group">
			<label>
				Name<span class="symbol required"></span>
			</label>
			<div class="form-group">
				<input type="text" placeholder="Name" name="name" id="name" class="form-control" required value="{{ old('name') }}">
			</div>
		
			
			<label>
				Address<span class="symbol required"></span>
			</label>
			<div class="form-group">
				<textarea placeholder="Address" name="address" id="address" class="form-control" required value="{{ old('address') }}"></textarea>
			</div>
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
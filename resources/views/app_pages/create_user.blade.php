@extends('layouts.admin_layout')
@section('content')


@include('errors.list')

{!! Form::open(['method'=>'POST','url'=>'create_user','onsubmit' => 'showWait()']) !!}
	
<div class="container-fluid">
	<div class="card shadow mb-4">
		
	<div class="card-body">
		<legend>
			STAFF ID
		</legend>
		<fieldset>
		<div class="form-group">
			<label>
				Staff ID<span class="symbol required"></span>
			</label>
			<div class="form-group">
				<input type="text" name="id_no" value="{{ old('id_no') }}" class="form-control" id="form-field-8" required="required" placeholder="Staff ID" />
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
			<select name="role" class="chosen-select form-control" id="role" required="required" data-placeholder="Choose Role...">
				<option value="">Role?</option>
				<option value="1">System Admin</option>
				<option value="4">User</option>
				
			</select>
			</div>
			<label>
				Active?<span class="symbol required"></span>
			</label>
			<div class="form-group">
			<select name="access" class="js-example-basic-single js-states form-control" value="{{ old('access') }}" required>
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
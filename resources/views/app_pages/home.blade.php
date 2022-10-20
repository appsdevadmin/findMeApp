@extends('layouts.admin_layout')
@section('content')
<!-- Main content -->
{{--    Staff info View--}}
    @include ('app_pages/_card')
{{--    Menu Options--}}
    @if ($id == "")
      @include('app_pages/_cardMenu')
    @endif
	<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <b class="modal-title">Missing/Stolen ID Card</b>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              {!! Form::open(['method'=>'POST','url'=>'card_stolen','onsubmit' => 'showWait()']) !!}
			  <div class="row">
				<div class="col-sm-12">
				  <!-- textarea -->
				  <div class="form-group">
					<label>Incidence Details</label>
					<textarea id="description" name="description" class="form-control" rows="3" placeholder="..."></textarea>
				  </div>
				</div>

			  </div>
			</div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-success" onclick="javascript:return confirm('Are you sure you want to save?')">Save</button>
              <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
			{!! Form::hidden('staff_id', $staff_data->staff_id)!!}
			{!! Form::close() !!}
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    <!-- /.content -->
@stop

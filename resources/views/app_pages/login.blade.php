@extends('layouts.login_layout')
@section('content')
<div class="login-box">
  <div class="login-logo animate__animated animate__headShake">
    <a href="/"><img src="{{asset('img/NNPC_S2.png') }}" alt="" class="img-fluid" width="100" height="80"><br/><h6><!-- NNPC Limited --></h6></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <h4 class="login-box-msg">Login</h4>

		@if (Session::has('message'))
			<div class="alert alert-info">
			<button class="close" data-dismiss="alert">×</button>
			<strong>Info!</strong> {{ Session::get('message') }}
			</div>			
		@endif
		@include('errors.list')
		{!! Form::open(['method'=>'POST','url'=>'login']) !!} 
        <div class="input-group mb-3">
          <input type="text" id="staff_id" name="staff_id" class="form-control" placeholder="Staff ID" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
    {!! Form::close() !!} 

	<hr/>
      <!--p class="mb-1">
        <a href="/password_reset">I forgot my password</a>
      </p-->
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@stop
@extends('layouts.admin_layout')
@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Manage Users</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
			<div class="col-12">
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage Users</h3>
              </div>
              <!-- /.card-header -->
			  
              <div class="card-body">
				<a href="/create_user" class="btn btn-success btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">New User</span>
                  </a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/No</th>
					<th>Name</th>
					<th>Address</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Role</th>
					<th>Options</th>
                  </tr>
                  </thead>
                  <tbody>
				   @foreach ($users as $a => $user)
					<tr>
						<td>{{$a + 1}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->address}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->phone}}</td>
						@if($user->active == 1)
							<td bgcolor="#DBFA68">{{$role_name[$a]->name}}</td>
						@else
							<td bgcolor="#F5C772">{{$role_name[$a]->name}}</td>
						@endif
						<td>
							<ul class="navbar-nav ml-auto">
							  <li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  Options
								</a>
								<div class="dropdown-menu dropdown-menu-right animated--fade-in" aria-labelledby="navbarDropdown">
								
								<a href="edit_user/{{$user->id}}" class="dropdown-item">
									<i class="fas fa-flag"></i> Edit User
								</a>
								  <div class="dropdown-divider"></div>
								<!--a href="welcomex/{{$user->id}}" onclick="javascript:return confirm('Are you sure you want to send welcome message to this user?')" class="dropdown-item">
								<i class="fas fa-envelope"></i> Welcome Message

								<div class="dropdown-divider"></div>
								<a href="reset_password/{{$user->id}}" onclick="javascript:return confirm('Are you sure you want to rest the password for this user?')" class="dropdown-item">
								<i class="fas fa-tasks"></i> Reset Password
								<div class="dropdown-divider"></div-->
								@if($user->active == '1')
									<a href="/deactivate_user/{{$user->id}}" onclick="javascript:return confirm('Are you sure you want to deactivate this user?')" class="dropdown-item">
										<i class="fas fa-ban"></i> Deactivate
									</a>
								@else
									<a  href="/activate_user/{{$user->id}}" onclick="javascript:return confirm('Are you sure you want to activate this user?')" class="dropdown-item">
										<i class="fas fa-check"></i> Activate
									</a>
								@endif
								</div>
							  </li>
							</ul>
						</td>
					</tr>
					@endforeach
                 
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>	
			
		</div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
	
    <!-- /.content -->
@stop
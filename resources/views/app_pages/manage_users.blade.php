@extends('layouts.admin_layout')
@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Manage Administrators</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home/menu">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Manage Administrators</a></li>
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
				
<!-- DataTales Example -->
    <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Manage Administrators</h6>
			        <hr/>
			        <a href="/create_user/menu" class="btn btn-success btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">New Administrator</span>
                  </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                 <table class="table table-bordered table-striped" id="dataTable" >
                  <thead>
                    <tr>
                      <th>S/No</th>
                      <th>Staff ID</th>
                      <th>Name</th>
                      <th hidden></th>
                      <th>Role</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S/No</th>
                      <th>Staff ID</th>
                      <th>Name</th>
                      <th hidden></th>
                      <th>Role</th>
                      <th>Options</th>
                    </tr>				  
                  </tfoot>				  
                  <tbody>				  
                   @foreach ($user_details as $a => $user_detail)
							      <tr>
                      <td>{{$a + 1}}</td>
                      <td>{{$user_detail->id_no}}</td>
                      <td>{{$user_detail->name}}</td>
                      <td hidden></td>
                      @if($user_detail->role == "1")
                        <td>System Admin</td>
                      
                      @else
                        <td>User</td>
                      @endif
								      <td>
                        <ul class="navbar-nav ml-auto">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                            </a>
                            <div class="dropdown-menu dropdown-menu-right animated--fade-in" aria-labelledby="navbarDropdown">
                              <a href="/edit_user/{{$user_detail->id}}" class="dropdown-item">
                              <i class="fas fa-flag"></i> Edit User
                              </a> 
                            </div>
                          </li>
                        </ul>
								      </td>
							      </tr>
							    @endforeach
					      </tbody>
              </table>
            </div>
          </div>
        </div>				
      </div>			
	  </div>
        <!-- /.row -->
  </div>
  <!-- container-fluid -->
</section>
    <!-- /.content -->
@stop
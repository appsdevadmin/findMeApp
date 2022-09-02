@extends('layouts.admin_layout')
@section('content')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark"> Staff</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home/menu">Home</a></li>
              <li class="breadcrumb-item"><a href="#"> View Staff</a></li>
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
              <h6 class="m-0 font-weight-bold text-primary"> Staff</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                 
				 <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
						<th>S/No</th>
						<th>Name</th>
						<th>Contact</th>
						<th>Work Unit</th>
						<th>Options</th>
                    </tr>
                  </thead>
                  <tfoot>
					<tr>
						<th>S/No</th>
						<th>Name</th>
						<th>Contact</th>
						<th>Work Unit</th>
						<th>Options</th>
                    </tr>				  
                  </tfoot>				  
                  <tbody>				  
                   @foreach ($all_staff as $a => $all_staffs)
							<tr>
								<td>{{$a + 1}}</td>
								<td>{{$all_staffs->first_name}} {{$all_staffs->middle_name}} {{$all_staffs->last_name}} ({{$all_staffs->staff_id}})<br/><sub>{{$all_staffs->designation}}</sub></td>
								<td>	
									<b>Email:</b>  {{$all_staffs->email}}<br/>
									<b>Mobile:</b>  {{$all_staffs->mobile}}<br/>
									<b>Extension:</b>  {{$all_staffs->ext}}								
								</td>
								<td>	
									<b>Department:</b> {{$all_staffs->department_name}}<br/>
									<b>SBU:</b> {{$all_staffs->sbu}}<br/>
									<b>Location:</b>  {{$all_staffs->loc_description}}								
								</td>
								<td>
									<ul class="navbar-nav ml-auto">
									  <li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										  Dropdown
										</a>
										<div class="dropdown-menu dropdown-menu-right animated--fade-in" aria-labelledby="navbarDropdown">
										
											<a href="/view_staff/{{$all_staffs->id}}" class="dropdown-item">
												<i class="fas fa-flag"></i> View Full Details
											</a>
											  <div class="dropdown-divider"></div>
											<a href="/view_card/{{$all_staffs->id}}" class="dropdown-item">
												<i class="fas fa-book"></i> View Card History
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
      </div><!--/. container-fluid -->
    </section>
	
    <!-- /.content -->
@stop
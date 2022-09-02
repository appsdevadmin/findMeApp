@extends('layouts.admin_layout')
@section('content')

<!-- DataTales Example -->
<div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Manage Centers</h6>
			  <hr/>
			   <a href="/create_center" class="btn btn-success btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">New Center</span>
                  </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                 <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                   <thead>
                    <tr>
						<th>S/No</th>
						<th>Address</th>
						<th>OEM</th>
						<th>State</th>
						<th>Active?</th>
						<th>Options</th>
                    </tr>
                  </thead>
                  <tfoot>
					<tr>
						<th>S/No</th>
						<th>Address</th>
						<th>OEM</th>
						<th>State</th>
						<th>Active?</th>
						<th>Options</th>
                    </tr>
				</tfoot>
				<tbody>				  
                @foreach ($centers as $a => $center)
				<tr>
				<td>{{$a + 1}}</td>
				<td>{{$center->name}}</td>				
				<td>{{$center->oem}}</td>
				<td>{{$center->state}}</td>
				@if($center->active == 1)
					<td bgcolor="#DBFA68">Yes</td>
				@else
					<td bgcolor="#F5C772">No</td>
				@endif	
				<td>
					<ul class="navbar-nav ml-auto">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Dropdown
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animated--fade-in" aria-labelledby="navbarDropdown">
                        
                        <a href="edit_center/{{$center->id}}" class="dropdown-item">
							<i class="fas fa-flag"></i> Edit Center
						</a>
                         <div class="dropdown-divider"></div>
						 
						<!--a href="company_supervisors/{{$center->id}}" class="dropdown-item">
							<i class="fas fa-user"></i> Supervisors
						</a>
                         <div class="dropdown-divider"></div-->
						
						@if($center->active == '1')
							<a href="/deactivate_center/{{$center->id}}" onclick="javascript:return confirm('Are you sure you want to deactivate this center?')" class="dropdown-item">
								<i class="fas fa-ban"></i> Deactivate
							</a>
						@else
							<a  href="/activate_center/{{$center->id}}" onclick="javascript:return confirm('Are you sure you want to activate this center?')" class="dropdown-item">
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
            </div>
          </div>				
          </div>				
@stop
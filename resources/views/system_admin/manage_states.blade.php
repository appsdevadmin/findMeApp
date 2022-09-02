@extends('layouts.admin_layout')
@section('content')

<!-- DataTales Example -->
<div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Manage States</h6>
			  <hr/>
			   <a href="/create_state" class="btn btn-success btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">New State</span>
                  </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                 <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                   <thead>
                    <tr>
						<th>S/No</th>
						<th>Name</th>
						<th>Active?</th>
						<th>Options</th>
                    </tr>
                  </thead>
                  <tfoot>
					<tr>
						<th>S/No</th>
						<th>Name</th>
						<th hidden>Category</th>
						<th>Active?</th>
						<th>Options</th>
                    </tr>
				</tfoot>
				<tbody>				  
                @foreach ($states as $a => $state)
				<tr>
				<td>{{$a + 1}}</td>
				<td>{{$state->name}}</td>
				<td hidden>{{$state->state_category}}</td>
				@if($state->active == 1)
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
                        
                        <a href="edit_state/{{$state->id}}" class="dropdown-item">
							<i class="fas fa-flag"></i> Edit State
						</a>
                         <div class="dropdown-divider"></div>
						 
						<!--a href="company_supervisors/{{$state->id}}" class="dropdown-item">
							<i class="fas fa-user"></i> Supervisors
						</a>
                         <div class="dropdown-divider"></div-->
						
						@if($state->active == '1')
							<a href="/deactivate_state/{{$state->id}}" onclick="javascript:return confirm('Are you sure you want to deactivate this state?')" class="dropdown-item">
								<i class="fas fa-ban"></i> Deactivate
							</a>
						@else
							<a  href="/activate_state/{{$state->id}}" onclick="javascript:return confirm('Are you sure you want to activate this state?')" class="dropdown-item">
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
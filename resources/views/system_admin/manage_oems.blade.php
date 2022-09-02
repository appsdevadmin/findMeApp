@extends('layouts.admin_layout')
@section('content')

<!-- DataTales Example -->
<div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Manage Operators (OEMS)</h6>
			  <hr/>
			   <a href="/create_oem" class="btn btn-success btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">New Operator (OEM)</span>
                  </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                 <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                   <thead>
                    <tr>
						<th>S/No</th>
						<th>Name</th>
						<th>Address</th>
						<th>Active?</th>
						<th>Options</th>
                    </tr>
                  </thead>
                  <tfoot>
					<tr>
						<th>S/No</th>
						<th>Name</th>
						<th>Address</th>
						<th>Active?</th>
						<th>Options</th>
                    </tr>
				</tfoot>
				<tbody>				  
                @foreach ($oems as $a => $oem)
				<tr>
				<td>{{$a + 1}}</td>
				<td>{{$oem->name}}</td>
				<td>{{$oem->address}}</td>
				@if($oem->active == 1)
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
                        
                        <a href="edit_oem/{{$oem->id}}" class="dropdown-item">
							<i class="fas fa-flag"></i> Edit OEM
						</a>
                         <div class="dropdown-divider"></div>
						 
						<!--a href="company_supervisors/{{$oem->id}}" class="dropdown-item">
							<i class="fas fa-user"></i> Supervisors
						</a>
                         <div class="dropdown-divider"></div-->
						
						@if($oem->active == '1')
							<a href="/deactivate_oem/{{$oem->id}}" onclick="javascript:return confirm('Are you sure you want to deactivate this oem?')" class="dropdown-item">
								<i class="fas fa-ban"></i> Deactivate
							</a>
						@else
							<a  href="/activate_oem/{{$oem->id}}" onclick="javascript:return confirm('Are you sure you want to activate this oem?')" class="dropdown-item">
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
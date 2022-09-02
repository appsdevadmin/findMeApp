@extends('layouts.admin_layout')
@section('content')


	
    <!-- Main content -->
    <section class="content">

	   <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
             <div class="card-header text-muted border-bottom-0">
                  NNPC Limited 
                </div>
				
				<div class="visible-print text-center">
					<div class="card-body pt-0">
							
							<div id="signature-wrapper" class="signature-wrapper">
								<div id="sig-person" class="column left sig-person">
									<div class="center">
										<h4>
										   {{$staff_data->first_name}} {{$staff_data->middle_name}} {{$staff_data->last_name}}
										</h4>
										<span>{{$staff_data->designation}}</span>
									</div>
								</div>
								<div id="sig-company" class="column middle  sig-company">
									<div class="center module">
										<ul>
											<li>
												<div class="column left-icon">

													<img border="0" width="10" alt="phone" style="border:0; height:10px; width:10px; " src="https://www.nnpcgroup.com/emailsignature/images/phone.png">
												</div>
												<div class="column right-icon">
													{{$staff_data->mobile}}
												</div>
											</li>
											<li>
												<div class="column left-icon">

													<img border="0" width="10" alt="phone" style="border:0; height:10px; width:10px; " src="https://www.nnpcgroup.com/emailsignature/images/phone.png">
												</div>
												<div class="column right-icon">
													{{$staff_data->ext}}
												</div>
											</li>
											<li>
												<div class="column left-icon">

													<img border="0" width="10" alt="email" style="border:0; height:10px; width:10px; " src="https://www.nnpcgroup.com/emailsignature/images/email.png">
												</div>
												<div class="column right-icon">
													{{$staff_data->email}}
												</div>
											</li>
											<li>
												<div class="column left-icon">
													<img border="0" width="10" alt="website" style="border:0; height:10px; width:10px; " src="https://www.nnpcgroup.com/emailsignature/images/website.png">
												</div>
												<div class="column right-icon">
													<a href="https://nnpcgroup.com">nnpcgroup.com</a>
												</div>
											</li>
											<li>
													<div class="column left-icon">
														<img border="0" width="10" alt="address" style="border:0; height:10px; width:10px; " src="https://www.nnpcgroup.com/emailsignature/images/address.png">
													</div>
													<div class="column right-icon">
														<p>
															Herbert Macaulay Way, Central Business District,<br /> Abuja,Nigeria
														</p>
													</div>
											</li>
										</ul>
										<p style="margin-top:10px;">
											<a href="https://web.facebook.com/nnpclimited/" target="_blank" rel="noopener">
												<img border="0" width="15" alt="facebook icon" style="border:0; height:15px; width:15px; " src="https://www.nnpcgroup.com/emailsignature/images/facebook.png"></a>
											</span>
											<span>
												<a href="https://twitter.com/nnpclimited" target="_blank" rel="noopener">
													<img border="0" width="15" alt="twitter icon" style="border:0; height:15px; width:15px; " src="https://www.nnpcgroup.com/emailsignature/images/twitter.png"></a>
											</span>
											<span>
											<a href="https://www.instagram.com/nnpclimited/" target="_blank" rel="noopener">
												<img border="0" width="15" alt="instagram icon" style="border:0; height:15px; width:15px; " src="https://www.nnpcgroup.com/emailsignature/images/instagram.png"></a>
											</span>
										</p>
									</div>
								</div>
									<div id="sig-logo" class="column right sig-logo">
										<div class="div-wrapper">
											<img src="https://www.nnpcgroup.com/assets/images/new-nnpc-logo.png" alt="logo" role="presentation" width="80">
										</div>

									</div>

								</div>
								
							<div class="card-footer">
							  <div class="text-left">
								@if($staff_data->status == "Deactivated")
									<h5><i class="fas fa-eye-slash"></i> This ID Card is deactivated</h5>
								@else
									<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-lg">
									  <i class="fas fa-eye-slash"></i> Mark ID Card as Missing/Stolen
									</button>
								@endif
								@if((Session::get('role_id') == 1) && ($staff_data->status != "Deactivated"))
									<a href="/deactivate_card/{{$staff_data->staff_id}}" class="btn btn-sm btn-danger" onclick="javascript:return confirm('Are you sure you want to Deactivate?'>
									  <i class="fas fa-ban"></i> Deactivate Card
									</a>
								@endif
								@if((Session::get('role_id') == 1) && ($staff_data->status == "Deactivated"))
									<a href="/activate_card/{{$staff_data->staff_id}}" class="btn btn-sm btn-success" onclick="javascript:return confirm('Are you sure you want to Activate?'>
									  <i class="fas fa-check"></i> Activate Card
									</a>
								@endif
							  </div>
							</div>
					</div>
					
              </div>
				
				
          </div>
        </div>
      <!-- /.card -->
		<!--div class="card card-solid">
        <div class="card-body pb-0">
            
                <div class="card-body pt-0">						
                     	<div class="visible-print text-center">
							{!! 
								QrCode::size(100)
								->color(26, 47, 62)
								->merge('../public/img/x11.png')
								->errorCorrection('H')
								->margin(2)
								->generate($staff_data->qr_code); 
							!!}
							
							
							<p>www.findme.nnpcgroup.com</p>
						</div>
                  </div>
                </div>
				
				
          </div-->
		
    </section>
	
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
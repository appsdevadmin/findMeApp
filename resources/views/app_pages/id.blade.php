@extends('layouts.id_layout')
@section('content')

    <!-- Content Header (Page header) -->
   
    <!-- Main content -->
    <section class="content">
	@if(($staff_data != "") && ($staff_details != ""))
	  
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
										   {{$staff_details->firstname}} {{$staff_details->surname}}
										</h4>
										<!--span>{{$staff_details->designation}}</span-->
									</div>
								</div>
								<div id="sig-company" class="column middle  sig-company">
									<div class="center module">
										<ul>
											<li>
												<div class="column left-icon">

													<img border="0" width="10" alt="phone" style="border:0; height:10px; width:10px; " src="https://www.nnpcgroup.com/emailsignature/images/phone.png">
												</div>
												<div class="column right-icon" style="text-align:left"> 
													{{$staff_details->extension}}
												</div>
											</li>
											<li>
												<div class="column left-icon">

													<img border="0" width="10" alt="email" style="border:0; height:10px; width:10px; " src="https://www.nnpcgroup.com/emailsignature/images/email.png">
												</div>
												<div class="column right-icon" style="text-align:left; word-wrap:normal">
													{{$staff_details->emailaddress}}
												</div>
											</li>
											<li>
												<div class="column left-icon">
													<img border="0" width="10" alt="website" style="border:0; height:10px; width:10px; " src="https://www.nnpcgroup.com/emailsignature/images/website.png">
												</div>
												<div class="column right-icon" style="text-align:left">
													<a href="https://nnpcgroup.com">nnpcgroup.com</a>
												</div>
											</li>
											<li>
													<div class="column left-icon">
														<img border="0" width="10" alt="address" style="border:0; height:10px; width:10px; " src="https://www.nnpcgroup.com/emailsignature/images/address.png">
													</div>
													<div class="column right-icon" style="text-align:left">
														<p>
															Herbert Macaulay Way, CBD,<br /> Abuja, Nigeria
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
								
						
						
				
					   
					</div>
					<div class="card-footer">
					  <div class="text-left">
						<a href="/" class="btn btn-sm btn-primary">
						  <i class="fas fa-user"></i> View Profile
						</a>
					  </div>
					</div>
              </div>
				
				
          </div>
        </div>
      <!-- /.card -->
		<div class="card card-solid">
        <div class="card-body pb-0">
            
                <div class="card-body pt-0">						
                     	<div class="visible-print text-center">
							{!! QrCode::size(100)->generate('https://findme.nnpcgroup.com/'.$id); !!}
							<p>www.nnpcgroup.com</p>
						</div>
                  </div>
                </div>
				
				
          </div>
		@else
			 <div class="card-body pb-0">
            
                <div class="card-body pt-0">						
                     	<div class="visible-print text-center">
							<hr/>						
							@if($staff_details == "")
								<p><h4>This Card in no longer valid!</h4></p>
							@else
								<p><h4>The Scanned QR code is not valid!</h4></p>
							@endif
							<hr/>
							<h4 class="animate__animated animate__headShake"><a href="https://www.nnpcgroup.com"><img src="{{asset('/img/NNPC_S2.png') }}" alt="" height="178" width="210" class="img-fluid"></a></h4>
							<p>NNPC Limited</p>
							<hr/>
						</div>
                  </div>
                </div>				
				
          </div>
			
		@endif
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@stop
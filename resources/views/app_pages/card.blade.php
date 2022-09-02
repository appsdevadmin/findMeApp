@extends('layouts.admin_layout')
@section('content')

    <!-- Content Header (Page header) -->
   
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
										<!--span>{{$staff_data->designation}}</span-->
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
								
						
						
				
					   
					</div>
				
              </div>
				
				
          </div>
        </div>
      <!-- /.card -->
		<div class="card card-solid">
        <div class="card-body pb-0">
            
                <div class="card-body pt-0">						
                     	<div class="visible-print">
							{!! QrCode::size(100)->generate('https://findme.nnpcgroup.com/'.$id); !!}
							&nbsp;&nbsp;&nbsp;&nbsp;
							{!! QrCode::phoneNumber($staff_data->phone)!!}
							
							<p>www.nnpcgroup.com</p>
						</div>
                  </div>
                </div>
				
				
          </div>
			
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@stop
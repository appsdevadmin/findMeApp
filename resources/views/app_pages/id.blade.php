@extends('layouts.id_layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">NNPC Limited</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            @if($staff_data != "")
                <div class="container-fluid">
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-12">
                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12" style="text-align: right">
                                        <div>
                                            <span><img  alt="phone" style="border:0; height:15px; width:15px; " src="{{url('img/emergency-call.png')}}"></span> <span><p><a href="tel:0946081000">0946081000</a></p></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- info row -->
                                <hr>
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col" style = "text-align:center">
                                        <img src="https://www.nnpcgroup.com/assets/images/new-nnpc-logo.png" alt="logo" role="presentation" width="80">
                                        <br>
                                        <br>
                                        <strong> {{$staff_data->first_name }} {{$staff_data->last_name }}
                                            ({{$staff_data->staff_id }})</strong>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-8 invoice-col">
                                        <div class ="row">
                                            <div class="col-sm-1" style="text-align:start">
                                                <img width="13" alt="phone" style="border:0; height:13px; width:13px; " src="{{url('img/telephone.png')}}">
                                            </div>
                                            <div class="col-sm-7" style="text-align:left">
                                                {{$staff_data->ext}}
                                            </div>
                                        </div>
                                        <div class ="row">
                                            <div class="col-sm-1" style="text-align:start">
                                                <img border="0" width="10" alt="phone" style="border:0; height:10px; width:10px; " src="https://www.nnpcgroup.com/emailsignature/images/phone.png">
                                            </div>
                                            <div class="col-sm-7" style="text-align:left">
                                                {{$staff_data->mobile}}
                                            </div>
                                        </div>
                                        <div class ="row">
                                            <div class="col-sm-1" style="text-align:start">
                                                <img width="13" alt="phone" style="border:0; height:13px; width:13px; " src="https://www.nnpcgroup.com/emailsignature/images/email.png">
                                            </div>
                                            <div class="col-sm-7" style="text-align:left">
                                                {{$staff_data->email }}
                                            </div>
                                        </div>
                                        <div class ="row">
                                            <div class="col-sm-1" style="text-align:start">
                                                <img width="13" alt="phone" style="border:0; height:13px; width:13px; " src="{{url('img/structure.png')}}">
                                            </div>
                                            <div class="col-sm-7" style="text-align:left">
                                                {{$staff_data->department_name }}
                                            </div>
                                        </div>
                                        <div class ="row">
                                            <div class="col-sm-1" style="text-align:start">
                                                <img border="0" width="13" alt="phone" style="border:0; height:13px; width:13px; " src="{{url('img/office-building.png')}}">
                                            </div>
                                            <div class="col-sm-7" style="text-align:left">
                                                {{$staff_data->sbu }}
                                            </div>
                                        </div>
                                        <div class ="row">
                                            <div class="col-sm-1" style="text-align:start">
                                                <img border="0" width="13" alt="phone" style="border:0; height:13px; width:13px; " src="https://www.nnpcgroup.com/emailsignature/images/address.png">
                                            </div>
                                            <div class="col-sm-7" style="text-align:left">
                                                {{$staff_data->sbu }}, {{$staff_data->loc_description }}
                                            </div>
                                        </div>
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:center">
                                                <span>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <hr>
                            </div>
                        </div><!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-left">
                                <a href="/" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View Profile
                                </a>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            @else
                <div class="card-body pb-0">

                    <div class="card-body pt-0">
                        <div class="visible-print text-center">
                            <hr/>
                            @if($staff_data == "")
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
            @endif
        </section>
    </div><!-- /.row (main row) -->
@stop

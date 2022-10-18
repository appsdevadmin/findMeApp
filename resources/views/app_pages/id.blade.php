@extends('layouts.id_layout')
@section('content')
<section class="content" style="font-family: Montserrat, Helvetica, Arial, sans-serif;font-size: 14px;">
    <div>
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
        <div class="content">
            @if($staff_data != "" && $staff_data != "Not Valid")
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
                                            <span>Emergency Contact <img  alt="phone" style="border:0; height:15px; width:15px; " src="{{url('img/emergency-call.png')}}"></span> &nbsp &nbsp <span><a href="tel:0946081000">0946081000</a></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- info row -->
                                <hr>
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col" style = "text-align:center">
                                        <img src="{{asset('/Passport_Photos/'.'S. '.($staff_data->staff_id).'.jpg')}}" style="border-radius:50%" alt="Staff Photo" width="200" height="200">
                                        <br>
                                        <br>
                                        <strong> {{$staff_data->first_name }} {{$staff_data->last_name }}
                                            ({{$staff_data->staff_id }})</strong>
                                        <br>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-8 invoice-col">
                                        @if($staff_data->ext != "")
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:start">
                                                <img width="13" alt="phone" style="border:0; height:13px; width:13px; " src="{{url('img/telephone.png')}}"> &nbsp &nbsp &nbsp  <a href="tel:{{'09460'.$staff_data->ext}}">{{$staff_data->ext}}
                                            </div>
                                        </div>
                                        @endif
                                        @if($staff_data->mobile != "")
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:start">
                                                <img border="0" width="13" alt="phone" style="border:0; height:13px; width:13px; " src="https://www.nnpcgroup.com/emailsignature/images/phone.png"> &nbsp &nbsp &nbsp <a href="tel:{{$staff_data->mobile}}"> {{$staff_data->mobile}} </a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($staff_data->email != "")
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:start">
                                                <img width="13" alt="phone" style="border:0; height:13px; width:13px; " src="https://www.nnpcgroup.com/emailsignature/images/email.png"> &nbsp &nbsp &nbsp  <a href="mailto:{{$staff_data->email}}">{{$staff_data->email }}</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if($staff_data->department_name != "")
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:start">
                                                <img width="13" alt="phone" style="border:0; height:13px; width:13px; " src="{{url('img/structure.png')}}"> &nbsp &nbsp &nbsp  {{$staff_data->department_name }}
                                            </div>
                                        </div>
                                        @endif
                                        @if($staff_data->sbu != "")
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:start">
                                                <img border="0" width="13" alt="phone" style="border:0; height:13px; width:13px; " src="{{url('img/office-building.png')}}"> &nbsp &nbsp &nbsp {{$staff_data->sbu }}
                                            </div>
                                        </div>
                                        @endif
                                        @if($staff_data->sbu != "" or $staff_data->loc_description != "")
                                            @if($staff_data->sbu == "NNPC Limited")
                                            <div class ="row">
                                                <div class="col-sm-8" style="text-align:start">
                                                    <img border="0" width="13" alt="phone" style="border:0; height:13px; width:13px; " src="https://www.nnpcgroup.com/emailsignature/images/address.png"> &nbsp &nbsp &nbsp  CHQ, {{$staff_data->loc_description }}
                                                </div>
                                            </div>
                                            @else
                                            <div class ="row">
                                                <div class="col-sm-8" style="text-align:start">
                                                    <img border="0" width="13" alt="phone" style="border:0; height:13px; width:13px; " src="https://www.nnpcgroup.com/emailsignature/images/address.png"> &nbsp &nbsp &nbsp  {{$staff_data->sbu }}, {{$staff_data->loc_description }}
                                                </div>
                                            </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-xs-6 py-3">
                                        <div class="row">
                                            <div class="col-sm-2 py-2" style="text-align:center" >
                                                <div >
                                                    <a href="tel:{{$staff_data->mobile}}" class="btn btn-success">
                                                        <img alt="phone" style="border:0; height:15px; width:15px; " src="https://www.nnpcgroup.com/emailsignature/images/phone.png"> Call Me
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 py-2" style="text-align:center">    
                                                <div>
                                                    <a href ="mailto:{{$staff_data->email}}" class="btn btn-primary">
                                                        <img alt="phone" style="border:0; height:15px; width:15px; " src="https://www.nnpcgroup.com/emailsignature/images/email.png"> Email Me
                                                    </a>
                                                </div>
                                            </div><!-- /.col -->
                                            <div class="col-sm-2 py-3">
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
                                            </div><!-- /.col -->
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div><!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="text-left">
                                <a href="/" class="btn btn-sm btn-success">
                                    <i class="fas fa-user"></i> View Profile
                                </a>
                                <a href="/generateVcard/{{$staff_data->staff_id}}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user-plus"></i> Download Vcard
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
                                <p><h4>This card in no longer valid!</h4></p>
                                <p><strong>The card is reported missing or stolen</strong></p>
                                <hr/>
                                    Kindly return to the nearest NNPC location or call <a href="tel:+234946081000">+234946081000</a> or send an email to 
                                    <a href ="mailto:info@nnpcgroup.com">info@nnpcgroup.com</a>
                            @elseif($staff_data == "Not Valid")
                                <p><h4>The Scanned QR code is not valid!</h4></p>
                            @endif
                            <hr/>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div><!-- /.row (main row) -->
</section>
@stop

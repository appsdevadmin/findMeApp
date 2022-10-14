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
                                        <span>Emergency Contact <img  alt="phone" style="border:0; height:15px; width:15px; " src="{{url('img/emergency-call.png')}}">:&nbsp; &nbsp;</span><span><a href="tel:0946081000">0946081000</a></span>
                                    </div>
                                </div>
                                <!-- info row -->
                                <hr>
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col" style = "text-align:center">
                                    <img src="{{asset('/Passport_Photos/'.'S. '.$staff_data->staff_id.'.jpg')}}" style="border-radius:50%" alt="Staff Photo" width="200" height="200">
                                        <br>
                                        <br>
                                        <strong> {{$staff_data->first_name }} {{$staff_data->last_name }}
                                            ({{$staff_data->staff_id }})</strong>
                                        <br>
                                        {{$staff_data->designation}}
                                        <br>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-8 invoice-col">
                                        @if($staff_data->blood_group != "-")
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:start">
                                                <img  alt="blood_group" style="border:0; height:13px; width:13px; " src="{{url('img/blood drop.png')}}"> &nbsp &nbsp &nbsp {{$staff_data->blood_group  ?? "-"}}&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        @endif
                                        @if($staff_data->blood_group != "-")
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:start">
                                                <img  alt="height" style="border:0; height:13px; width:13px; " src="{{url('img/height.png')}}"> &nbsp &nbsp &nbsp {{$staff_data->height . 'm' ?? "-"}}
                                            </div>
                                        </div>
                                        @endif
                                        @if($staff_data->ext != "")
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:start">
                                                <img width="13" alt="phone" style="border:0; height:13px; width:13px; " src="{{url('img/telephone.png')}}"> &nbsp &nbsp &nbsp  {{$staff_data->ext}}
                                            </div>
                                        </div>
                                        @endif
                                        @if($staff_data->mobile != "")
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:start">
                                                <img width="13" alt="phone" style="border:0; height:13px; width:13px; " src="https://www.nnpcgroup.com/emailsignature/images/phone.png"> &nbsp &nbsp &nbsp  {{$staff_data->mobile}}
                                            </div>
                                        </div>
                                        @endif
                                        @if($staff_data->email != "")
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:start">
                                                <img width="13" alt="email" style="border:0; height:13px; width:13px; " src="https://www.nnpcgroup.com/emailsignature/images/email.png"> &nbsp &nbsp &nbsp  {{$staff_data->email }}
                                            </div>
                                        </div>
                                        @endif
                                        @if($staff_data->department_name != "")
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:start; word-wrap:break-word;">
                                                <img width="13" alt="department" style="border:0; height:13px; width:13px; " src="{{url('img/structure.png')}}"> &nbsp &nbsp &nbsp  {{$staff_data->department_name }}
                                            </div>
                                        </div>
                                        @endif
                                        @if($staff_data->sbu != "")
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:start">
                                                <img width="13" alt="sbu" style="border:0; height:13px; width:13px; " src="{{url('img/office-building.png')}}"> &nbsp &nbsp &nbsp {{$staff_data->sbu }}
                                            </div>
                                        </div>
                                        @endif
                                        @if($staff_data->sbu != "" or $staff_data->loc_description != "")
                                            @if($staff_data->sbu == "NNPC Limited")
                                                <div class ="row">
                                                    <div class="col-sm-8" style="text-align:start">
                                                        <img width="13" alt="address" style="border:0; height:13px; width:13px; " src="https://www.nnpcgroup.com/emailsignature/images/address.png"> &nbsp &nbsp &nbsp  CHQ, {{$staff_data->loc_description ?? ''}}
                                                    </div>
                                                </div>
                                            @else
                                                <div class ="row">
                                                    <div class="col-sm-8" style="text-align:start">
                                                        <img width="13" alt="address" style="border:0; height:13px; width:13px; " src="https://www.nnpcgroup.com/emailsignature/images/address.png"> &nbsp &nbsp &nbsp  {{$staff_data->sbu ?? ''}}, {{$staff_data->loc_description ?? ''}}
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <div class="col-sm-2" style="margin-left: 20%">
                                                    <a href="tel:{{$staff_data->mobile ??''}}" class="btn">
                                                        <img width="13" alt="phone" style="border:0; height:20px; width:20px; " src="https://www.nnpcgroup.com/emailsignature/images/phone.png"> Call
                                                    </a>
                                            </div>
                                            <div class="col-sm-2" style="margin-left: 20%">
                                                    <a href = "mailto:{{$staff_data->email ?? ''}}" class="btn">
                                                        <img width="13" alt="email" style="border:0; height:20px; width:20px; " src="https://www.nnpcgroup.com/emailsignature/images/email.png"> Email
                                                    </a>
                                            </div><!-- /.col -->
                                        </div>
                                    </div>
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
                                <!-- /.row -->
                                <hr>
                            </div>
                        </div><!-- /.col -->
                    </div>
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
</section>

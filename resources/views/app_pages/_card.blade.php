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
                                    <!-- <div class="col-sm-4">
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
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-sm-5" style="text-align:right">
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
                                <div class="row">
                                    <div class="col-12" style="text-align: center">
                                    <strong>Digital Business Card</strong><br>
                                    <img id='qrImage' style='display:inline;'/>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-12" style="text-align: left">
                                        @include('app_pages/_cardMenu')
                                    </div>
                                </div>
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
                                <p>The card is reported missing or stolen</p>
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
        </section>
    </div><!-- /.row (main row) -->
            <script type="text/javascript">
                var lastName = '{{$staff_data->last_name }}';
                var firstName = '{{$staff_data->first_name }}';
                var email= '{!! $staff_data->email !!}';
                var phoneNo = '{{$staff_data->mobile }}';
                var title = '{{ $staff_data->designation }}';
                var org = "NNPC Limited";
                var sbu = '{{$staff_data->sbu }}';
                var address1 = '{{$staff_data->loc_description }}';
                var url = "https://nnpcgroup.com";
                //console.log(lastName,firstName,email,phoneNo,title,org,address1,url);
                

                function generateQRCode(){
                var startNode="BEGIN:VCARD"+"\n"+"VERSION:3.0"+"\n";
                var endNode="END:VCARD";
                startNode+="N:"+lastName+";"+firstName+"\n";
                startNode+="FN:"+firstName+" "+lastName+"\n";
                startNode+="EMAIL:"+email+"\n";
                startNode+="ORG:"+org+"\n";
                startNode+="TITLE:"+title+"\n";
                startNode+="URL:"+url+"\n";
                startNode+="TEL:"+phoneNo+"\n";
                startNode+="ADR:"+sbu+";"+address1+"\n";
                startNode+=endNode;
                this.qrImage.style.display ='none';
                this.qrImage.src="https://chart.googleapis.com/chart?cht=qr&choe=UTF-8&chs=200x200&chl="
                +encodeURIComponent(startNode);
                this.qrImage.style.display ='inline';
                this.vcard.value=startNode;
                this.vcard.style.display ='inline';
                this.vcardDiv.style.display ='inline';
                this.sampleQR.style.display ='none';
                }          

                generateQRCode();

            </script>
</section>

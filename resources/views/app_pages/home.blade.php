@extends('layouts.admin_layout')
@section('content')
<!-- Main content -->
<section class="content">
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
                                        <span>Blood Group<img  alt="phone" style="border:0; height:20px; width:20px; " src="{{url('img/blood drop.png')}}">:</span>&nbsp <span><strong>{{$staff_data->blood_group  ?? "UNKNOWN"}}</strong></span> &nbsp;&nbsp;
                                        <span>Height<img  alt="phone" style="border:0; height:15px; width:20px; " src="{{url('img/height.png')}}">:</span> &nbsp <span><strong>{{$staff_data->height ?? "UNKNOWN"}}</strong></span>&nbsp;&nbsp;
                                        <span>Emergency Contact <img  alt="phone" style="border:0; height:15px; width:15px; " src="{{url('img/emergency-call.png')}}">:&nbsp; &nbsp;</span><span><a href="tel:0946081000">0946081000</a></span>
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
                                        <br>
                                        {{$staff_data->designation}}
                                        <br>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-8 invoice-col">
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:start">
                                                <img width="13" alt="phone" style="border:0; height:13px; width:13px; " src="{{url('img/telephone.png')}}"> &nbsp &nbsp &nbsp  {{$staff_data->ext}}
                                            </div>
                                        </div>
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:start">
                                                <img width="13" alt="phone" style="border:0; height:13px; width:13px; " src="https://www.nnpcgroup.com/emailsignature/images/phone.png"> &nbsp &nbsp &nbsp  {{$staff_data->mobile}}
                                            </div>
                                        </div>
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:start">
                                                <img width="13" alt="phone" style="border:0; height:13px; width:13px; " src="https://www.nnpcgroup.com/emailsignature/images/email.png"> &nbsp &nbsp &nbsp  {{$staff_data->email }}
                                            </div>
                                        </div>
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:start">
                                                <img width="13" alt="phone" style="border:0; height:13px; width:13px; " src="{{url('img/structure.png')}}"> &nbsp &nbsp &nbsp  {{$staff_data->department_name }}
                                            </div>
                                        </div>
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:start">
                                                <img border="0" width="13" alt="phone" style="border:0; height:13px; width:13px; " src="{{url('img/office-building.png')}}"> &nbsp &nbsp &nbsp {{$staff_data->sbu }}
                                            </div>
                                        </div>
                                        <div class ="row">
                                            <div class="col-sm-8" style="text-align:start">
                                                <img border="0" width="13" alt="phone" style="border:0; height:13px; width:13px; " src="https://www.nnpcgroup.com/emailsignature/images/address.png"> &nbsp &nbsp &nbsp  {{$staff_data->sbu }}, {{$staff_data->loc_description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <div class="col-sm-2" style="margin-left: 20%">
                                                <div class="text-center">
                                                    <a href="tel:{{$staff_data->mobile ??''}}" class="btn">
                                                        <img width="13" alt="phone" style="border:0; height:20px; width:20px; " src="https://www.nnpcgroup.com/emailsignature/images/phone.png"> Call
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2" style="margin-left: 20%">
                                                <div class="text-center">
                                                    <a href = "mailto:{{$staff_data->email ?? ''}}" class="btn">
                                                        <img width="13" alt="phone" style="border:0; height:20px; width:20px; " src="https://www.nnpcgroup.com/emailsignature/images/email.png"> Email
                                                    </a>
                                                </div>
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
                    <div class="row">
                        <div class="col-sm-8">
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

<section class="content">
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
</section>

@extends('layouts.admin_layout')
@section('content')

    @include ('app_pages/_card')
    <!-- Main content -->
    <section class="content">
		<div class="card card-solid">
			<div class="card-body pb-0">

				<div class="card-body pt-0">
						<div class="card-header text-muted border-bottom-0">
                            <strong>Card History</strong>
						</div>
						 <div class="table-responsive">
							@if(count($card_history))
							 <table id="example1" class="table table-bordered table-striped">
							  <thead>
								<tr>
									<th>S/No</th>
									<th>Status</th>
									<th>Updated By</th>
									<th>Updated On</th>
									<th hidden></th>
								</tr>
							  </thead>
							  <tfoot>
								<tr>
									<th>S/No</th>
									<th>Status</th>
									<th>Updated By</th>
									<th>Updated On</th>
									<th hidden></th>
								</tr>
							  </tfoot>
							  <tbody>
							   @foreach ($card_history as $a => $history)
								<tr>
									<td>{{$a + 1}}</td>
									<td>{{$history->description}}</td>
									<td>{{$history->updated_by}}</td>
									<td>{{$history->updated_at}}</td>
									<td hidden></td>
								</tr>
								@endforeach
								</tbody>
							</table>
							@else
								<h5>No History</h5>
							@endif
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

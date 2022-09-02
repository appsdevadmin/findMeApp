@extends('layouts.portal_layout')
@section('content')
<div class="container-fluid">
	
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><b>Active States</b></h6>
		</div>
		<div class="card-body">
			<div class="col-xs-9">
				<div id="pop-div"></div>
				@geochart('Popularity', 'pop-div')
			</div>
		</div>
	<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><b>Active States</b></h6>
		</div>
		<div class="card-body">
			<div class="col-xs-9">
				<div id="popx-div"></div>
				@geochart('Centers', 'popx-div')
			</div>
		</div>
	</div>
	
	
</div>
				
@stop
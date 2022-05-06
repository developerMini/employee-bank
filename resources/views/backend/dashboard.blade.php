@extends('backend.common.main')

@section('content')

	<div class="block-header">
	  <h2>Dashboard</h2>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="info-box-2 bg-pink hover-zoom-effect">
				<div class="icon">
					<i class="material-icons">face</i>
				</div>
				<div class="content">
					<div class="text">Employee</div>
					<div class="number">{{$userCount}}</div>
				</div>
			</div>

		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="info-box-2 bg-blue hover-zoom-effect" data-toggle="modal" data-target="#importModal">
				
				<div class="icon">
					<i class="material-icons">backup</i>
				</div>
				<div class="content">
					<div class="text">UPLOAD</div>
					<div class="number">Employee</div>
				</div>
			</div>
		</div>
	</div>
	@include('backend.partials.import_userfile')
@endsection
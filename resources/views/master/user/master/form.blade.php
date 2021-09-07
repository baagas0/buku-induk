@extends('master.layouts.app')
@push('title', 'Pengguna Karyawan')
@section('content')
<div class="card card-custom gutter-b example example-compact">
	<div class="card-header">
		<h3 class="card-title">Horizontal Form Layout</h3>
		<div class="card-toolbar">
			<div class="example-tools justify-content-center">
				<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
				<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
			</div>
		</div>
	</div>
	<!--begin::Form-->
	<form class="form" method="POST" action="{{route('master.user.master.data')}}">
		<div class="card-body">
			<h3 class="font-size-lg text-dark font-weight-bold mb-6">1. Customer Info:</h3>
			<div class="mb-15">
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Full Name:</label>
					<div class="col-lg-6">
						<input type="email" class="form-control" placeholder="Enter full name" />
						<span class="form-text text-muted">Please enter your full name</span>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Email address:</label>
					<div class="col-lg-6">
						<input type="email" class="form-control" placeholder="Enter email" />
						<span class="form-text text-muted">We'll never share your email with anyone else</span>
					</div>
				</div>
			</div>
			<h3 class="font-size-lg text-dark font-weight-bold mb-6">2. Customer Account:</h3>
			<div class="mb-3">
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Holder:</label>
					<div class="col-lg-6">
						<select name="role_id" id="kelas" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6">
							<option value="">Pilih Kelas</option>
						</select>
						<span class="form-text text-muted">We'll never share your email with anyone else</span>
					</div>
				</div>
				<input type="submit" class="btn btn-success mr-2" value="submit">
					<div class="card-footer">
						<div class="row">
							<div class="col-lg-3"></div>
							<div class="col-lg-6">
								<button type="reset" type="submit" class="btn btn-success mr-2">Submit</button>
								<button type="reset" class="btn btn-secondary">Cancel</button>
							</div>
						</div>
					</div>
				</form>
				<!--end::Form-->
			</div>
			@endsection
			@push('css')
			@endpush
			@push('js')
			@endpush
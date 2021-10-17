@extends('teacher.layouts.app')
@push('title', 'Data Mata Pelajaran')
@section('content')
	<!--begin::Card-->
	<div class="card card-custom">
		<div class="card-header">
			<div class="card-title">
				<span class="card-icon">
					<i class="flaticon2-favourite text-primary"></i>
				</span>
				<h3 class="card-label">Mata Pelajaran</h3>
			</div>
			<div class="card-toolbar">
			</div>
		</div>
		<div class="card-body">
			<!--begin: Datatable-->
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
				<thead>
					<tr>
						<th style="width: 10px">No</th>
						<th>Komponen</th>
					</tr>
				</thead>
				<tbody>
					@foreach($kelompoks as $key => $kelompok)
					<tr>
						<td>{{ chr(substr("000".($key+65),-3)) }}</td>
						<td>{{ $kelompok->name }}</td>
					</tr>
						<?php $mapels = App\Mapel::where('kelompok_id', $kelompok->id)->get() ?>
						@foreach($mapels as $mapel)
							<?php $submapels = App\SubMapel::where('mapel_id', $mapel->id)->get() ?>
							<tr>
								<td rowspan="{{ $submapels->count() + 1 }}">{{ $loop->iteration }}</td>
								<td>{{ $mapel->name }}</td>
							</tr>
							@if($mapel->is_sub == 1)
								@foreach($submapels as $submapel)
								<tr>
									<td>{{ strtolower(chr(substr("000".($key+62),-2))).'. '.$submapel->name }}</td>
								</tr>
								@endforeach
							@endif
						@endforeach
					@endforeach
				</tbody>
			</table>
			<!--end: Datatable-->
		</div>
	</div>
	<!--end::Card-->
@endsection
@push('css')
<link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endpush
@push('js')
<script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script>
	"use strict";
	var KTDatatablesDataSourceHtml = function() {

		var initTable1 = function() {
			var table = $('#kt_datatablea');

		// begin first table
		table.DataTable({
			responsive: true,
			orderable: false,
			columnDefs: [
			{
				targets: -1,
				title: 'Actions',
				orderable: false,
				render: function(data, type, full, meta) {
					return '\
					<div class="dropdown dropdown-inline">\
					<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
					<i class="la la-cog"></i>\
					</a>\
					<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
					<ul class="nav nav-hoverable flex-column">\
					<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Edit Details</span></a></li>\
					<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-leaf"></i><span class="nav-text">Update Status</span></a></li>\
					<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-print"></i><span class="nav-text">Print</span></a></li>\
					</ul>\
					</div>\
					</div>\
					<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
					<i class="la la-edit"></i>\
					</a>\
					<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
					<i class="la la-trash"></i>\
					</a>\
					';
				},
			},

			],
		});

	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesDataSourceHtml.init();
});


</script>
@endpush

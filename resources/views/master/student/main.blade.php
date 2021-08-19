@extends('master.layouts.app')
@push('title', 'Siswa')
@section('content')
<!--begin::Notice-->
<div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
	<div class="alert-icon">
		<span class="svg-icon svg-icon-primary svg-icon-xl">
			<!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<rect x="0" y="0" width="24" height="24" />
					<path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
					<path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
				</g>
			</svg>
			<!--end::Svg Icon-->
		</span>
	</div>
	<div class="alert-text">The foundation for DataTables is progressive enhancement, so it is very adept at reading table information directly from the DOM. This example shows how easy it is to add searching, ordering and paging to your HTML table by simply running DataTables on it. See official documentation
	<a class="font-weight-bold" href="https://datatables.net/examples/data_sources/dom.html" target="_blank">here</a>.</div>
</div>
<!--end::Notice-->
<!--begin::Card-->
<div class="card card-custom">
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
		<div class="card-title">
			<h3 class="card-label">Data Siswa
			<span class="d-block text-muted pt-2 font-size-sm">Kumpulan seluruh data siswa</span></h3>
		</div>
		<div class="card-toolbar">
			<!--begin::Dropdown-->
			<div class="dropdown dropdown-inline mr-2">
				<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="svg-icon svg-icon-md">
					<!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24" />
							<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
							<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
						</g>
					</svg>
					<!--end::Svg Icon-->
				</span>Export</button>
				<!--begin::Dropdown Menu-->
				<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
					<!--begin::Navigation-->
					<ul class="navi flex-column navi-hover py-2">
						<li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
						<li class="navi-item">
							<a href="#" class="navi-link">
								<span class="navi-icon">
									<i class="la la-print"></i>
								</span>
								<span class="navi-text">Print</span>
							</a>
						</li>
						<li class="navi-item">
							<a href="#" class="navi-link">
								<span class="navi-icon">
									<i class="la la-copy"></i>
								</span>
								<span class="navi-text">Copy</span>
							</a>
						</li>
						<li class="navi-item">
							<a href="#" class="navi-link">
								<span class="navi-icon">
									<i class="la la-file-excel-o"></i>
								</span>
								<span class="navi-text">Excel</span>
							</a>
						</li>
						<li class="navi-item">
							<a href="#" class="navi-link">
								<span class="navi-icon">
									<i class="la la-file-text-o"></i>
								</span>
								<span class="navi-text">CSV</span>
							</a>
						</li>
						<li class="navi-item">
							<a href="#" class="navi-link">
								<span class="navi-icon">
									<i class="la la-file-pdf-o"></i>
								</span>
								<span class="navi-text">PDF</span>
							</a>
						</li>
					</ul>
					<!--end::Navigation-->
				</div>
				<!--end::Dropdown Menu-->
			</div>
			<!--end::Dropdown-->
			<!--begin::Button-->
			<a href="#" class="btn btn-primary font-weight-bolder">
			<span class="svg-icon svg-icon-md">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<rect x="0" y="0" width="24" height="24" />
						<circle fill="#000000" cx="9" cy="15" r="6" />
						<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>New Record</a>
			<!--end::Button-->
		</div>
	</div>
	<div class="card-body">
		<!--begin: Search Form-->
		<!--begin::Search Form-->
		<div class="mb-7">
			<div class="row align-items-center">
				<div class="col-lg-12 col-xl-12">
					<div class="row align-items-center">
						<div class="col-md-4 my-2 my-md-0">
							<div class="input-icon">
								<input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
								<span>
									<i class="flaticon2-search-1 text-muted"></i>
								</span>
							</div>
						</div>
						<div class="col-md-4 my-2 my-md-0">
							<div class="d-flex align-items-center">
								<label class="mr-3 mb-0 d-none d-md-block">Kelas:</label>
								<select class="form-control" id="kt_datatable_search_status">
									<option value="">Semua</option>
									@foreach($kelas as $row)
									<option value="{{ $row->id }}">{{ $row->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-4 my-2 my-md-0">
							<div class="d-flex align-items-center">
								<label class="mr-3 mb-0 d-none d-md-block">Data Anak Table:</label>
								<select class="form-control" id="kt_datatable_data_child_table">
									<option value="kelulusan">Kelulusan</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-xl-12 mt-12 mt-lg-3">
					<a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
					
					<button type="button" class="btn btn-light-warning px-6 font-weight-bold" id="reloadParentTable">
						<i class="flaticon2-reload"></i> Reload
					</button>
				</div>
			</div>
		</div>
		<!--end::Search Form-->
		<!--end: Search Form-->
		<!--begin: Datatable-->
		<div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
		<!--end: Datatable-->

		<!-- Begin Modal Update -->
		@include('master.student.modalUpdate')
		<!-- End Modal Update -->
	</div>
</div>
<!--end::Card-->
@endsection
@push('css')
<link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endpush
@push('js')
{{-- <script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script> --}}
<script src="/assets/js/pages/features/miscellaneous/sweetalert2.js"></script>
{{-- <script src="/assets/js/pages/crud/ktdatatable/child/data-ajax.js"></script> --}}
<script>
'use strict';
// Class definition

var KTDatatableChildRemoteDataDemo = function() {
	// Private functions

	// demo initializer
	var demo = function() {

		var datatable = $('#kt_datatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: '{{ route('master.student.data') }}',
					},
				},
				pageSize: 10, // display 20 records per page
				serverPaging: true,
				serverFiltering: true,
				serverSorting: true,
			},

			// layout definition
			layout: {
				scroll: false,
				footer: false,

				// enable/disable datatable spinner.
					spinner: {
						type: 1,
						theme: 'default',
					},
			},

			// column sorting
			sortable: true,

			pagination: true,

			detail: {
				title: 'Load sub table',
				content: subTableInit,
			},

			search: {
				input: $('#kt_datatable_search_query'),
				key: 'like'
			},

			// columns definition
			columns: [
				{
					field: 'id',
					title: '',
					sortable: false,
					width: 30,
					textAlign: 'center',
				},
				{
					field: 'nis',
					title: 'NIS',
					sortable: 'asc',
				},
				{
					field: 'name',
					title: 'Nama Siswa',
					sortable: 'asc',
				},
				{
					field: 'kelas.name',
					title: 'Kelas',
					sortable: 'asc',
				},
				{
					field: 'Actions',
					// width: 125,
					title: 'Actions',
					sortable: false,
					overflow: 'visible',
					autoHide: false,
					template: function(row) {
						return '\
	                        <div class="dropdown dropdown-inline">\
	                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown">\
	                                <span class="svg-icon svg-icon-md">\
		                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
		                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
		                                <rect x="0" y="0" width="24" height="24"/>\
		                                <path d="M8,17 C8.55228475,17 9,17.4477153 9,18 L9,21 C9,21.5522847 8.55228475,22 8,22 L3,22 C2.44771525,22 2,21.5522847 2,21 L2,18 C2,17.4477153 2.44771525,17 3,17 L3,16.5 C3,15.1192881 4.11928813,14 5.5,14 C6.88071187,14 8,15.1192881 8,16.5 L8,17 Z M5.5,15 C4.67157288,15 4,15.6715729 4,16.5 L4,17 L7,17 L7,16.5 C7,15.6715729 6.32842712,15 5.5,15 Z" fill="#000000" opacity="0.3"/>\
		                                <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000"/>\
		                                </g>\
		                                </svg>\
	                                </span>\
	                            </a>\
	                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
	                                <ul class="navi flex-column navi-hover py-2">\
	                                    <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">\
	                                        Pilih Aksi:\
	                                    </li>\
	                                    <li class="navi-item">\
	                                        <a href="{{ route('master.student.view') }}/'+row.nis+'" class="navi-link">\
	                                            <span class="navi-icon"><i class="la la-eye"></i></span>\
	                                            <span class="navi-text">Lihat</span>\
	                                        </a>\
	                                    </li>\
	                                    <li class="navi-item">\
	                                        <a href="#" class="navi-link">\
	                                            <span class="navi-icon"><i class="la la-file-pdf"></i></span>\
	                                            <span class="navi-text">Download PDF</span>\
	                                        </a>\
	                                    </li>\
	                                </ul>\
	                            </div>\
	                        </div>\
	                        <div class="dropdown dropdown-inline">\
	                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown">\
	                                <span class="svg-icon svg-icon-md">\
		                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
		                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
		                                <rect x="0" y="0" width="24" height="24"/>\
		                                <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"/>\
		                                <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"/>\
		                                </g>\
		                                </svg>\
	                                </span>\
	                            </a>\
	                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
	                                <ul class="navi flex-column navi-hover py-2">\
	                                    <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">\
	                                        Tambahkan data:\
	                                    </li>\
	                                    <li class="navi-item">\
	                                        <a href="" class="navi-link" data-student-id="'+row.id+'" data-student-name="'+row.name+'" data-type="create" data-toggle="modal" data-target="#updateUPD">\
	                                            <span class="navi-icon"><i class="la la-plus-square"></i></span>\
	                                            <span class="navi-text">UPD</span>\
	                                        </a>\
	                                    </li>\
	                                    <li class="navi-item">\
	                                        <a href="" class="navi-link" data-student-id="'+row.id+'" data-student-name="'+row.name+'" data-type="create" data-toggle="modal" data-target="#updateAspek">\
	                                            <span class="navi-icon"><i class="la la-plus-square"></i></span>\
	                                            <span class="navi-text">Aspek & Akhlak</span>\
	                                        </a>\
	                                    </li>\
	                                    <li class="navi-item">\
	                                        <a href="" class="navi-link" data-student-id="'+row.id+'" data-student-name="'+row.name+'" data-type="create" data-toggle="modal" data-target="#updateKetidakhadiran">\
	                                            <span class="navi-icon"><i class="la la-plus-square"></i></span>\
	                                            <span class="navi-text">Ketidakhadiran</span>\
	                                        </a>\
	                                    </li>\
	                                    <li class="navi-item">\
	                                        <a href="" class="navi-link" data-student-id="'+row.id+'" data-student-name="'+row.name+'" data-type="create" data-toggle="modal" data-target="#updatePrestasi">\
	                                            <span class="navi-icon"><i class="la la-plus-square"></i></span>\
	                                            <span class="navi-text">Prestasi</span>\
	                                        </a>\
	                                    </li>\
	                                    <li class="navi-item">\
	                                        <a href="" class="navi-link" data-student-id="'+row.id+'" data-student-name="'+row.name+'" data-type="create" data-toggle="modal" data-target="#updateKelulusan">\
	                                            <span class="navi-icon"><i class="la la-plus-square"></i></span>\
	                                            <span class="navi-text">Kelulusan</span>\
	                                        </a>\
	                                    </li>\
	                                </ul>\
	                            </div>\
	                        </div>\
	                        <a href="{{ route('master.student.detail') }}/personal/'+row.nis+'" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
	                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
	                        </a>\
	                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
	                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
	                        </a>\
	                    ';
					},
				}
			],
		});

		$('#kt_datatable_search_status').on('change', function() {
			datatable.search($(this).val().toLowerCase(), 'kelas_id');
		});

		$('#kt_datatable_data_child_table').on('change', function() {
			datatable.reload();
		});

		$('#reloadParentTable').on('click', function() {
			datatable.reload();
		});

		// Defind Student ID
		var student_id = null;

		// Start Jquery for crud UPD
		$('#upd_name').select2({
			dropdownAutoWidth : true,
		});
		$('#updateUPD').on('shown.bs.modal', function (e) {
			var type = e.relatedTarget.dataset.type;

			if (type == 'create') {
				var studentId = e.relatedTarget.dataset.studentId;
				var studentName = e.relatedTarget.dataset.studentName;

				student_id = studentId;
				$('#updateUPDLabel').text('Entry data UPD');
				$('#upd_name').attr('disabled', false);
				$('#updateUPD .student_fieldset').attr('hidden', false);
				$('#upd_student_name').val(studentName);

				$('#upd_th_pelajaran').val('');
				$('#upd_n_smt_1').val('');
				$('#upd_n_smt_2').val('');

				$('#upd_th_pelajaran').attr('disabled', false);
				$('#saveUpdateUpd').attr('data-button-type', 'create');
			}else {
				var id = e.relatedTarget.dataset.updId;
				$.ajax({
					type: "POST",
					url: "{{ route('master.student.data.upd') }}/"+id,
					success: function(data){
						toastr.success('Berhasil mengambil data UPD');
						console.log(data);
						$('#updateUPDLabel').text('Update UPD - '+data.upd.name);
						$('#upd_id').val(data.id);
						$('#updateUPD .student_fieldset').attr('hidden', true);
						$('#upd_name').val(data.upd.id).change();
						$('#upd_th_pelajaran').val(data.th_pelajaran);
						$('#upd_n_smt_1').val(data.n_smt_1);
						$('#upd_n_smt_2').val(data.n_smt_2);
						$('#saveUpdateUpd').attr('data-button-type', 'update');
					},
					error: function(data){
						toastr.error('Gagal mengambil data UPD');
					}
				});
			}
		});
		$('#saveUpdateUpd').on('click', function() {
			var type = $(this).attr('data-button-type');
			var id = $('#upd_id').val();

			if (type == 'create') {
				$.ajax({
					type: "POST",
					url: "{{ route('master.student.update.upd') }}/"+type,
					data: {
						upd_id: $('#upd_name').val(),
						th_pelajaran: $('#upd_th_pelajaran').val(),
						student_id: student_id,
						n_smt_1: $('#upd_n_smt_1').val(),
						n_smt_2: $('#upd_n_smt_2').val(),
					},
					success: function(data){
						toastr.success('Berhasil Menambah data UPD');
						$('#updateUPD').modal('hide');
						datatable.reload();
					},
					error: function(data){
						toastr.error('Gagal Menambah data UPD');
					}
				});	
			}else if(type == 'update') {
				$.ajax({
					type: "POST",
					url: "{{ route('master.student.update.upd') }}/"+type+'/'+id,
					data: {
						n_smt_1: $('#upd_n_smt_1').val(),
						n_smt_2: $('#upd_n_smt_2').val(),
					},
					success: function(data){
						toastr.success('Berhasil Mengedit data UPD');
						$('#updateUPD').modal('hide');
						datatable.reload();
					},
					error: function(data){
						toastr.error('Gagal Mengedit data UPD');
					}
				});				
			}
		});
		$('#kt_datatable').on('click', '.deleteUpd', function() {
			var table = $(this).attr('data-table');
			var fieldId = $(this).attr('data-field-id');

			Swal.fire({
				title: "Anda Yakin?",
				text: "Menghapus data kegiatan UPD",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Ya, hapus sekarang!"
			}).then(function(result) {
				if (result.value) {
					deleteData(table, fieldId);
				}
			});
		});

		// Start Jquery for crud Aspek
		$('#aspek_name').select2({
			dropdownAutoWidth : true,
		});
		$('#updateAspek').on('shown.bs.modal', function (e) {
			var type = e.relatedTarget.dataset.type;
			console.log(type);

			if (type == 'create') {
				var studentId = e.relatedTarget.dataset.studentId;
				var studentName = e.relatedTarget.dataset.studentName;

				student_id = studentId;
				$('#updateAspekLabel').text('Entry data Aspek');
				$('#aspek_name').attr('disabled', false);
				$('#aspek_th_pelajaran').attr('disabled', false);
				$('#updateAspek .student_fieldset').attr('hidden', false);
				$('#aspek_student_name').val(studentName);

				$('#aspek_th_pelajaran').val('');
				$('#aspek_n_smt_1').val('');
				$('#aspek_n_smt_2').val('');

				$('#saveUpdateAspek').attr('data-button-type', 'create');
			}else {
				var id = e.relatedTarget.dataset.aspekId;
				$.ajax({
					type: "POST",
					url: "{{ route('master.student.data.akhlak') }}/"+id,
					success: function(data){
						toastr.success('Berhasil mengambil data UPD');
						console.log(data);
						$('#updateAspekLabel').text('Update Aspek - '+data.aspek.name);
						$('#aspek_id').val(data.id);
						$('#aspek_name').val(data.aspek.id).change();

						$('#aspek_name').attr('disabled', true);
						$('#aspek_th_pelajaran').attr('disabled', true);

						$('#aspek_th_pelajaran').val(data.th_pelajaran);
						$('#aspek_n_smt_1').val(data.n_smt_1);
						$('#aspek_n_smt_2').val(data.n_smt_2);
						$('#saveUpdateAspek').attr('data-button-type', 'update');
					},
					error: function(data){
						toastr.error('Gagal mengambil data UPD');
					}
				});
			}
		});
		$('#saveUpdateAspek').on('click', function() {
			var type = $(this).attr('data-button-type');
			var n_smt_1 = $('#aspek_n_smt_1').val();
			var n_smt_2 = $('#aspek_n_smt_2').val();

			if (type == 'create') {
				$.ajax({
					type: "POST",
					url: "{{ route('master.student.update.akhlak') }}/"+type,
					data: {
						aspek_id: $('#aspek_name').val(),
						th_pelajaran: $('#aspek_th_pelajaran').val(),
						student_id: student_id,
						n_smt_1: $('#aspek_n_smt_1').val(),
						n_smt_2: $('#aspek_n_smt_2').val(),
					},
					success: function(data){
						toastr.success('Berhasil Menambah data UPD');
						$('#saveUpdateAspek').modal('hide');
						datatable.reload();
					},
					error: function(data){
						toastr.error('Gagal Menambah data UPD');
					}
				});	
			}else if(type == 'update') {
				var id = $('#aspek_id').val();
				$.ajax({
					type: "POST",
					url: "{{ route('master.student.update.akhlak') }}/"+type+'/'+id,
					data: {
						n_smt_1: n_smt_1,
						n_smt_2: n_smt_2,
					},
					success: function(data){
						toastr.success('Berhasil Mengedit data Aspek');
						$('#updateAspek').modal('hide');
						datatable.reload();
					},
					error: function(data){
						toastr.error('Gagal Mengedit data Aspek');
					}
				});
			}
		});
		$('#kt_datatable').on('click', '.deleteAspek', function() {
			var table = $(this).attr('data-table');
			var fieldId = $(this).attr('data-field-id');

			Swal.fire({
				title: "Anda Yakin?",
				text: "Menghapus data kegiatan Aspek",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Ya, hapus sekarang!"
			}).then(function(result) {
				if (result.value) {
					deleteData(table, fieldId);
				}
			});
		});

		// Start Jquery for crud Ketidakhadiran
		$('#ketidakhadiran_name').select2({
			dropdownAutoWidth : true,
		});
		$('#updateKetidakhadiran').on('shown.bs.modal', function (e) {
			var type = e.relatedTarget.dataset.type;
			console.log(type);

			if (type == 'create') {
				var studentId = e.relatedTarget.dataset.studentId;
				var studentName = e.relatedTarget.dataset.studentName;

				student_id = studentId;
				console.log(studentId);
				console.log(studentName);
				$('#updateKetidakhadiranLabel').text('Entry data Ketidakhadiran');
				$('#ketidakhadiran_name').attr('disabled', false);
				$('#ketidakhadiran_th_pelajaran').attr('disabled', false);
				$('#updateKetidakhadiran .student_fieldset').attr('hidden', false);
				$('#ketidakhadiran_student_name').val(studentName);

				$('#ketidakhadiran_th_pelajaran').val('');
				$('#ketidakhadiran_n_smt_1').val('');
				$('#ketidakhadiran_n_smt_2').val('');

				$('#saveUpdateKetidakhadiran').attr('data-button-type', 'create');
			}else {
				var id = e.relatedTarget.dataset.ketidakhadiranId;
				$.ajax({
					type: "POST",
					url: "{{ route('master.student.data.ketidakhadiran') }}/"+id,
					success: function(data){
						toastr.success('Berhasil mengambil data UPD');
						console.log(data);
						$('#updateKetidakhadiranLabel').text('Update Ketidakhadiran - '+data.ketidakhadiran.name);
						$('#ketidakhadiran_id').val(data.id);
						$('#ketidakhadiran_name').val(data.ketidakhadiran.id).change();
						$('#ketidakhadiran_th_pelajaran').val(data.th_pelajaran);
						$('#ketidakhadiran_n_smt_1').val(data.n_smt_1);
						$('#ketidakhadiran_n_smt_2').val(data.n_smt_2);

						$('#ketidakhadiran_name').attr('disabled', true);
						$('#ketidakhadiran_th_pelajaran').attr('disabled', true);
						$('#saveUpdateKetidakhadiran').attr('data-button-type', 'update');
					},
					error: function(data){
						toastr.error('Gagal mengambil data UPD');
					}
				});
			}
		});
		$('#saveUpdateKetidakhadiran').on('click', function() {
			var type = $(this).attr('data-button-type');
			var n_smt_1 = $('#ketidakhadiran_n_smt_1').val();
			var n_smt_2 = $('#ketidakhadiran_n_smt_2').val();

			if (type == 'create') {
				$.ajax({
					type: "POST",
					url: "{{ route('master.student.update.ketidakhadiran') }}/"+type,
					data: {
						ketidakhadiran_id: $('#ketidakhadiran_name').val(),
						th_pelajaran: $('#ketidakhadiran_th_pelajaran').val(),
						student_id: student_id,
						n_smt_1: n_smt_1,
						n_smt_2: n_smt_2,
					},
					success: function(data){
						toastr.success('Berhasil Menambah data UPD');
						$('#updateKetidakhadiran').modal('hide');
						datatable.reload();
					},
					error: function(data){
						toastr.error('Gagal Menambah data UPD');
					}
				});	
			}else if(type == 'update') {
				var id = $('#ketidakhadiran_id').val();
				
				$.ajax({
					type: "POST",
					url: "{{ route('master.student.update.ketidakhadiran') }}/"+id,
					data: {
						n_smt_1: n_smt_1,
						n_smt_2: n_smt_2,
					},
					success: function(data){
						toastr.success('Berhasil Mengedit data Ketidakhadiran');
						$('#updateKetidakhadiran').modal('hide');
						datatable.reload();
					},
					error: function(data){
						toastr.error('Gagal Mengedit data Ketidakhadiran');
					}
				});
			}else {

			}
		});
		$('#kt_datatable').on('click', '.deleteKetidakhadiran', function() {
			var table = $(this).attr('data-table');
			var fieldId = $(this).attr('data-field-id');

			Swal.fire({
				title: "Anda Yakin?",
				text: "Menghapus data kegiatan Ketidakhadiran",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Ya, hapus sekarang!"
			}).then(function(result) {
				if (result.value) {
					deleteData(table, fieldId);
				}
			});
		});

		// Start Jquery for crud Prestasi
		$('#prestasi_kegiatan').select2({
			// width: 'element',
			dropdownAutoWidth : true,
			placeholder: "Select a state"
		});
		$('#updatePrestasi').on('shown.bs.modal', function (e) {
			var type = e.relatedTarget.dataset.type;
			console.log(type);

			if (type == 'create') {
				var studentId = e.relatedTarget.dataset.studentId;
				var studentName = e.relatedTarget.dataset.studentName;

				student_id = studentId;
				$('#updatePrestasiLabel').text('Entry data Prestasi');

				$('#saveUpdatePrestasi').attr('data-button-type', 'create');
			}else {
				var id = e.relatedTarget.dataset.prestasiId;
				$.ajax({
					type: "POST",
					url: "{{ route('master.student.data.prestasi') }}/"+id,
					success: function(data){
						toastr.success('Berhasil mengambil data UPD');
						console.log(data);
						$('#updatePrestasiLabel').text('Update Sertifikat Prestasi');
						$('#prestasi_id').val(data.id);
						$('#nomor_sertifikat').val(data.nomor_sertifikat);
						$("#prestasi_kegiatan").val(data.kegiatan_id).change();

						$('#saveUpdatePrestasi').attr('data-button-type', 'update');
					},
					error: function(data){
						toastr.error('Gagal mengambil data UPD');
					}
				});
			}
		});
		$('#saveUpdatePrestasi').on('click', function() {
			var type = $(this).attr('data-button-type');
			var kegiatan_id = $('#prestasi_kegiatan').val();
			var nomor_sertifikat = $('#nomor_sertifikat').val();

			if (type == 'create') {
				$.ajax({
					type: "POST",
					url: "{{ route('master.student.update.prestasi') }}/"+type,
					data: {
						student_id: student_id,
						kegiatan_id: kegiatan_id,
						nomor_sertifikat: nomor_sertifikat,
					},
					success: function(data){
						toastr.success('Berhasil Menambah data Prestasi');
						$('#updatePrestasi').modal('hide');
						datatable.reload();
					},
					error: function(data){
						toastr.error('Gagal Menambah data Prestasi');
					}
				});	
			}else if(type == 'update') {
				var id = $('#prestasi_id').val();

				$.ajax({
					type: "POST",
					url: "{{ route('master.student.update.prestasi') }}/"+type+'/'+id,
					data: {
						kegiatan_id: kegiatan_id,
						nomor_sertifikat: nomor_sertifikat,
					},
					success: function(data){
						toastr.success('Berhasil Mengedit data Prestasi');
						$('#updatePrestasi').modal('hide');
						datatable.reload();
					},
					error: function(data){
						toastr.error('Gagal Mengedit data Prestasi');
					}
				});
			}
		});
		$('#kt_datatable').on('click', '.deletePrestasi', function() {
			var table = $(this).attr('data-table');
			var fieldId = $(this).attr('data-field-id');

			Swal.fire({
				title: "Anda Yakin?",
				text: "Menghapus data kegiatan Prestasi",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Ya, hapus sekarang!"
			}).then(function(result) {
				if (result.value) {
					deleteData(table, fieldId);
				}
			});
		});

		// Start Jquery for crud Kelulusan
		$('#kelulusan_uraian').select2({
			// width: 'element',
			dropdownAutoWidth : true,
			placeholder: "Select a state"
		});
		$('#updateKelulusan').on('shown.bs.modal', function (e) {
			var type = e.relatedTarget.dataset.type;
			console.log(type);

			if (type == 'create') {
				var studentId = e.relatedTarget.dataset.studentId;
				var studentName = e.relatedTarget.dataset.studentName;

				student_id = studentId;
				$('#updateKelulusanLabel').text('Entry data Kelulusan');
				$('#kelulusan_ijazah').val('');
				$('#kelulusan_skhun').val('');
				$('#kelulusan_shuambn').val('');

				$('#saveUpdateKelulusan').attr('data-button-type', 'create');
			}else {
				var id = e.relatedTarget.dataset.kelulusanId;
				$.ajax({
					type: "POST",
					url: "{{ route('master.student.data.kelulusan') }}/"+id,
					success: function(data){
						toastr.success('Berhasil mengambil data UPD');
						console.log(data);
						$('#updateKelulusanLabel').text('Update Data Nilai Kelulusan');
						$('#kelulusan_id').val(data.id);


						$('#kelulusan_uraian').val(data.uraian).change();
						$('#kelulusan_ijazah').val(data.ijazah);
						$('#kelulusan_skhun').val(data.skhun);
						$('#kelulusan_shuambn').val(data.shuambn);

						$('#saveUpdateKelulusan').attr('data-button-type', 'update');
					},
					error: function(data){
						toastr.error('Gagal mengambil data UPD');
					}
				});
			}
		});
		$('#saveUpdateKelulusan').on('click', function() {
			var type = $(this).attr('data-button-type');

			if (type == 'create') {
				$.ajax({
					type: "POST",
					url: "{{ route('master.student.update.kelulusan') }}/"+type,
					data: {
						student_id: student_id,
						uraian: $('#kelulusan_uraian').val(),
						ijazah: $('#kelulusan_ijazah').val(),
						skhun: $('#kelulusan_skhun').val(),
						shuambn: $('#kelulusan_shuambn').val(),
					},
					success: function(data){
						toastr.success('Berhasil Menambah data Prestasi');
						$('#updatePrestasi').modal('hide');
						datatable.reload();
					},
					error: function(data){
						toastr.error('Gagal Menambah data Prestasi');
					}
				});	
			}else if(type == 'update') {
				var id = $('#kelulusan_id').val();

				$.ajax({
					type: "POST",
					url: "{{ route('master.student.update.kelulusan') }}/"+type+'/'+id,
					data: {
						ijazah: $('#kelulusan_ijazah').val(),
						skhun: $('#kelulusan_skhun').val(),
						shuambn: $('#kelulusan_shuambn').val(),
					},
					success: function(data){
						toastr.success('Berhasil Mengedit data Kelulusan');
						$('#updateKelulusan').modal('hide');
						datatable.reload();
					},
					error: function(data){
						toastr.error('Gagal Mengedit data Kelulusan');
					}
				});
			}
		});
		$('#kt_datatable').on('click', '.deleteKelulusan', function() {
			var table = $(this).attr('data-table');
			var fieldId = $(this).attr('data-field-id');

			Swal.fire({
				title: "Anda Yakin?",
				text: "Menghapus data kegiatan Kelulusan",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Ya, hapus sekarang!"
			}).then(function(result) {
				if (result.value) {
					deleteData(table, fieldId);
				}
			});
		});

		function subTableInit(e) {
			console.log(e);
			var childUrl = '';
			var childColumn = [];
			var childTable = $('#kt_datatable_data_child_table').val();
			if (childTable == 'upd') {
				toastr.warning('Menampilkan Data UPD '+e.data.name);
				childUrl = '{{ route('master.student.data.upd') }}';
				childColumn = [
					{
						field: 'id',
						title: '#',
						sortable: false,
						width: 30,
					},
					{
						field: 'upd.name',
						title: 'Nama',
					},
					{
						field: 'th_pelajaran',
						title: 'Tahun',
					},
					{
						field: 'n_smt_1',
						title: 'Nilai Semester 1',
					},
					{
						field: 'n_smt_2',
						title: 'Nilai Semester 2',
					},
					{
						field: 'Actions',
						width: 125,
						title: 'Actions',
						sortable: false,
						overflow: 'visible',
						autoHide: false,
						template: function(row) {
							return '\
							<button class="btn btn-sm btn-clean btn-icon mr-2 buttonUpdateUPD" title="Edit details" data-type="update" data-upd-id="'+row.id+'" data-toggle="modal" data-target="#updateUPD">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
	                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
	                        </button>\
	                        <button data-table="upd_scores" data-field-id="'+row.id+'" class="btn btn-sm btn-clean btn-icon deleteUpd" title="Delete">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
	                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
	                        </button>';
						}
					}
				];
			}else if(childTable == 'akhlak') {
				toastr.warning('Menampilkan Data Aspek '+e.data.name);
				childUrl = '{{ route('master.student.data.akhlak') }}';
				childColumn = [
					{
						field: 'id',
						title: '#',
						sortable: false,
						width: 30,
					},
					{
						field: 'aspek.name',
						title: 'Nama',
					},
					{
						field: 'th_pelajaran',
						title: 'Tahun',
					},
					{
						field: 'n_smt_1',
						title: 'Nilai Semester 1',
					},
					{
						field: 'n_smt_2',
						title: 'Nilai Semester 2',
					},
					{
						field: 'Actions',
						width: 125,
						title: 'Actions',
						sortable: false,
						overflow: 'visible',
						autoHide: false,
						template: function(row) {
							return '\
							<button class="btn btn-sm btn-clean btn-icon mr-2 buttonUpdateAspek" title="Edit details" data-type="update" data-aspek-id="'+row.id+'" data-toggle="modal" data-target="#updateAspek">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
	                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
	                        </button>\
	                        <button data-table="aspek_scores" data-field-id="'+row.id+'" class="btn btn-sm btn-clean btn-icon deleteAspek" title="Delete">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
	                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
	                        </button>';
						}
					}
				];
			}else if(childTable == 'ketidakhadiran') {
				toastr.warning('Menampilkan Data Ketidakhadiran '+e.data.name);
				childUrl = '{{ route('master.student.data.ketidakhadiran') }}';
				childColumn = [
					{
						field: 'id',
						title: '#',
						sortable: false,
						width: 30,
					},
					{
						field: 'ketidakhadiran.name',
						title: 'Nama',
					},
					{
						field: 'th_pelajaran',
						title: 'Tahun',
					},
					{
						field: 'n_smt_1',
						title: 'Jumlah Semester 1',
					},
					{
						field: 'n_smt_2',
						title: 'Jumlah Semester 2',
					},
					{
						field: 'Actions',
						width: 125,
						title: 'Actions',
						sortable: false,
						overflow: 'visible',
						autoHide: false,
						template: function(row) {
							return '\
							<button class="btn btn-sm btn-clean btn-icon mr-2 buttonUpdateKetidakhadiran" title="Edit details" data-type="update" data-ketidakhadiran-id="'+row.id+'" data-toggle="modal" data-target="#updateKetidakhadiran">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
	                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
	                        </button>\
	                        <button data-table="ketidakhadiran_scores" data-field-id="'+row.id+'" class="btn btn-sm btn-clean btn-icon deleteKetidakhadiran" title="Delete">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
	                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
	                        </button>';
						}
					}
				];
			}else if(childTable == 'prestasi') {
				toastr.warning('Menampilkan Data Prestasi Siswa '+e.data.name);
				childUrl = '{{ route('master.student.data.prestasi') }}';
				childColumn = [
					{
						field: 'id',
						title: '#',
						sortable: false,
						width: 30,
					},
					{
						field: 'kegiatan.name',
						title: 'Nama',
					},
					{
						field: 'nomor_sertifikat',
						title: 'Nomor Sertifikat',
					},
					{
						field: 'Actions',
						width: 125,
						title: 'Actions',
						sortable: false,
						overflow: 'visible',
						autoHide: false,
						template: function(row) {
							return '\
							<button class="btn btn-sm btn-clean btn-icon mr-2 buttonUpdatePrestasi" title="Edit details" data-type="update" data-prestasi-id="'+row.id+'" data-toggle="modal" data-target="#updatePrestasi">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
	                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
	                        </button>\
	                        <button data-table="prestasis" data-field-id="'+row.id+'" class="btn btn-sm btn-clean btn-icon deletePrestasi" title="Delete">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
	                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
	                        </button>';
						}
					}
				];
			}else if(childTable == 'kelulusan') {
				toastr.warning('Menampilkan Data Kelulusan Siswa '+e.data.name);
				childUrl = '{{ route('master.student.data.kelulusan') }}';
				childColumn = [
					{
						field: 'id',
						title: '#',
						sortable: false,
						width: 30,
					},
					{
						field: 'uraian',
						title: 'Nama',
					},
					{
						field: 'ijazah',
						title: 'Ijazah',
					},
					{
						field: 'skhun',
						title: 'SKHUN',
					},
					{
						field: 'shuambn',
						title: 'SHUAMBN',
					},
					{
						field: 'Actions',
						width: 125,
						title: 'Actions',
						sortable: false,
						overflow: 'visible',
						autoHide: false,
						template: function(row) {
							return '\
							<button class="btn btn-sm btn-clean btn-icon mr-2 buttonUpdateKelulusan" title="Edit details" data-type="update" data-kelulusan-id="'+row.id+'" data-toggle="modal" data-target="#updateKelulusan">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
	                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
	                        </button>\
	                        <button data-table="kelulusans" data-field-id="'+row.id+'" class="btn btn-sm btn-clean btn-icon deleteKelulusan" title="Delete">\
	                            <span class="svg-icon svg-icon-md">\
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
	                                        <rect x="0" y="0" width="24" height="24"/>\
	                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
	                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
	                                    </g>\
	                                </svg>\
	                            </span>\
	                        </button>';
						}
					}
				];
			}else {
			}
			
			$('<div/>').attr('id', 'child_data_ajax_' + e.data.id).appendTo(e.detailCell).KTDatatable({
				data: {
					type: 'remote',
					source: {
						read: {
							url: childUrl,
							params: {
								// custom query params
								query: {
									nis: e.data.nis,
								},
							},
						},
					},
					pageSize: 5,
					serverPaging: true,
					serverFiltering: false,
					serverSorting: true,
				},

				// layout definition
				layout: {
					scroll: false,
					footer: false,

					// enable/disable datatable spinner.
					spinner: {
						type: 1,
						theme: 'default',
					},
				},

				sortable: true,

				// columns definition
				columns: childColumn
			});
		}

		function deleteData(table, fieldId) {
			$.ajax({
				type: "POST",
				url: "{{ route('master.student.delete.data') }}/"+table+"/"+fieldId,
				success: function(data){
					toastr.success('Berhasil Menghapus Data');
					datatable.reload();
				},
				error: function(data){
					toastr.error('Gagal Menghapus Data');
				}
			});
		}

		



		
	};

	return {
		init: function() {
			demo();
		},
	};
}();

jQuery(document).ready(function() {
	KTDatatableChildRemoteDataDemo.init();	
});
</script>
@endpush
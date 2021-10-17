@extends('master.layouts.app')
@push('title', 'PDF Management')
@section('instruction', 'pdf_management_page')
@section('content')
<!--begin::Card-->
<div class="card card-custom">
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
		<div class="card-title">
			<h3 class="card-label">Data E-Rapor
			<span class="d-blocktext-muted pt-2 font-size-sm"></span></h3>
		</div>
		<div class="card-toolbar">
			<!--begin::Button-->
			<button type="button" class="btn btn-primary font-weight-bolder"data-toggle="modal" data-target="#modalCreate">
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
			</span>New Record</button>
			<!--end::Button-->
		</div>
	</div>
	<div class="card-body">
		<!--begin: Search Form-->
		<!--begin::Search Form-->
		<div class="mb-7">
			<div class="row align-items-center">
				<div class="col-lg-9 col-xl-8">
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
								<label class="mr-3 mb-0 d-none d-md-block">Status:</label>
								<select class="form-control" id="kt_datatable_search_status">
									<option value="">All</option>
									<option value="1">Pending</option>
									<option value="2">Delivered</option>
									<option value="3">Canceled</option>
									<option value="4">Success</option>
									<option value="5">Info</option>
									<option value="6">Danger</option>
								</select>
							</div>
						</div>
						<div class="col-md-4 my-2 my-md-0">
							<div class="d-flex align-items-center">
								<label class="mr-3 mb-0 d-none d-md-block">Type:</label>
								<select class="form-control" id="kt_datatable_search_type">
									<option value="">All</option>
									<option value="1">Online</option>
									<option value="2">Retail</option>
									<option value="3">Direct</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
					<a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
					<button id="refreshData" class="btn btn-light-warning px-6 font-weight-bold">Refresh</button>
				</div>
			</div>
		</div>
		<!--end::Search Form-->
		<!--end: Search Form-->

		<!--begin: Datatable-->
		<div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
		<!--end: Datatable-->

		<div class="modal fade" id="modalCreate" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalCreateLabel">Buat File PDF Baru</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i aria-hidden="true" class="ki ki-close"></i>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<div class="col-lg-6">
									<label class="option">
										<span class="option-control">
											<span class="radio">
												<input type="radio" name="semester" value="0" checked="checked"/>
												<span></span>
											</span>
										</span>
										<span class="option-label">
											<span class="option-head">
												<span class="option-title">
													Semua Semester
												</span>
											</span>
											<span class="option-body">
												Menampilkan semua semester
											</span>
										</span>
									</label>
								</div>
								<div class="col-lg-6">
									<label class="option">
										<span class="option-control">
											<span class="radio">
												<input type="radio" name="semester" value="1"/>
												<span></span>
											</span>
										</span>
										<span class="option-label">
											<span class="option-head">
												<span class="option-title">
													Semester 1
												</span>
											</span>
											<span class="option-body">
												Hanya menampilkan semester 1
											</span>
										</span>
									</label>
								</div>
								<div class="col-lg-6">
									<label class="option">
										<span class="option-control">
											<span class="radio">
												<input type="radio" name="semester" value="2"/>
												<span></span>
											</span>
										</span>
										<span class="option-label">
											<span class="option-head">
												<span class="option-title">
													Semester 2
												</span>
											</span>
											<span class="option-body">
												Hanya menampilkan semester 2
											</span>
										</span>
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tahun Pelajaran:</label>
							<select class="form-control select2" id="th_pelajaran" name="th_pelajaran" style="width:100%" multiple="multiple">
								@php
									$y = date('Y');
									for ($i=$y-5; $i < $y+3; $i++) {
								@endphp
									<option {{ $i == $y ? 'selected' : '' }}>{{ $i }}</option>";
								@php
									}
								@endphp
							</select>
							<span class="form-text text-muted">Pilih Data Tahun Pelajaran</span>
						</div>
						<div class="form-group">
							<label>Kelas:</label>
							<select class="form-control select2" id="kelas_id" name="kelas_id" style="width:100%">
								@foreach($kelas as $row)
									<option value="{{ $row->id }}">{{ $row->name }}</option>";
								@endforeach
							</select>
							<span class="form-text text-muted">Pilih Data Kelas</span>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
						<button type="submit" id="saveModalCreate" data-button-type="update" class="btn btn-primary font-weight-bold">Save changes</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end::Card-->

@endsection
@push('css')
@endpush
@push('js')
<script type="text/javascript">
	'use strict';
// Class definition

var KTDefaultDatatableDemo = function() {
	// basic demo
	var demo = function() {

		var datatable = $('#kt_datatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: '{{ route('master.pdf.data') }}',
					},
				},
				pageSize: 5, // display 20 records per page
				serverPaging: true,
				serverFiltering: true,
				serverSorting: true,
				// autoColumns: true,
			},

			// layout definition
			layout: {
				scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
				minHeight: null, // datatable's body's fixed height
				footer: false, // display/hide footer
				// spinner: {
					// type: 'none',
				// }
			},

			// column sorting
			sortable: true,

			// toolbar
			toolbar: {
				// toolbar placement can be at top or bottom or both top and bottom repeated
				placement: ['bottom'],

				// toolbar items
				items: {
					// pagination
					pagination: {
						// page size select
						pageSizeSelect: [5, 10, 20, 30, 50], // display dropdown to select pagination size. -1 is used for "ALl" option
					},
				},
			},

			search: {
				input: $('#kt_datatable_search_query'),
				key: 'generalSearch'
			},

			// columns definition
			columns: [
				{
					field: 'RecordID',
					title: '#',
					sortable: false,
					width: 30,
					type: 'number',
					selector: {class: 'checkbox'},
					textAlign: 'center',
				}, {
					field: 'token',
					title: 'Token',
				}, {
					field: 'kelas.name',
					title: 'Kelas',
				}, {
					field: 'th_pelajaran',
					title: 'Tahun Pelajaran',
					template: function(row) {
						var th_pelajaran = JSON.parse(row.th_pelajaran);
						var label = '';
						console.log(th_pelajaran.length);

						for (var i=0;i<th_pelajaran.length;i++) {
							label += '<span class="label font-weight-bold label-lg label-light-info label-inline" style="margin: 3px">'+th_pelajaran[i]+'</span>';
						}

						return label;
					}
				}, {
					field: 'status',
					title: 'Status',
					autoHide: false,
					// callback function support for column rendering
					template: function(row) {
						var status = {
							'pending': {'title': 'Pending', 'state': 'warning'},
							'proccess': {'title': 'On Proccess', 'state': 'primary'},
							'success': {'title': 'Success', 'state': 'success'},
							'error': {'title': 'Error', 'state': 'danger'},
						};
						return '<span id="dotStatusData'+row.id+'" class="label label-' + status[row.status].state + ' label-dot mr-2"></span><span id="textStatusData'+row.id+'" class="font-weight-bold text-' + status[row.status].state +
							'">' +
							status[row.status].title + '</span>';
					},
				}, {
					field: 'create_on',
					title: 'Progress',
					template: function(row) {
						var status = {
							'pending': {'title': 'Pending'},
							'proccess': {'title': 'On Proccess'},
							'success': {'title': 'Success'},
							'error': {'title': 'Error'},
						};
						var progress = row.progress;
						return '\
						<div class="progress">\
							<div class="progress-bar progress-bar-striped progress-bar-animated bg-' + row.state + '" id="progressBarData'+row.id+'" role="progressbar" style="width: '+ progress +'%" aria-valuenow="'+ progress +'" aria-valuemin="0" aria-valuemax="100">'+ progress +'%</div>\
						</div>\
						';
					}
				},{
					field: 'Actions',
					title: 'Actions',
					sortable: false,
					width: 125,
					overflow: 'visible',
					autoHide: false,
					template: function(row) {
						return '\
	                        <a href="{{route('master.pdf.view')}}/'+row.token+'" id"edit" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">\
	                            <span class="svg-icon svg-icon-md">\
		                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
		                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
		                            <rect x="0" y="0" width="24" height="24"/>\
		                            <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\
		                            <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>\
		                            </g>\
		                            </svg>\
	                            </span>\
	                        </a>';
					},
				}
			],

		});

		$('#refreshData').on('click', function(){
			datatable.reload();
		})
		$('#edit').on('click', function(){

		})

		$('#kt_datatable_search_status').on('change', function() {
			datatable.search($(this).val().toLowerCase(), 'Status');
		});

		$('#kt_datatable_search_type').on('change', function() {
			datatable.search($(this).val().toLowerCase(), 'Type');
		});

		$('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();

	};

	var progressBar = function() {

		setInterval(getData, 2000);
		function getData() {
			$.ajax({
				type: "POST",
				url: "{{ route('master.pdf.progress.data') }}",
				success: function(data){
					console.log(data);
					for (var i = 0; i < data.length; i++) {
						var r = data[i];

						var element = $('#progressBarData'+r.id);

						element.attr('class', 'progress-bar progress-bar-striped progress-bar-animated bg-'+r.state);
						element.attr('style', 'width: '+r.progress+'%');
						element.text(r.progress+'%');

						if (r.progress > 99) {
							$('#refreshData').trigger('click');
						}

						var status = {
							'pending': {'title': 'Pending', 'state': 'warning'},
							'proccess': {'title': 'On Proccess', 'state': 'primary'},
							'success': {'title': 'Success', 'state': 'success'},
							'error': {'title': 'Error', 'state': 'danger'},
						};

						$('#dotStatusData'+r.id).attr('class', 'label label-'+status[r.status].state+' label-dot mr-2');
						$('#textStatusData'+r.id).attr('class', 'font-weight-bold text-'+status[r.status].state);
						$('#textStatusData'+r.id).text(status[r.status].title);
					}
				},
				error: function(data){
					toastr.error('Gagal mengambil data Rapor');
				}
			});
		}
	}

	// Private functions
	var create = function() {
		$('#th_pelajaran').select2({
			placeholder: "Select a state",
		});

		$('#kelas_id').select2({
			placeholder: "Select a state",
		});

		$('#saveModalCreate').click(function() {
			$.ajax({
				type: "POST",
				url: "{{ route('master.pdf.saving') }}",
				data: {
					th_pelajaran: $('#th_pelajaran').val(),
					kelas_id: $('#kelas_id').val(),
				},
				success: function(data){
					toastr.success('Berhasil Menambah data E-rapor');
					$('#kt_datatable').KTDatatable('reload');
					$('#modalCreate').modal('hide');
				},
				error: function(data){
					toastr.error('Gagal Menambah data UPD');
				}
			});
		});
	}


	$('#kt_datatable_reload').on('click', function() {
		$('#kt_datatable').KTDatatable('reload');
	});

	$('#kt_datatable_clear').on('click', function() {
		$('#kt_datatable_console').val('');
	});



	return {
		// public functions
		init: function() {
			demo();
			progressBar();
			create();
		},
	};
}();

jQuery(document).ready(function() {
	KTDefaultDatatableDemo.init();
});

</script>
@endpush

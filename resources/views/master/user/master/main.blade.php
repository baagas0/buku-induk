@extends('master.layouts.app')
@push('title', 'Daftar Pengguna')
@section('content')
<!--begin::Card-->
<div class="card card-custom">
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
		<div class="card-title">
			<h3 class="card-label">Data Master Pengguna
			<span class="d-blocktext-muted pt-2 font-size-sm"></span></h3>
		</div>
		<div class="card-toolbar">
			<!--begin::Button-->
			<button type="button" class="btn btn-primary font-weight-bolder" data-action="create" data-toggle="modal" data-target="#modalMaster" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
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
                </span>
                New Record
            </button>
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
								<label class="mr-3 mb-0 d-none d-md-block">Role:</label>
                                <select class="form-control select2" id="kt_datatable_search_role_id">
                                    <option value="" selected>Semua</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
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


	</div>
</div>
<!--end::Card-->

<!-- Modal-->
<div class="modal fade" id="modalMaster" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMasterLabel">Entry data pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" placeholder="Name"/>
                </div>
                <div class="form-group">
                    <label for="email">E-mail <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" placeholder="E-mail"/>
                </div>
                <div class="form-group">
                    <label for="master_role_id">Role <span class="text-danger">*</span></label>
                    <select class="form-control select2" id="master_role_id"  style="width:100%">
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Password <span class="text-danger" id="passwordRequired">*</span></label>
                    <input type="password" class="form-control" id="password" placeholder="Password"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" id="saveModal" data-action="create" class="btn btn-primary font-weight-bold">Save changes</button>
            </div>
        </div>
    </div>
</div>

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
						url: '{{ route('master.user.master.data') }}',
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
				key: 'name'
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
					field: 'detail',
					title: 'User',
					autoHide: false,
					// callback function support for column rendering
					template: function(row) {
						return `
                        <span style="width: 250px;"><div class="d-flex align-items-center">
                            <div class="symbol symbol-40 symbol-light-primary flex-shrink-0">
                                <span class="symbol-label font-size-h4 font-weight-bold">` + row.name.substring(0, 1) + `</span>
                            </div>
                            <div class="ml-4">
                                <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">` + row.name + `</div>
                                    <a href="#" class="text-muted font-weight-bold text-hover-primary">` + row.email + `</a>
                                </div>
                            </div>
                        </span>
                        `;
					},
				}, {
					field: 'role.name',
					title: 'Role',
                    autoHide: false,
					// callback function support for column rendering
					template: function(row) {
						return `
                        <span style="width: 108px;">
                            <span class="label label-success label-dot mr-2"></span>
                            <span class="font-weight-bold text-success">
                                ` + row.role.name + `
                            </span>
                        </span>
                        `;
					},
				}, {
					field: 'Actions',
					title: 'Actions',
					sortable: false,
					width: 125,
					overflow: 'visible',
					autoHide: false,
					template: function(row) {
						return `
							<button class="btn btn-sm btn-clean btn-icon" title="Edit details" data-action="update" data-id="${row.id}" data-toggle="modal" data-target="#modalMaster" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
								<i class="la la-edit"></i>
							</button>
							<button type="delete" name="delete" onclick="KTDefaultDatatableDemo.deleted(this)" class="btn btn-sm btn-clean btn-icon deleted" title="Delete" data-id="${row.id}">
								<i class="la la-trash"></i>
							</button>
						`;
					},
				}
			],

		});

		$('#refreshData').on('click', function(){
			datatable.reload();
		})

		$('#kt_datatable_search_role_id').on('change', function() {
			datatable.search($(this).val().toLowerCase(), 'role');
		});

		$('#kt_datatable_search_role_id, #kt_datatable_search_type').selectpicker();

	};

	$('#kt_datatable_reload').on('click', function() {
		$('#kt_datatable').KTDatatable('reload');
	});

	$('#kt_datatable_clear').on('click', function() {
		$('#kt_datatable_console').val('');
	});

    var modal = function() {
        var dataId = null;
        $('#master_role_id').select2({
            placeholder: "Pilih Role",
            dropdownAutoWidth : true,
        });

        var modalReset = function () {
            $('#name').val('');
            $('#email').val('');
            $('#password').val('');
        };

        $('#modalMaster').on('shown.bs.modal', function (e) {
            modalReset();

            var button = e.relatedTarget;
            var action = button.dataset.action;
            $('#saveModal').attr('data-action', action);

            if(action == 'create') {
                $('#passwordRequired').show();
                $('#modalMasterLabel').text('Entry data pengguna');
            }else if(action == 'update') {
                dataId = button.dataset.id;
                $('#passwordRequired').hide();
                detail();
            }
        });

        $('#saveModal').on('click', function() {
            var action = $(this).attr('data-action');
            if(action == 'create') {
                createAction();
            }else if(action == 'update') {
                updateAction();
            }else {
                toastr.error('Method undefined, silahkan coba lagi');
            }
        });

        var detail = function() {
            $.ajax({
				type: "GET",
				url: "{{ route('master.user.master.detail') }}/"+dataId,
				success: function(data){
					toastr.success('Menampilkan data pengguna');
                    $('#modalMasterLabel').text(`Update: ${data.name}`);

                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#master_role_id').val(data.master_role_id).change();
				},
				error: function(data){
					toastr.error('Gagal Menampilkan data pengguna');
				}
			});
        }

        var createAction = function() {
            $.ajax({
				type: "POST",
				url: "{{ route('master.user.master.create') }}",
				data: {
					name: $('#name').val(),
					email: $('#email').val(),
					master_role_id: $('#master_role_id').val(),
					password: $('#password').val(),
				},
				success: function(data){
					toastr.success('Berhasil Menambah data pengguna');
					$('#kt_datatable').KTDatatable('reload');
					$('#modalMaster').modal('hide');
				},
				error: function(data){
					toastr.error('Gagal Menyimpan Data');
				}
			});
        }

        var updateAction = function() {
            $.ajax({
				type: `POST`,
				url: `{{ route('master.user.master.update') }}/${dataId}`,
				data: {
					name: $('#name').val(),
					email: $('#email').val(),
					master_role_id: $('#master_role_id').val(),
					password: $('#password').val(),
				},
				success: function(data){
					toastr.success('Berhasil Mengedit data pengguna');
					$('#kt_datatable').KTDatatable('reload');
					$('#modalMaster').modal('hide');
				},
				error: function(data){
					toastr.error('Gagal Menyimpan Data');
				}
			});
        }

    }

    var deleted = function(e) {
        var dataId = e.dataset.id;
        console.log(dataId)
        Swal.fire({
            title: `Are you sure?`,
            text: `You won't be able to delete this!`,
            icon: `warning`,
            showCancelButton: true,
            confirmButtonText: `Yes, delete it!`
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('master.user.master.delete') }}/"+dataId,
                    success: function(data){
                        $('#kt_datatable').KTDatatable('reload');
                        Swal.fire({
                            title: "Deleted!",
                            text : "Data deletion successfully!",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    },
                    error: function(data){
                        toastr.error('Gagal Menampilkan data pengguna');
                    }
                });
            }else {
                Swal.fire({
                    title: "Not Deleted!",
                    text : "Data deletion cancellation!",
                    icon: "info",
                    showConfirmButton: false,
                    timer: 1500,
                });
            }
        });
    }

	return {
		// public functions
		init: function() {
			demo();
            modal();
		},
        deleted: function(e) {
            deleted(e);
        },
	};
}();

jQuery(document).ready(function() {
	KTDefaultDatatableDemo.init();
});

</script>
@endpush

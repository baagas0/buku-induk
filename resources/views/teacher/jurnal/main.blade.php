@extends('teacher.layouts.app')
@push('title', 'Jurnal Kelas')
@section('instruction', 'jurnal_page')
@section('content')
@php
$semester = Request::get('semester');
$tahun_pelajaran = Request::get('tahun_pelajaran');
$gmapel = Request::get('mapel');
$kelas_id = Request::get('kelas_id');
@endphp
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Daftar Jurnal Kelas
                <span class="d-block text-muted pt-2 font-size-sm">Klik icon panah untuk melihat daftar siswa</span></h3>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-light-primary font-weight-bolder mr-3" id="print_jurnal_button" data-toggle="modal" data-target="#print_jurnal_modal" aria-haspopup="true" aria-expanded="false">
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
                    </span>
                    Print Jurnal
                </button>
                <!--begin::Button-->
                <button type="button" id="add_jurnal_open_modal" data-toggle="modal" data-target="#add_jurnal_modal" class="btn btn-primary font-weight-bolder">
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
                    Buat Jurnal
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
                            <div class="col-md-6 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" id="kt_datatable_search_date" readonly  placeholder="Select date"/>
                                    <span>
                                        <i class="flaticon-calendar text-muted"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Kelas:</label>
                                    <select class="form-control" id="kt_datatable_search_kelas">
                                        <option value="">Semua</option>
                                        @foreach ($kelas as $row)
                                        <option value="{{ $row->id }}">{{ $row->name.($row->id == auth()->guard('teacher')->user()->kelas_id ? ' - Wali' : '') }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                        <button type="button" class="btn btn-light-primary px-6 font-weight-bold" onclick="$('#mainTableRefresh').trigger('click')">Search</a>
                        <button type="button" class="btn btn-light-warning px-6 font-weight-bold ml-3" id="mainTableRefresh">Refresh</a>
                    </div>
                </div>
            </div>
            <!--end::Search Form-->
            <!--end: Search Form-->
            <div class="mt-10 mb-5 collapse" id="kt_datatable_group_action_form_2">
                <div class="d-flex align-items-center">
                    <div class="font-weight-bold text-danger mr-3">Memilih
                    <span id="kt_datatable_selected_records_2">0</span> siswa:</div>
                    <button class="btn btn-sm btn-danger mr-2" type="button" id="kt_datatable_delete_all_2">Hapus Semua</button>
                </div>
            </div>
            <!--begin: Datatable-->
            <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
            <!--end: Datatable-->
        </div>

        <!-- Modal-->
        <div class="modal fade" id="print_jurnal_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" action="{{ route('teacher.jurnal.export') }}" id="form_jurnal_export">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Print Data Jurnal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tanggal:</label>
                                <input type="text" class="form-control" id="print_jurnal_date" name="date" readonly placeholder="Pilih tanggal data jurnal"/>
                                <span class="form-text text-danger" id="print_jurnal_date_alert" style="display: none">*Tidak ditemukan data pada tanggal tersebut.</span>
                                <span class="form-text text-muted">Pilih tanggal untuk print jurnal anda.</span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary font-weight-bold" id="submit_print_jurnal_modal" disabled>Print jurnal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="add_jurnal_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="add_jurnal_modal" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content modal-dialog-scrollable">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jurnal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body pb-0  ">
                        <div class="scroll scroll-pull row" data-scroll="true" data-height="400">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kelas</label>
                                <br>
                                <select class="form-control select2" id="jurnal_kelas_id" name="jurnal_kelas_id" style="width:100%!important">
                                    <option value="0">==Pilih Kelas==</option>
                                    @foreach($kelas as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mata Pelajaran</label>
                                <select class="form-control select2" id="jurnal_mapel" name="jurnal_mapel" style="width:100%!important">
                                    <option value="0,0">==Pilih Mapel==</option>
                                    @foreach($kelompok as $row)
                                    <?php $mapels = App\Mapel::where('kelompok_id', $row->id)->whereIn('name', auth()->guard('teacher')->user()->lmapel)->get() ?>
                                    @if(count($mapels) != 0)
                                    <optgroup label="{{ $row->name }}">
                                        @foreach($mapels as $mapel)
                                            @if($mapel->is_sub == 0)
                                                <option value="{{ $mapel->id }},0" {{ $gmapel == $mapel->id.',0' ? 'selected' : '' }}>{{ $mapel->name }}</option>
                                            @else
                                            <?php $submapels = App\SubMapel::where('mapel_id', $mapel->id)->get() ?>
                                                <optgroup label="{{ $mapel->name }}">
                                                    @foreach($submapels as $submapel)
                                                    <option value="0,{{ $submapel->id }}" {{ $gmapel == '0,'.$submapel->id ? 'selected' : '' }}>{{ $submapel->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pilih Tanggal:</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" id="jurnal_date" readonly  placeholder="Pilih Tanggal"/>
                                    <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jam Ke:</label>
                                <input type="number" class="form-control" id="jurnal_jam_ke" name="jurnal_jam_ke" placeholder="Jam Ke"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea">Materi</label>
                                <textarea class="form-control" id="jurnal_materi" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body pt-0">
                                <!--begin: Search Form-->
                                <div >

                                    <h3 class="card-label"><i class="flaticon-users text-primary"></i> Daftar Siswa</h3>
                                </div>

                                <!--begin::Search Form-->
                                <div class="mb-7">
                                    <div class="row align-items-center">
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="row align-items-center">
                                                <div class="col-md-12 my-2 my-md-0">
                                                    <div class="input-icon">
                                                        <input type="text" class="form-control" placeholder="Cari Siswa..." id="kt_datatable_search_query_2" />
                                                        <span>
                                                            <i class="flaticon2-search-1 text-muted"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--begin: Datatable-->
                                <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_2"></div>
                                <!--end: Datatable-->
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary font-weight-bold" id="add_jurnal_save">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="add_jurnal_keterangan_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Keterangan Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" hidden>
                            <label>ID</label>
                            <input type="number" class="form-control" id="jurnal_keterangan_id" readonly placeholder="ID Student"/>
                        </div>
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" class="form-control" id="jurnal_keterangan_name" readonly placeholder="Student Name"/>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea">Keterangan</label>
                            <textarea class="form-control" id="jurnal_keterangan" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary font-weight-bold" id="jurnal_keterangan_save">Save changes</button>
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
<script>
	var KTpage = function() {
		var select = function() {
			$('#jurnal_mapel').select2({
				width: '100%',
				placeholder: "Pilih Mapel"
			});
			$('#jurnal_kelas_id').select2({
                width: '100%',
				placeholder: "Pilih Kelas"
			});
		}
		var form_mask = function () {
			$("#th_pelajaran").inputmask("9999", {
				"placeholder": "yyyy",
				autoUnmask: true
			});
		}
		var date = function() {
            var arrows = {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            };
			$('#kt_datatable_search_date').daterangepicker({
                buttonClasses: ' btn',
                applyClass: 'btn-primary',
                cancelClass: 'btn-secondary',

                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                ranges: {
                    'Hari ini': [moment(), moment()],
                    'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
                    '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
                    'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
                    'Bulan lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, function(start, end, label) {
                $('#date .form-control').val( start.format('DD/MM/YYYY') + ' / ' + end.format('DD/MM/YYYY'));
            });

            $('#jurnal_date').datepicker({
                todayHighlight: true,
            });
            $('#print_jurnal_date').datepicker({
                todayHighlight: true,
            });
		}

        var exportJurnal = function() {
            $('#print_jurnal_button').on('click', function(){
                $('#print_jurnal_date').val('');
                $('#submit_print_jurnal_modal').attr('disabled', true);
            });
            $('#form_jurnal_export').on('submit', function() {
                $('#print_jurnal_modal').modal('hide');
            });
            $('#print_jurnal_date').on('change', function() {
                $.ajax({
                    type: 'post',
                    url: "{{ route('teacher.jurnal.get.by.date') }}",
                    data: {
                        date: $(this).val(),
                    },
                    cache: false,
                    success: function(data){
                        if(data.length > 0){
                            $('#print_jurnal_date_alert').hide();
                            $('#submit_print_jurnal_modal').attr('disabled', false);
                        }else {
                            $('#print_jurnal_date_alert').show();
                            $('#submit_print_jurnal_modal').attr('disabled', true);
                        }
                    },
                    error: function(error){
                        console.log(error);
                        alert('Error!');
                    }
                });
            });
        };

        var mainTable = function() {

            var datatable = $('#kt_datatable').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '{{ route('teacher.jurnal.data') }}',
                            params: {
                                date: $('#date').val(),
                            },
                        },
                    },
                    pageSize: 10, // display 20 records per page
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
                },

                // layout definition
                layout: {
                    scroll: true,
                    footer: false,
                },

                translate:{
                    records:{
                        noRecords: 'Jurnal tidak ditermukan',
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
                    input: $('#kt_datatable_search_date'),
                    key: 'date'
                },

                extensions: {
                    // boolean or object (extension options)
                    checkbox: true,
                },

                // columns definition
                columns: [
                    {
                        field: 'id',
                        title: '',
                        sortable: false,
                        width: 30,
                        textAlign: 'center',
                    }, {
                        field: 'clone_id',
                        title: '#',
                        sortable: false,
                        width: 20,
                        selector: true,
                        textAlign: 'center',
                    }, {
                        field: 'day',
                        title: 'Hari',
                        sortable: 'asc',
                    }, {
                        field: 'date',
                        title: 'Date',
                        sortable: 'asc',
                    }, {
                        field: 'jam_ke',
                        title: 'Jam Ke',
                    }, {
                        field: 'kelas.name',
                        title: 'Kelas',
                    }, {
                        field: 'data',
                        title: 'Mapel',
                        template: function(row) {
                            if(row.sub_mapel != null) {
                                return row.sub_mapel.name;
                            }else {
                                return row.mapel.name;
                            }
                        }
                    }, {
                        field: 'materi',
                        title: 'Materi',
                    },{
                        field: 'Actions',
                        width: 125,
                        title: 'Actions',
                        sortable: false,
                        overflow: 'visible',
                        autoHide: false,
                        template: function() {
                            return `
                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">
                                    <span class="svg-icon svg-icon-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg>
                                    </span>
                                </a>
                            `;
                        },
                    }],
            });

            $('#kt_datatable_search_date').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'date');
            });

            $('#kt_datatable_search_kelas').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'kelas_id');
            });

            $('#mainTableRefresh').on('click', function() {
                datatable.reload();
            });

            $('#kt_datatable_search_kelas').selectpicker();

            datatable.on(
            'datatable-on-click-checkbox',
            function(e) {
                // datatable.checkbox() access to extension methods
                var ids = datatable.checkbox().getSelectedId();
                console.log(ids);
                var count = ids.length;

                $('#kt_datatable_selected_records_2').html(count);

                if (count > 0) {
                    $('#kt_datatable_group_action_form_2').collapse('show');
                } else {
                    $('#kt_datatable_group_action_form_2').collapse('hide');
                }
            });

            // Delete All Selected Student
            $('#kt_datatable_delete_all_2').on('click', function() {
                var ids = datatable.checkbox().getSelectedId();
                Swal.fire({
                    title: "Apakah anda yakin?",
                    text: `terpilih data ${ids.lenght} akan dihapus secara permanen`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, hapus data",
                    cancelButtonText: "Batalkan operasi",
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('teacher.jurnal.multiple.destroy') }}",
                            data: {
                                ids: ids,
                            },
                            cache: false,
                            success: function(res){
                                datatable.reload();
                                Swal.fire(
                                    "Sukses!",
                                    "Data jurnal berhasil dihapus.",
                                    "success"
                                );
                            },
                            error: function(error){
                                alert('Function error');
                            }
                        });
                    }else {
                        Swal.fire(
                            "Operasi Gagal!",
                            "Data jurnal gagal dihapus.",
                            "warning"
                        );
                    }
                });

            });

            function subTableInit(e) {
                $('<div/>').attr('id', 'child_data_ajax_' + e.data.id).appendTo(e.detailCell).KTDatatable({
                    data: {
                        type: 'remote',
                        source: {
                            read: {
                                url: '{{ route('teacher.jurnal.data.jurnal.student') }}',
                                params: {
                                    // custom query params
                                    jurnal_id: e.data.id,
                                    query: {
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
                    columns: [
                        {
                            field: 'id',
                            title: '#',
                            sortable: false,
                            width: 30,
                        },
                        {
                            field: 'student.name',
                            title: 'Nama'
                        },
                        {
                            field: 'keterangan',
                            title: 'Keterangan'
                        },
                    ],
                });
            }
        };

        var studentList = function() {
            var jurnal_student = [];

            var datatable = $('#kt_datatable_2').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: `{{ route('teacher.jurnal.data.student') }}`,
                            params: {
                                kelas_id:0,
                            }
                        },
                    },
                    pageSize: 10,
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
                },

                // layout definition
                layout: {
                    // header: false,
                    scroll: true, // enable/disable datatable scroll both horizontal and
                    footer: false, // display/hide footer
                    maxheight: 400,
                },

                // Toolbar Setting
                toolbar: {
                    items: {
                        pagination: {
                            pageSizeSelect: [5],
                        },
                    },
                },

                // Translate text
                translate: {
                    records: {
                        processing: 'Loading...',
                        noRecords: 'Data siswa tidak ditemukan',
                    }
                },

                // column sorting
                sortable: true,

                pagination: true,

                // enable extension
                extensions: {
                    // boolean or object (extension options)
                    checkbox: true,
                },
                search: {
                    input: $('#kt_datatable_search_query_2'),
                    key: 'searchLike',
                },

                // columns definition
                columns: [
                    {
                        field: 'id',
                        title: '#',
                        sortable: false,
                        width: 5,
                        selector: true,
                        textAlign: 'center',
                        autoHide: false,
                    },
                    {
                        field: 'nis',
                        title: 'NIS',
                    },
                    {
                        field: 'name',
                        title: 'Nama Siswa',
                    },
                ],
            });

            datatable.on(
                'datatable-on-init',
            function(e, row) {
                var kelas_id_index = datatable.getDataSourceParam('kelas_id');
                $('#jurnal_kelas_id').val(kelas_id_index).change();
            });

            function empty_add_jurnal() {
                jurnal_student = null;
                $('#jurnal_kelas_id').val('0').change();
                $('#jurnal_mapel').val('0,0').change();
                $('#jurnal_date').val('');
                $('#jurnal_jam_ke').val('');
                $('#jurnal_materi').val('');
                $('#kt_datatable_search_query_2').val('');
            }

            $('#jurnal_kelas_id').on('change', function() {
                jurnal_student = [];
                var e = $(this).val();
                datatable.setDataSourceParam('kelas_id', e);
                datatable.load();
            });

            $('#kt_datatable_search_status_2').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'Status');
            });

            $('#kt_datatable_search_type_2').on('change', function() {
                datatable.search($(this).val().toLowerCase(), 'Type');
            });

            $('#add_jurnal_open_modal').on('click', function() {
                console.log('Modal Open');
                empty_add_jurnal();
                datatable.load();
            })

            $('#add_jurnal_modal').on('hidden.bs.modal', function (e) {
                empty_add_jurnal();
            })

            $('#kt_datatable_search_status_2, #kt_datatable_search_type_2').selectpicker();

            datatable.on(
                'datatable-on-click-checkbox',
            function(e, row) {
                var element = row[0];
                var id = element.value;

                if(id == 'on'){
                    datatable.setActiveAll(false);
                    console.log(jurnal_student);
                    for(var index in jurnal_student) {
                        var id = jurnal_student[index].student_id;
                        datatable.setActive(id);
                    }
                    Swal.fire("Notifikasi!", "Tidak dapat memilih banyak sekaligus.", "warning");
                }else {
                    if(element.checked == true){
                        $('#jurnal_keterangan_id').val(id);
                        $('#add_jurnal_keterangan_modal').modal('show');
                    }else {
                        datatable.setInactive(id);
                        jurnal_student.splice(id);
                        console.log(jurnal_student);
                    }
                }
            });

            function empty_modal_keterangan() {
                var id = $('#jurnal_keterangan_id').val('');
                var name = $('#jurnal_keterangan_name').val('');
                var keterangan = $('#jurnal_keterangan').val('');
            }

            $('#add_jurnal_keterangan_modal').on('show.bs.modal', function(e) {
                var id = $('#jurnal_keterangan_id').val();
                var lastResponse = datatable.getRecord(id).lastResponse.data;
                var record = lastResponse.filter(function (el) {
                    return  el.id == id
                })[0];

                $('#jurnal_keterangan_name').val(record.name);
            }).on('hide.bs.modal', function(e) {
                var id = $('#jurnal_keterangan_id').val();
                datatable.setInactive(id);
                empty_modal_keterangan();
            });

            $('#jurnal_keterangan_save').on('click', function() {
                var id = $('#jurnal_keterangan_id').val();
                var keterangan = $('#jurnal_keterangan').val();

                jurnal_student[id] = {
                    'student_id': id,
                    'keterangan': keterangan,
                };
                empty_modal_keterangan();

                $('#add_jurnal_keterangan_modal').modal('hide');
                console.log(jurnal_student);
            });

            $('#add_jurnal_save').on('click', function() {
                var date = $('#jurnal_date').val();
                var jam_ke = $('#jurnal_jam_ke').val();
                var mapel = $('#jurnal_mapel').val();
                var kelas_id = $('#jurnal_kelas_id').val();
                var materi = $('#jurnal_materi').val();

                if(date == "" || jam_ke == ""  || materi == "") {
                    Swal.fire("Error!", "Periksa data inputan anda", "error");
                    return;
                }
                var data = {
                    date: date,
                    jam_ke: jam_ke,
                    mapel: mapel,
                    kelas_id: kelas_id,
                    materi: materi,
                    jurnal_student: jurnal_student,
                };

                Swal.fire({
                    title: "Konfirmasi pengiriman data!",
                    text: "Apakah anda yakin bahwa data sudah benar?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya!",
                    cancelButtonText: "Tidak!"
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            url: "{{ route('teacher.jurnal.save') }}",
                            type: "POST",
                            data: data,
                            success: function(response){
                                $('#mainTableRefresh').trigger('click');
                                $('#add_jurnal_modal').modal('hide');
                                Swal.fire(
                                    "Success!",
                                    `${data.status}`,
                                    "success"
                                );
                            },
                            error: function(response){
                                console.log(JSON.stringify(response.log));
                                Swal.fire(
                                    "Gagal!",
                                    "Data gagal dimasukan, coba lagi!",
                                    "error"
                                )
                            }
                        });
                    }else {

                    }
                });
            });
        }
		return {
			init: function() {
				select();
				form_mask();
				date();
				exportJurnal();
                mainTable();
                studentList();
			}
		};
	}();

	jQuery(document).ready(function() {
		KTpage.init();
	});

</script>
@endpush

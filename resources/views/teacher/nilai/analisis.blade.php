@extends('teacher.layouts.app',
	[
	]
)
@push('title', 'Analisis Nilai')
@section('instruction', 'analisis_page')
@section('content')
@php
$semester = Request::get('semester');
$tahun_pelajaran = Request::get('tahun_pelajaran');
$gmapel = Request::get('mapel');
$kelas_id = Request::get('kelas_id');
@endphp
	<div class="accordion accordion-solid accordion-panel accordion-svg-toggle gutter-b"  id="accordionExample8">
		<div class="card">
			<div class="card-header" id="headingOne8">
				<div class="card-title collapsed" data-toggle="collapse" data-target="#filter_data">
					<div class="card-label">Filter Data</div>
					<span class="svg-icon">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24"></polygon>
								<path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
								<path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
							</g>
						</svg>
					</span>
				</div>
			</div>
			<div id="filter_data" class="collapse {{ !$semester ? 'show' : '' }}" data-parent="#accordionExample8">
				<div class="card-body">
					<form>
						<hr>
						<div class="form-group row m-0">
							<label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Semester</label>
							<div class="col-lg-4 col-md-9 col-sm-12">
								<div class="row">
									<div class="col-lg-6">
										<label class="option option-plain">
											<span class="option-control">
												<span class="radio radio-brand">
													<input type="radio" name="semester" value="1" {{ $semester == 1 ? 'checked' : 'checked' }}/>
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
													Input nilai untuk semester 1
												</span>
											</span>
										</label>
									</div>
									<div class="col-lg-6">
										<label class="option option-plain">
											<span class="option-control">
												<span class="radio radio-brand">
													<input type="radio" name="semester" value="2" {{ $semester == 2 ? 'checked' : '' }}/>
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
													Input nilai untuk semester 2
												</span>
											</span>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Tahun Pelajaran</label>
							<div class="col-lg-4 col-md-9 col-sm-12">
								<input type="text" class="form-control" name="tahun_pelajaran" id="th_pelajaran" value="{{ $tahun_pelajaran }}" placeholder="yyyy" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Mata Pelajaran</label>
							<div class=" col-lg-4 col-md-9 col-sm-12">
								<select class="form-control select2" id="mapel" name="mapel" style="width:100%!important">
									@foreach($kelompok as $row)
									<optgroup label="{{ $row->name }}">
										<?php $mapels = App\Mapel::where('kelompok_id', $row->id)->get() ?>
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
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Kelas</label>
							<div class=" col-lg-4 col-md-9 col-sm-12">
								<select class="form-control select2" id="kelas_id" name="kelas_id">
									@foreach($kelas as $row)
									<option value="{{ $row->id }}" {{ $kelas_id == $row->id ? 'selected' : '' }}>{{ $row->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="">
							<div class="row">
								<div class="col-lg-3"></div>
								<div class="col-lg-4">
									<button type="submit" class="btn btn-light-primary mr-2">Submit</button>
									<button type="reset" class="btn btn-primary">Cancel</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--begin::Card-->
	<div class="card card-custom">
		<div class="card-header flex-wrap border-0 pt-6 pb-0">
			<div class="card-title">
				<h3 class="card-label">Analisis
				<span class="d-block text-muted pt-2 font-size-sm">Analisis Nilai Siswa</span></h3>
			</div>
			<div class="card-toolbar">
			</div>
		</div>
		<div class="card-body">
			<!--begin: Search Form-->
			<!--begin::Search Form-->
			<div class="mb-7">
				<div class="row align-items-center">
					<div class="col-lg-9 col-xl-8">
						<div class="row align-items-center">
							<div class="col-md-12 my-2 my-md-0">
								<div class="input-icon">
									<input type="text" class="form-control" placeholder="Cari Siswa..." id="kt_datatable_search_query" />
									<span>
										<i class="flaticon2-search-1 text-muted"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
						<a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
					</div>
				</div>
			</div>
			<!--end::Search Form-->
			<!--end: Search Form-->
			<!--begin: Datatable-->
			<table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
				<thead>
					<tr>
						{{-- <th>#</th> --}}
						<th>Semester</th>
						<th>Tahun Pelajaran</th>
						<th>Nama</th>
						{{-- <th>Kelas</th> --}}
						<th>Mapel</th>
						<th>KKM</th>
						<th>Pengetahuan</th>
						<th>Keterampilan</th>
						<th>Sikap</th>
					</tr>
				</thead>
				<tbody>
					@foreach($nilai as $row)
					@php
						$kkm = $row->master->kkm;
						$th = (int)$row->master->th_pelajaran;
						if ($row->master->mapel_id == 0) {
							$mapel = $row->master->submapel->mapel->name.' - '.$row->master->submapel->name;
						}else {
							$mapel = $row->master->mapel->name;
						}
					@endphp
					<tr>
						{{-- <td>{{ $loop->iteration }}</td> --}}
						<td>{{ $row->semester }}</td>
						<td>{{ $th.'/'.($th + 1) }}</td>
						<td>{{ $row->student->name }}</td>
						{{-- <td>RPL 1</td> --}}
						<td>{{ $mapel }}</td>
						<td>{{ $row->master->kkm }}</td>
						<td>
							<div class="font-weight-bold text-{{ $row->n_peng == $kkm ? 'warning' : ($row->n_peng < $kkm ? 'danger' : 'success')}}">
								{{ $row->n_peng }}
							</div>
						</td>
						<td>
							<div class="font-weight-bold text-{{ $row->n_ketr == $kkm ? 'warning' : ($row->n_ketr < $kkm ? 'danger' : 'success')}}">
								{{ $row->n_ketr }}
							</div>
						</td>
						<td>
							<div class="font-weight-bold text-{{ $row->n_skp == $kkm ? 'warning' : ($row->n_skp < $kkm ? 'danger' : 'success')}}">
								{{ $row->n_skp }}
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<!--end: Datatable-->
		</div>
	</div>
	<!--end::Card-->
@endsection
@push('css')
{{-- <link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" /> --}}
@endpush
@push('js')
{{-- <script src="/assets/js/pages/crud/file-upload/dropzonejs.js"></script> --}}
{{-- <script src="/assets/js/pages/crud/ktdatatable/base/html-table.js"></script> --}}
{{-- <script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script> --}}
<script>
	var KTSelect2 = function() {
		var select = function() {
			$('#mapel').select2({
				width: 'element',
				placeholder: "Pilih Mapel"
			});
			$('#kelas_id').select2({
				placeholder: "Pilih Kelas"
			});
		}
		var form_mask = function () {
			$("#th_pelajaran").inputmask("9999", {
				"placeholder": "yyyy",
				autoUnmask: true
			});
		}
		var dropzone = function() {
			$('#file').dropzone({
				url: "{{ route('upload.file') }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				paramName: "file",
				maxFiles: 1,
				maxFilesize: 10,
				addRemoveLinks: true,
				acceptedFiles: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
				accept: function(file, done) {
					done();
				},
				success: function(file, response){
					$('#file_nilai').val(response);
					console.log(response);
				}
			});
		}
		var table = function() {

			var datatable = $('#kt_datatable').KTDatatable({
				data: {
					saveState: {cookie: false},
				},
				search: {
					input: $('#kt_datatable_search_query'),
					key: 'generalSearch',
				},
				layout: {
					class: 'datatable-bordered',
				},
				columns: [

				],
			});

			$('#kt_datatable_search_status').on('change', function() {
				datatable.search($(this).val().toLowerCase(), 'Status');
			});

			$('#kt_datatable_search_type').on('change', function() {
				datatable.search($(this).val().toLowerCase(), 'Type');
			});

			$('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();

		};

		return {
			init: function() {
				select();
				form_mask();
				dropzone();
				table();
			}
		};
	}();

	jQuery(document).ready(function() {
		KTSelect2.init();
	});

</script>
@endpush

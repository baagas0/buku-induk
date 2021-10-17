@extends('master.layouts.app',
	[
		// 'button' => [
		// 	['name' => 'Download', 'link' => 'download']
		// ]
	]
)
@push('title', 'Export Data Siswa')
@section('instruction', 'student_export_page')
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
			<div id="filter_data" class="collapse show" data-parent="#accordionExample8">
				<div class="card-body">
					<form method="POST" action="{{ route('master.student.export.proccess') }}">
						@csrf
						<hr>

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
						<div class="form-group row">
							<label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Tipe</label>
							<div class=" col-lg-4 col-md-9 col-sm-12">
								<select class="form-control select2" id="tipe" name="tipe">
									<option value="kelulusan">Kelulusan</option>
									<option value="hasil_ujian">Hasil Ujian</option>
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
			$('#kelas_id').select2({
				placeholder: "Pilih Kelas"
			});
			$('#tipe').select2({
				placeholder: "Pilih Tipe Ekspor"
			});
		}

		return {
			init: function() {
				select();
			}
		};
	}();

	jQuery(document).ready(function() {
		KTSelect2.init();
	});

</script>
@endpush

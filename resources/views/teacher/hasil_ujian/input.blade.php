@extends('teacher.layouts.app',
	[
		// 'button' => [
		// 	['name' => 'Download', 'link' => 'download']
		// ]
	]
)
@push('title', 'Input Nilai UM & Ijazah')
@section('instruction', 'import_data_page')
@section('content')
	<!--begin::Card-->
	<div class="card card-custom">
		<form method="POST" action="{{ route('teacher.hasil_ujian.proccess.input') }}">
			@csrf
		<input type="text" class="form-control" id="file_nilai" name="file_nilai" style="display: none">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Mata Pelajaran</label>
				<div class=" col-lg-4 col-md-9 col-sm-12">
					<select class="form-control select2" id="mapel" name="mapel">
						@foreach($kelompok as $row)
						<optgroup label="{{ $row->name }}">
							<?php $mapels = App\Mapel::where('kelompok_id', $row->id)->whereIn('name', Auth::guard('teacher')->user()->lmapel)->get() ?>
							@foreach($mapels as $mapel)
								@if($mapel->is_sub == 0)
									<option value="{{ $mapel->id }},0">{{ $mapel->name }}</option>
								@else
								<?php $submapels = App\SubMapel::where('mapel_id', $mapel->id)->get() ?>
									<optgroup label="{{ $mapel->name }}">
										@foreach($submapels as $submapel)
										<option value="0,{{ $submapel->id }}">{{ $submapel->name }}</option>
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
				<label class="col-form-label col-lg-3 col-sm-12 text-lg-right">File Excel</label>
				<div class="col-lg-4 col-md-9 col-sm-12">
					<div class="dropzone dropzone-default dropzone-success" id="file">
						<div class="dropzone-msg dz-message needsclick">
							<h3 class="dropzone-msg-title">Drop file atau klik untuk memilih.</h3>
							<span class="dropzone-msg-desc">mohon masukan file excel yang telah anda edit data permasing-masing siswa.</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
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
	<!--end::Card-->
@endsection
@push('css')
<link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endpush
@push('js')
{{-- <script src="/assets/js/pages/crud/file-upload/dropzonejs.js"></script> --}}
<script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script>
	var KTSelect2 = function() {
		var select = function() {
			$('#mapel').select2({
				placeholder: "Pilih Mapel"
			});
		}
		var form_mask = function () {
			$("#kkm").inputmask("99", {
				"placeholder": "99",
				autoUnmask: true
			});
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

		return {
			init: function() {
				select();
				form_mask();
				dropzone();
			}
		};
	}();

	jQuery(document).ready(function() {
		KTSelect2.init();
	});

</script>
@endpush

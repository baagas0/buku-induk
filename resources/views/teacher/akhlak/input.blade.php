@extends('teacher.layouts.app', 
	[
		'button' => [
			['name' => 'Download', 'link' => 'download']
		]
	]
)
@push('title', 'Input Data Akhlak')
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
		<form method="POST" action="{{ route('teacher.akhlak.proccess.input') }}">
			@csrf
		<input type="text" class="form-control" id="file_nilai" name="file_nilai">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-form-label col-lg-3 col-sm-12 text-lg-right">File Type Validation</label>
				<div class="col-lg-4 col-md-9 col-sm-12">
					<div class="dropzone dropzone-default dropzone-success" id="file">
						<div class="dropzone-msg dz-message needsclick">
							<h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
							<span class="dropzone-msg-desc">Only image, pdf and psd files are allowed for upload</span>
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
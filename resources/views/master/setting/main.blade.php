@extends('master.layouts.app')
@push('title', 'Pengaturan')
@section('content')
<!--begin::Card-->
<div class="card card-custom">
	<!--begin::Card header-->
	<div class="card-header card-header-tabs-line nav-tabs-line-3x">
		<!--begin::Toolbar-->
		<div class="card-toolbar">
			<ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
				<!--begin::Item-->
				<li class="nav-item mr-3">
					<a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
						<span class="nav-icon">
							<span class="svg-icon">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
										<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</span>
						<span class="nav-text font-size-lg">Website</span>
					</a>
				</li>
				<!--end::Item-->
				<!--begin::Item-->
				<li class="nav-item mr-3">
					<a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_2">
						<span class="nav-icon">
							<span class="svg-icon">
								<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
										<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</span>
						<span class="nav-text font-size-lg">Pengguna</span>
					</a>
				</li>
				<!--end::Item-->
			</ul>
		</div>
		<!--end::Toolbar-->
	</div>
	<!--end::Card header-->
	<!--begin::Card body-->
	<div class="card-body">
		<form class="form" id="kt_form">
			<div class="tab-content">
				<!--begin::Tab-->
				<div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
					<!--begin::Row-->
					<div class="row">
						<div class="col-xl-2"></div>
						<div class="col-xl-7 my-2">
							<!--begin::Row-->
							<div class="row">
								<label class="col-3"></label>
								<div class="col-9">
									<h6 class="text-dark font-weight-bold mb-10">Website Info:</h6>
								</div>
							</div>
							<!--end::Row-->
							<!--begin::Group-->
							<div class="form-group row">
								<label class="col-form-label col-3 text-lg-right text-left">Favicon</label>
								<div class="col-9">
									<div class="image-input image-input-outline" id="favicon1">
										<div class="image-input-wrapper" id="favicon_view" style="background-image: url({{ asset(setting('favicon')) }})"></div>

										<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Ganti Favicon">
											<i class="fa fa-pen icon-sm text-muted"></i>
											<input type="file" name="profile_avatar" id="favicon" accept=".png, .jpg, .jpeg"/>
											<input type="hidden" name="profile_avatar_remove"/>
										</label>

										<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
											<i class="ki ki-bold-close icon-xs text-muted"></i>
										</span>
									</div>
									<span class="form-text text-muted">Favicon .ico file</span>
								</div>
							</div>
							<!--end::Group-->
							<!--begin::Group-->
							<div class="form-group row">
								<label class="col-form-label col-3 text-lg-right text-left">Logo</label>
								<div class="col-9">
									<div class="image-input image-input-outline" id="logo_1">
										<div class="image-input-wrapper" id="logo_l_1_view" style="background-image: url({{ asset(setting('logo_l_1')) }})"></div>

										<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Ganti Logo Utama">
											<i class="fa fa-pen icon-sm text-muted"></i>
											<input type="file" name="logo_l_1" id="logo_l_1" accept=".png, .jpg, .jpeg"/>
											<input type="hidden" name="logo_l_1_remove"/>
										</label>

										<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
											<i class="ki ki-bold-close icon-xs text-muted"></i>
										</span>
									</div>
									<div class="image-input image-input-outline ml-5" id="logo_2">
										<div class="image-input-wrapper" id="logo_l_2_view" style="background-image: url({{ asset(setting('logo_l_2')) }})"></div>

										<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Ganti Logo Minor">
											<i class="fa fa-pen icon-sm text-muted"></i>
											<input type="file" name="logo_l_2" id="logo_l_2" accept=".png, .jpg, .jpeg"/>
											<input type="hidden" name="logo_l_2_remove"/>
										</label>

										<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
											<i class="ki ki-bold-close icon-xs text-muted"></i>
										</span>
									</div>
									<span class="form-text text-muted">Website Logo recomended size 1:1</span>
								</div>
							</div>
							<!--end::Group-->
							<!--begin::Group-->
							<div class="form-group row">
								<label class="col-form-label col-3 text-lg-right text-left">Nama Applikasi</label>
								<div class="col-9">
                                    <div class="input-group">
										<input type="text" id="app_name" class="form-control form-control-lg form-control-solid" placeholder="App Name" value="{{ setting('app_name') }}"/>
										<div class="input-group-append">
											<button class="btn btn-primary" id="app_name_button" style="display: none" type="button">Ganti</button>
										</div>
                                    </div>
                                    <span class="form-text text-muted">Recomended 12 caracter</span>
								</div>
							</div>
							<!--end::Group-->
							<!--begin::Group-->
							<div class="form-group row">
								<label class="col-form-label col-3 text-lg-right text-left">Nama Sekolahan</label>
								<div class="col-9">
                                    <div class="input-group">
										<input type="text" id="school_name" class="form-control form-control-lg form-control-solid" placeholder="School Name" value="{{setting('school_name')}}"/>
										<div class="input-group-append">
											<button class="btn btn-primary" id="school_name_button" style="display: none" type="button">Ganti</button>
										</div>
                                    </div>
                                    <span class="form-text text-muted">Recomended 12 caracter</span>
								</div>
							</div>
							<!--end::Group-->

						</div>
					</div>
					<!--end::Row-->
				</div>
				<!--end::Tab-->
			</div>
			<!--begin::Footer-->

			<!--end::Footer-->
		</form>
	</div>
	<!--begin::Card body-->

</div>
<!--end::Card-->
@endsection
@push('css')
<link href="/assets/css/pages/wizard/wizard-4.css" rel="stylesheet" type="text/css" />
@endpush
@push('js')
<script>
	"use strict";

	// Class definition
	var KTUserEdit = function () {
		// Base elements
		var avatar, favicon, logo_l_1, logo_l_2;

		var initForm = function() {
			favicon = new KTImageInput('favicon');
			logo_l_1 = new KTImageInput('logo_l_1');
			logo_l_2 = new KTImageInput('logo_l_2');

			$('#favicon').on('change', function(e) {
				console.log($(this)[0].files[0]);
				e.preventDefault();

				var formData = new FormData();
				formData.append('slug', 'favicon');
				formData.append('image', $(this)[0].files[0]);


				$.ajax({
					type:'POST',
					url: '{{ route('master.setting.update') }}',
					data: formData,
					cache:false,
					contentType: false,
					processData: false,
					success:function(data){
						toastr.success('Berhasil mengganti data Logo 1');
						$('.logo-sticky').attr('src', data);
						$('#favicon_view').attr('style', 'background-image: url('+data+')')
						toastr.warning('Gambar berhasil diterapkan');
						console.log(data);
					},
					error: function(data){
						alert("error");
						console.log(data);
					}
				});
			});
			$('#logo_l_1').on('change', function(e) {
				console.log($(this)[0].files[0]);
				e.preventDefault();

				var formData = new FormData();
				formData.append('slug', 'logo_l_1');
				formData.append('image', $(this)[0].files[0]);


				$.ajax({
					type:'POST',
					url: '{{ route('master.setting.update') }}',
					data: formData,
					cache:false,
					contentType: false,
					processData: false,
					success:function(data){
						toastr.success('Berhasil mengganti data Logo 1');
						$('.logo-sticky').attr('src', data);
						$('#logo_l_1_view').attr('style', 'background-image: url('+data+')')
						toastr.warning('Gambar berhasil diterapkan');
						console.log(data);
					},
					error: function(data){
						alert("error");
						console.log(data);
					}
				});
			});
			$('#logo_l_2').on('change', function(e) {
				console.log($(this)[0].files[0]);
				e.preventDefault();

				var formData = new FormData();
				formData.append('slug', 'logo_l_2');
				formData.append('image', $(this)[0].files[0]);


				$.ajax({
					type:'POST',
					url: '{{ route('master.setting.update') }}',
					data: formData,
					cache:false,
					contentType: false,
					processData: false,
					success:function(data){
						toastr.success('Berhasil mengganti data Logo 2');
						$('.logo-sticky').attr('src', data);
						$('#logo_l_2_view').attr('style', 'background-image: url('+data+')')
						toastr.warning('Gambar berhasil diterapkan');
						console.log(data);
					},
					error: function(data){
						alert("error");
						console.log(data);
					}
				});
			});

			$( '#app_name' ).on('focus', function() {
				$( '#app_name_button' ).show();
			});
			$( '#app_name_button' ).click(function() {
				var formData = new FormData();
				formData.append('slug', 'app_name');
				formData.append('value', $( '#app_name' ).val());

				updateData(formData);
			});

			$( '#school_name' ).on('focus', function() {
				$( '#school_name_button' ).show();
			});
			$( '#school_name_button' ).click(function() {
				var formData = new FormData();
				formData.append('slug', 'school_name');
				formData.append('value', $( '#school_name' ).val());

				updateData(formData);
			});

			function updateData(data) {
				$.ajax({
					type:'POST',
					url: '{{ route('master.setting.update') }}',
					data: data,
					cache:false,
					contentType: false,
					processData: false,
					success:function(response) {
                        $('#app_name_button').hide();
                        $('#school_name_button').hide();
                        $('.'+data.get('slug')).text(data.get('value'));
						toastr.success(response);
					},
					error: function(data){
						alert("error");
						console.log(data);
					}
				});
			}
		}
		return {
			// public functions
			init: function() {
				initForm();
			}
		};
	}();

	jQuery(document).ready(function() {
		KTUserEdit.init();
	});

</script>
@endpush

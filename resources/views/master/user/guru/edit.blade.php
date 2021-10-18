@extends('master.layouts.app')
@push('title', 'Pengguna Guru')
@section('content')
<!--begin::Card-->
<div class="card card-custom">
	<!--begin::Card Body-->
	<div class="card-body p-0">
		<!--begin::Wizard 5-->
		<div class="wizard wizard-5 d-flex flex-column flex-lg-row flex-row-fluid" id="kt_wizard">
			<!--begin::Aside-->
			<div class="wizard-aside bg-white d-flex flex-column flex-row-auto w-100 w-lg-300px w-xl-400px w-xxl-500px">
				<!--begin::Aside Top-->
				<div class="d-flex flex-column-fluid flex-column px-xxl-30 px-10">
					<!--begin: Wizard Nav-->
					<div class="wizard-nav d-flex d-flex justify-content-center pt-10 pt-lg-20 pb-5">
						<!--begin::Wizard Steps-->
						<div class="wizard-steps">
							<!--begin::Wizard Step 1 Nav-->
							<div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
								<div class="wizard-wrapper">
									<div class="wizard-icon">
										<i class="wizard-check ki ki-check"></i>
										<span class="wizard-number">1</span>
									</div>
									<div class="wizard-label">
										<h3 class="wizard-title">Detail Pengguna Guru</h3>
										<div class="wizard-desc">Mempersiapkan pengguna guru</div>
									</div>
								</div>
							</div>
							<!--end::Wizard Step 1 Nav-->
							<!--begin::Wizard Step 2 Nav-->
							<div class="wizard-step" data-wizard-type="step">
								<div class="wizard-wrapper">
									<div class="wizard-icon">
										<i class="wizard-check ki ki-check"></i>
										<span class="wizard-number">2</span>
									</div>
									<div class="wizard-label">
										<h3 class="wizard-title">Mata Pelajaran & Kelas</h3>
										<div class="wizard-desc">Mempersiapkan Mata Pelajaran & Kelas</div>
									</div>
								</div>
							</div>
							<!--end::Wizard Step 2 Nav-->
							<!--begin::Wizard Step 3 Nav-->
							<div class="wizard-step" data-wizard-type="step">
								<div class="wizard-wrapper">
									<div class="wizard-icon">
										<i class="wizard-check ki ki-check"></i>
										<span class="wizard-number">3</span>
									</div>
									<div class="wizard-label">
										<h3 class="wizard-title">Selesai!</h3>
										<div class="wizard-desc">Konfirmasi tinjauan data</div>
									</div>
								</div>
							</div>
							<!--end::Wizard Step 3 Nav-->
						</div>
						<!--end::Wizard Steps-->
					</div>
					<!--end: Wizard Nav-->
				</div>
				<!--end::Aside Top-->
				<!--begin::Aside Bottom-->
				<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-y-bottom bgi-position-x-center bgi-size-contain pt-2 pt-lg-5 h-350px" style="background-image: url(assets/media/svg/illustrations/features.svg)"></div>
				<!--end::Aside Bottom-->
			</div>
			<!--begin::Aside-->
			<!--begin::Content-->
			<div class="wizard-content bg-gray-100 d-flex flex-column flex-row-fluid py-15 px-5 px-lg-10">
				<!--begin::Title-->
				<div class="text-right mb-lg-30 mb-15 mr-xxl-10">
					<span class="font-weight-bold text-muted font-size-h5">Having issues?</span>
					<a href="javascript:;" class="font-weight-bolder text-primary font-size-h4" id="kt_login_signup">Get Help</a>
				</div>
				<!--end::Title-->
				<!--begin::Form-->
				<div class="d-flex justify-content-center flex-row-fluid">
					<form class="pb-5 w-100 w-md-450px w-lg-500px" novalidate="novalidate" id="kt_form">
						<!--begin: Wizard Step 1-->
						<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
							<!--begin::Title-->
							<div class="pb-10 pb-lg-15">
								<h3 class="font-weight-bolder text-dark font-size-h2">Update Account</h3>
								<div class="text-muted font-weight-bold font-size-h5">Already have an Account ?
								<a href="custom/pages/login/login-3/signin.html" class="text-primary font-weight-bolder">Sign In</a></div>
							</div>
							<!--begin::Title-->
							<!-- input id -->
								<input type="text" id="tid" value="{{$teacher->id}}" hidden name="id">
							<!-- end input id -->
							<!--begin::Form Group-->
							<div class="form-group">
								<label class="font-size-h6 font-weight-bolder text-dark">Nama Guru</label>
								<input type="text" value="{{$teacher->name}}" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" name="name" id="name" placeholder="Nama Guru" />
							</div>
							<!--end::Form Group-->
							<!--begin::Form Group-->
							<div class="form-group">
								<label class="font-size-h6 font-weight-bolder text-dark">E-mail</label>
								<input type="email" value="{{$teacher->email}}" class="form-control h-auto p-6 border-0 rounded-lg font-size-h6" name="email" id="email" placeholder="E-mail Pengguna" />
							</div>
							<!--end::Form Group-->
							<!--begin::Form Group-->
							<div class="form-group">
								<label class="font-size-h6 font-weight-bolder text-dark">Kata Sandi</label>
								<input type="password" class="form-control h-auto p-6 border-0 rounded-lg font-size-h6" name="password" placeholder="Kata Sandi Pengguna" id="password" />
                                <span class="form-text text-muted">Diisi hanya untuk mengganti.</span>
                            </div>
							<!--end::Form Group-->
						</div>
						<!--end: Wizard Step 1-->
						<!--begin: Wizard Step 2-->
						<div class="pb-5" data-wizard-type="step-content">
							<!--begin::Title-->
							<div class="pb-10 pb-lg-15">
								<h3 class="font-weight-bolder text-dark font-size-h2">Address Details</h3>
								<div class="text-muted font-weight-bold font-size-h4">Have a Different Address ?
								<a href="#" class="text-primary font-weight-bolder">Add Address</a></div>
							</div>
							<!--end::Title-->
							<!--begin::Form Group-->
							<div class="form-group">
								<label class="font-size-h6 font-weight-bolder text-dark">Mata Pelajaran</label><br>
								<select name="mapel" id="mapel" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6" multiple="multiple">
									@foreach($kelompoks as $kelompok)
									<?php
										$mapels = App\Mapel::where('kelompok_id', $kelompok->id)->get();
									?>
									<optgroup label="{{ $kelompok->name }}">
										@foreach($mapels as $mapel)
										<option {{ in_array( $mapel->name, json_decode($teacher->getRawOriginal('mapel')) ) ? 'selected' : '' }}>{{ $mapel->name }}</option>
										@endforeach
									</optgroup>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label class="font-size-h6 font-weight-bolder text-dark">Wali Kelas</label>
								<select name="kelas_id" id="kelas_id" class="form-control h-auto p-5 border-0 rounded-lg font-size-h6">
									<option value="">Pilih Kelas</option>
									@foreach($kelases as $kelas)
									<option value="{{ $kelas->id }}" {{ $kelas->id == $teacher->kelas_id ? 'selected' : '' }}>{{ $kelas->name }}</option>
									@endforeach
								</select>
							</div>
							<!--begin::Form Group-->
						</div>
						<!--end: Wizard Step 2-->
						<!--begin: Wizard Step 3-->
						<div class="pb-5" data-wizard-type="step-content">
							<!--begin::Title-->
							<div class="pb-10 pb-lg-15">
								<h3 class="font-weight-bolder text-dark font-size-h2">Sebentar Lagi</h3>
								<div class="text-muted font-weight-bold font-size-h4">Teliti data anda sebelum mengkonfirmasi!</div>
							</div>
							<!--end::Title-->
							<!--begin::Section-->
							<h4 class="font-weight-bolder mb-3">Detail Akun:</h4>
							<div class="text-dark-50 font-weight-bold line-height-lg mb-8">
								<div>Nama : <span id="confirm-name"></span></div>
								<div>Email : <span id="confirm-email"></span></div>
								<div>Kata Sandi : ********</div>
							</div>
							<!--end::Section-->
							<!--begin::Section-->
							<h4 class="font-weight-bolder mb-3">Edit Data:</h4>
							<div class="text-dark-50 font-weight-bold line-height-lg mb-8">
								<div>Mata Pelajaran : <span id="confirm-mapel"></span></div>
								<div>Wali Kelas : <span id="confirm-kelas"></span></div>
							</div>
							<!--end::Section-->
						</div>
						<!--end: Wizard Step 3-->
						<!--begin: Wizard Actions-->
						<div class="d-flex justify-content-between pt-3">
							<div class="mr-2">
								<button type="button" class="btn btn-light-primary font-weight-bolder font-size-h6 pl-6 pr-8 py-4 my-3 mr-3" data-wizard-type="action-prev">
								<span class="svg-icon svg-icon-md mr-1">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Left-2.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000)" x="14" y="7" width="2" height="10" rx="1" />
											<path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997)" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>Previous</button>
							</div>
							<div>
								<button type="button" class="btn btn-primary font-weight-bolder font-size-h6 pl-5 pr-8 py-4 my-3" data-wizard-type="action-submit">Submit
								<span class="svg-icon svg-icon-md ml-2">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Right-2.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
											<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span></button>
								<button type="button" class="btn btn-primary font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3" data-wizard-type="action-next">Next Step
								<span class="svg-icon svg-icon-md ml-1">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Right-2.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<rect fill="#000000" opacity="0.3" transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)" x="7.5" y="7.5" width="2" height="9" rx="1" />
											<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span></button>
							</div>
						</div>
						<!--end: Wizard Actions-->
					</form>
				</div>
				<!--end::Form-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Wizard 5-->
	</div>
	<!--end::Card Body-->
</div>
<!--end::Card-->
@endsection
@push('css')
<link href="/assets/css/pages/wizard/wizard-5.css" rel="stylesheet" type="text/css" />
@endpush
@push('js')
<script type="text/javascript">
	"use strict";

	// Class definition
	var KTWizard5 = function () {
		$('#mapel').select2({
			placeholder: "Pilih Mata Pelajaran",
			width: '100%'
		});
		$('#kelas_id').select2({
			placeholder: "Pilih Kelas",
			width: '100%'
		});

		// Base elements
		var _wizardEl;
		var _formEl;
		var _wizardObj;
		var _validations = [];

		// Private functions
		var _initWizard = function () {
			// Initialize form wizard
			_wizardObj = new KTWizard(_wizardEl, {
				startStep: 1, // initial active step number
				clickableSteps: false  // allow step clicking
			});

			// Validation before going to next page
			_wizardObj.on('change', function (wizard) {
				if (wizard.getStep() > wizard.getNewStep()) {
					return; // Skip if stepped back
				}

				// Validate form before change wizard step
				var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

				if (validator) {
					validator.validate().then(function (status) {
						if (status == 'Valid') {
							wizard.goTo(wizard.getNewStep());

							KTUtil.scrollTop();
						} else {
							Swal.fire({
								text: "Silahkan cek data yang anda masukan.",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok",
								customClass: {
									confirmButton: "btn font-weight-bold btn-light"
								}
							}).then(function () {
								KTUtil.scrollTop();
							});
						}
					});
				}

				return false;  // Do not change wizard step, further action will be handled by he validator
			});

			// Change event
			_wizardObj.on('changed', function (wizard) {
				KTUtil.scrollTop();
				$('#confirm-name').text($('#name').val());
				$('#confirm-email').text($('#email').val());
				$('#confirm-mapel').text($('#mapel').val());
				$('#confirm-kelas').text($('#kelas_id option:selected').text());
			});

			// Submit event
			_wizardObj.on('submit', function (wizard) {
				Swal.fire({
					text: "Semua telah terisi, Lakukan konfirmasi pengiriman data guru!.",
					icon: "warning",
					showCancelButton: true,
					buttonsStyling: false,
					confirmButtonText: "Ya, submit!",
					cancelButtonText: "Tidak, gagal",
					customClass: {
						confirmButton: "btn font-weight-bold btn-primary",
						cancelButton: "btn font-weight-bold btn-default"
					}
				}).then(function (result) {
					if (result.value) {
						// _formEl.submit(); // Submit form
						var name = $('#name').val();
						var kelas_id = $('#kelas_id').val();
						var email = $('#email').val();
						var mapel = $('#mapel').val();
						var kelas = $('#kelas').val();
						var id = $('#tid').val();

						$.ajax({
							type: "POST",
							url: "{{ route('master.user.teacher.update') }}/"+ id,
							data: {
								name: name,
								kelas_id: kelas_id,
								email: email,
								mapel: mapel,
								kelas: kelas,
							},
							success: function(data){
								toastr.success('Berhasil Mengubah data Guru');
								window.location.href = "{{ route('master.user.teacher') }}";
							},
							error: function(data){
								toastr.error('Gagal Mengubah data Guru, Silahkan cek inputan anda');
							}
						});
					} else if (result.dismiss === 'cancel') {
						Swal.fire({
							text: "Inputan Gagal Diubah!.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-primary",
							}
						});
					}
				});
			});
		}

		var _initValidation = function () {
			// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
			// Step 1
			_validations.push(FormValidation.formValidation(
				_formEl,
				{
					fields: {
						name: {
							validators: {
								notEmpty: {
									message: 'Cek data nama guru'
								}
							}
						},
						email: {
							validators: {
								notEmpty: {
									message: 'Cek data email pengguna'
								}
							}
						},
						// password: {
						// 	validators: {
						// 		notEmpty: {
						// 			message: 'Cek data kata sandi pengguna'
						// 		}
						// 	}
						// },
					},
					plugins: {
						trigger: new FormValidation.plugins.Trigger(),
						// Bootstrap Framework Integration
						bootstrap: new FormValidation.plugins.Bootstrap({
							//eleInvalidClass: '',
							eleValidClass: '',
						})
					}
				}
			));

			// Step 2
			_validations.push(FormValidation.formValidation(
				_formEl,
				{
					fields: {
						mapel: {
							validators: {
								notEmpty: {
									message: 'Address is required'
								}
							}
						},
					},
					plugins: {
						trigger: new FormValidation.plugins.Trigger(),
						// Bootstrap Framework Integration
						bootstrap: new FormValidation.plugins.Bootstrap({
							//eleInvalidClass: '',
							eleValidClass: '',
						})
					}
				}
			));
		}

		return {
			// public functions
			init: function () {
				_wizardEl = KTUtil.getById('kt_wizard');
				_formEl = KTUtil.getById('kt_form');

				_initWizard();
				_initValidation();
			}
		};
	}();

	jQuery(document).ready(function () {
		KTWizard5.init();
	});

</script>
@endpush

@extends('teacher.layouts.app')
@push('title', 'Teacher Dashboarda')
@section('content')
<!--begin::Row-->
<div class="row">
	<div class="col-xl-4">
		<!--begin::Tiles Widget 1-->
		<div class="card card-custom gutter-b card-stretch">
			<!--begin::Header-->
			<div class="card-header border-0 pt-5">
				<h3 class="card-title font-weight-bolder">E-rapor Generator</h3>
				<div class="card-toolbar">
					<div class="dropdown dropdown-inline">
						<a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="ki ki-bold-more-hor"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
							<!--begin::Navigation-->
							<ul class="navi navi-hover py-5">
								<li class="navi-item">
									<a href="#" class="navi-link">
										<span class="navi-icon">
											<i class="flaticon2-drop"></i>
										</span>
										<span class="navi-text">Buat E-rapor</span>
									</a>
								</li>
								<li class="navi-item">
									<a href="#" class="navi-link">
										<span class="navi-icon">
											<i class="flaticon-user"></i>
										</span>
										<span class="navi-text">Data Siswa</span>
									</a>
								</li>
							</ul>
							<!--end::Navigation-->
						</div>
					</div>
				</div>
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body d-flex flex-column">
				<div class="flex-grow-1">
					<div id="success_presentation_rpdf_chart" style="height: 200px"></div>
				</div>
				<div class="pt-5">
					<p class="text-center font-weight-normal font-size-lg pb-7">Catatan: Angka diatas menunjukan presentasi keberhasilan dalam proses pembuatan E-rapor PDF</p>
					<a href="#" class="btn btn-success btn-shadow-hover font-weight-bolder w-100 py-3">Generate E-rapor</a>
				</div>
			</div>
			<!--end::Body-->
		</div>
		<!--end::Tiles Widget 1-->
	</div>
	<div class="col-xl-8">
		<div class="row">
			<div class="col-xl-3">
				<!--begin::Tiles Widget 3-->
				<div class="card card-custom bgi-no-repeat bgi-no-repeat bgi-size-cover gutter-b" style="height: 150px; background-image: url({{ asset('assets/media/bg/bg-9.jpg') }})">
					<!--begin::Body-->
					<div class="card-body d-flex flex-column">
						<!--begin::Title-->
						<a href="#" class="text-dark-75 text-hover-primary font-weight-bolder font-size-h3">{{ setting('app_name') }}</a>
						<!--end::Title-->
					</div>
					<!--end::Body-->
				</div>
				<!--end::Tiles Widget 3-->
			</div>
			<div class="col-xl-9">
				<!--begin::Mixed Widget 10-->
				<div class="card card-custom gutter-b" style="height: 150px">
					<!--begin::Body-->
					<div class="card-body d-flex align-items-center justify-content-between flex-wrap">
						<div class="mr-2">
							<h3 class="font-weight-bolder">Set Up Website</h3>
							<div class="text-dark-50 font-size-lg mt-2">Sesuaikan Pengaturan Platform Anda</div>
						</div>
						<a href="#" class="btn btn-primary font-weight-bold py-3 px-6">Start Now</a>
					</div>
					<!--end::Body-->
				</div>
				<!--end::Mixed Widget 10-->
			</div>
		</div>
		<div class="row">
			<div class="col-xl-6">
				<!--begin::Tiles Widget 13-->
				<div class="card card-custom bgi-no-repeat gutter-b" style="height: 175px; background-color: #663259; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto; background-image: url({{ asset('assets/media/svg/patterns/taieri.svg') }})">
					<!--begin::Body-->
					<div class="card-body d-flex align-items-center">
						<div>
							<h3 class="text-white font-weight-bolder line-height-lg mb-5">Lihat Data
								<br>Peserta Didik</h3>
							<a href='{{ route('teacher.student') }}' class="btn btn-success font-weight-bold px-6 py-3">Klik Disini</a>
						</div>
					</div>
					<!--end::Body-->
				</div>
				<!--end::Tiles Widget 13-->
				<div class="row">
					<div class="col-xl-6">
						<!--begin::Tiles Widget 11-->
						<div class="card card-custom bg-primary gutter-b" style="height: 150px">
							<div class="card-body">
								<span class="svg-icon svg-icon-3x svg-icon-white ml-n2">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg') }}-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
											<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
								<div class="text-inverse-primary font-weight-bolder font-size-h2 mt-3">{{ dataCount('rapor_pdf_exports') }}</div>
								<a href="#" class="text-inverse-primary font-weight-bold font-size-lg mt-1">Data E-rapor</a>
							</div>
						</div>
						<!--end::Tiles Widget 11-->
					</div>
					<div class="col-xl-6">
						<!--begin::Tiles Widget 12-->
						<div class="card card-custom gutter-b" style="height: 150px">
							<div class="card-body">
								<span class="svg-icon svg-icon-3x svg-icon-success">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg') }}-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
											<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
								<div class="text-dark font-weight-bolder font-size-h2 mt-3">{{ dataCount('students') }}</div>
								<a href="#" class="text-muted text-hover-primary font-weight-bold font-size-lg mt-1">Peserta Didik</a>
							</div>
						</div>
						<!--end::Tiles Widget 12-->
					</div>
				</div>
			</div>
			<div class="col-xl-6">
				<!--begin::Mixed Widget 14-->
				<div class="card card-custom bgi-no-repeat bgi-size-cover gutter-b card-stretch" style="background-image: url({{ asset('assets/media/stock-600x600/img-16.jpg') }})">
					<!--begin::Body-->
					<div class="card-body d-flex flex-column align-items-start justify-content-start">
						<div class="p-1 flex-grow-1">
							<h3 class="text-white font-weight-bolder line-height-lg mb-5">Buat Data
							<br />E-rapor Otomatis</h3>
						</div>
						<a href='#' class="btn btn-link btn-link-warning font-weight-bold">Buat Sekarang
						<span class="svg-icon svg-icon-lg svg-icon-warning">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg') }}-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<polygon points="0 0 24 0 24 24 0 24" />
									<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
									<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
								</g>
							</svg>
							<!--end::Svg Icon-->
						</span></a>
					</div>
					<!--end::Body-->
				</div>
				<!--end::Mixed Widget 14-->
			</div>
		</div>
	</div>
</div>
<!--end::Row-->
@endsection
@push('js')
<script type="text/javascript">
	'use strict';
// Class definition

var KTDefaultDatatableDemo = function() {

	var success_presentation_rpdf = function () {
        var element = document.getElementById("success_presentation_rpdf_chart");
        var height = parseInt(KTUtil.css(element, 'height'));

        if (!element) {
            return;
        }

        var options = {
            series: [{{ $success_presentation_rpdf }}],
            chart: {
                height: height,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: "65%"
                    },
                    dataLabels: {
                        showOn: "always",
                        name: {
                            show: false,
                            fontWeight: '700'
                        },
                        value: {
                            color: KTApp.getSettings()['colors']['gray']['gray-700'],
                            fontSize: "30px",
                            fontWeight: '700',
                            offsetY: 12,
                            show: true,
                            formatter: function (val) {
                                return val + '%';
                            }
                        }
                    },
                    track: {
                        background: KTApp.getSettings()['colors']['theme']['light']['success'],
                        strokeWidth: '100%'
                    }
                }
            },
            colors: [KTApp.getSettings()['colors']['theme']['base']['success']],
            stroke: {
                lineCap: "round",
            },
            labels: ["Progress"]
        };

        var chart = new ApexCharts(element, options);
        chart.render();
    }

	return {
		// public functions
		init: function() {
			success_presentation_rpdf();
		},
	};
}();

jQuery(document).ready(function() {
	KTDefaultDatatableDemo.init();
});

</script>
@endpush

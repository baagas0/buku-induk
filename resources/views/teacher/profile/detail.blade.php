@extends('teacher.layouts.app')
@push('title', 'Data Diri Guru')
@php
    $user = auth()->guard('teacher')->user();
@endphp
@section('content')
<!--begin::Card-->
<div class="card card-custom">
    <!--begin::Card header-->
    <!--begin::Card body-->
    <form class="form" id="kt_form" method="POST" action="{{ route('teacher.profile.update') }}">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-7 my-2">
                    <!--begin::Row-->
                    <div class="row">
                        <label class="col-3"></label>
                        <div class="col-9">
                            <h6 class="text-dark font-weight-bold mb-10">Teacher Information Biodata:</h6>
                        </div>
                    </div>
                    <!--end::Row-->
                    <!--begin::Group-->
                    <div class="form-group row">
                        <label class="col-form-label col-3 text-lg-right text-left">Nama</label>
                        <div class="col-9">
                            <input class="form-control form-control-lg form-control-solid" name="name" type="text" value="{{ $user->name }}" />
                            <span class="form-text text-muted">Tambahkan title anda dibagian belakang.</span>
                        </div>
                    </div>
                    <!--end::Group-->
                    <!--begin::Group-->
                    <div class="form-group row">
                        <label class="col-form-label col-3 text-lg-right text-left">Wali Kelas</label>
                        <div class="col-9">
                            <input class="form-control form-control-lg form-control-solid" disabled type="text" value="{{ $user->kelas ? $user->kelas->name : '-' }}" />
                            <span class="form-text text-muted">Minta TU untuk memberikan Hak Wali Kelas.</span>
                        </div>
                    </div>
                    <!--end::Group-->
                    <!--begin::Group-->
                    <div class="form-group row">
                        <label class="col-form-label col-3 text-lg-right text-left">Mengajar</label>
                        <div class="col-9">
                            {!! $user->mapel !!}
                            <span class="form-text text-muted">Minta TU untuk mengedit.</span>
                        </div>
                    </div>
                    <!--end::Group-->
                    <!--begin::Group-->
                    <div class="form-group row">
                        <label class="col-form-label col-3 text-lg-right text-left">Alamat Surel</label>
                        <div class="col-9">
                            <div class="input-group input-group-lg input-group-solid">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-at"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control form-control-lg form-control-solid" name="email" value="{{ $user->email }}" placeholder="Email" />
                            </div>
                        </div>
                    </div>
                    <!--end::Group-->
                    <div class="separator separator-dashed my-7"></div>
                    <!--begin::Row-->
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="alert alert-custom alert-light-danger fade show py-4" role="alert">
                                <div class="alert-icon">
                                    <i class="flaticon-warning"></i>
                                </div>
                                <div class="alert-text font-weight-bold">Biarkan kosong jika tidak ingin mengganti. <br>Anda akan logout jika mengganti kata sandi saat ini.</div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">
                                            <i class="la la-close"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Row-->

                    <!--begin::Group-->
                    <div class="form-group row">
                        <label class="col-form-label col-3 text-lg-right text-left">Kata sandi baru</label>
                        <div class="col-9">
                            <input class="form-control form-control-lg form-control-solid" name="password" type="password" placeholder="Kata sandi baru" />
                        </div>
                    </div>
                    <!--end::Group-->
                    <!--begin::Group-->
                    <div class="form-group row">
                        <label class="col-form-label col-3 text-lg-right text-left">Konfirmasi kata sandi</label>
                        <div class="col-9">
                            <input class="form-control form-control-lg form-control-solid" name="password_confirm" type="password" placeholder="Konfirmasi kata sandi" />
                        </div>
                    </div>
                    <!--end::Group-->
                </div>
            </div>
            <!--end::Row-->
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
    <!--begin::Card body-->
</div>
<!--end::Card-->
@endsection

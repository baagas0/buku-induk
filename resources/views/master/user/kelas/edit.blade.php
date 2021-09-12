@extends('master.layouts.app')
@push('title', 'Pengguna Kelas')
@section('content')

<div class="card card-custom">
 <div class="card-header">
  <h3 class="card-title">
   Input Sizing
</h3>
</div>
<!--begin::Form-->
<form class="form" method="POST" action="{{route('master.user.kelas.update',$kelas->id)}}">
   @csrf
  <div class="card-body">
   <div class="form-group form-group-last">
</div>
<div class="form-group">
 <label>Name</label>
 <input type="text" name="name" class="form-control form-control-lg" value="{{$kelas->name}}"  placeholder="Large input"/>
</div>
<div class="card-footer">
   <button type="submit"  class="btn btn-success mr-2">Submit</button>
   <button type="reset" class="btn btn-secondary">Cancel</button>
</div>
</form>
<!--end::Form-->
</div>
@endsection
@push('css')
<link href="/assets/css/pages/wizard/wizard-5.css" rel="stylesheet" type="text/css" />
@endpush
@push('js')
@endpush
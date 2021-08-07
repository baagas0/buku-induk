@extends('teacher.layouts.app')
@push('title', 'View Siswa')
@section('content')
<!--begin::Card-->
<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			{{-- <center> --}}
			<h3 class="card-label text-center">Capaian Hasil Belajar Peserta Didik</h3>
			{{-- </center> --}}
		</div>
	</div>
	<div class="card-body">
		<table style="margin-left: 30px;">
			<tr>
				<td>Nama</td>
				<td> : {{ $student->name }}</td>
			</tr>
			<tr>
				<td>Nis</td>
				<td> : {{ $student->nis }}</td>
			</tr>
		</table>

		<!--
			Nilai Pengetahuan, Praktik dan Sikap
		-->
		<fieldset class="Nilai 1 mt-6" >
			<p><b>I Nilai Pengetahuan, Praktik dan Sikap</b></p>
			<!--begin: Datatable-->
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
				<thead class="text-center">
					<tr>
						<th rowspan="4" style="width: 10px">No</th>
						<th rowspan="4">Komponen</th>
						<th rowspan="1" colspan="8">Tahun Pelajaran</th>
					</tr>
					<tr>
						<th colspan="8">Kelas : X IPA</th>
					</tr>
					<tr>
						<th rowspan="2">KKM</th>
						<th>SMT</th>
						<th>:</th>
						<th>1</th>

						<th>SMT</th>
						<th>:</th>
						<th>2</th>
					</tr>
					<tr>
						<th>Peng</th>
						<th>Ketr</th>
						<th>Skp</th>

						<th>Peng</th>
						<th>Ketr</th>
						<th>Skp</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
			<!--end: Datatable-->
		</fieldset>

		<!--
			Pengembangan Diri
		-->
		<fieldset class="Nilai 1 mt-6" >
			<p><b>II Pengembangan Diri</b></p>
			<!--begin: Datatable-->
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
				<thead>
					<tr class="text-center">
						<th rowspan="2" style="width: 10px">No</th>
						<th rowspan="2">Jenis Kegiatan</th>
						<th colspan="2">TP 2017 2018</th>
					</tr>
					<tr>
						<th>Smt 1</th>
						<th>Smt 2</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>OSIM</td>
						<td>B</td>
						<td>A</td>
					</tr>
				</tbody>
			</table>
			<!--end: Datatable-->
		</fieldset>

		<!--
			Akhlak Mulia dan Kepribadian
		-->
		<fieldset class="Nilai 1 mt-6" >
			<p><b>III Akhlak Mulia dan Kepribadian</b></p>
			<!--begin: Datatable-->
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
				<thead>
					<tr class="text-center">
						<th rowspan="2" style="width: 10px">No</th>
						<th rowspan="2">Aspek Yang Dinilai</th>
						<th colspan="2">TP 2017 2018</th>
					</tr>
					<tr>
						<th>Semester 1</th>
						<th>Semester 2</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Kedisiplinan</td>
						<td>B</td>
						<td>A</td>
					</tr>
				</tbody>
			</table>
			<!--end: Datatable-->
		</fieldset>

		<!--
			Ketidakhadiran
		-->
		<fieldset class="Nilai 1 mt-6" >
			<p><b>III Akhlak Mulia dan Kepribadian</b></p>
			<!--begin: Datatable-->
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
				<thead>
					<tr class="text-center">
						<th rowspan="2" style="width: 10px">No</th>
						<th rowspan="2">Alasan Ketidakhadiran</th>
						<th colspan="2">TP 2017 2018</th>
					</tr>
					<tr>
						<th>Semester 1</th>
						<th>Semester 2</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Sakit</td>
						<td>1</td>
						<td>3</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Izin</td>
						<td>1</td>
						<td>3</td>
					</tr>
				</tbody>
			</table>
			<!--end: Datatable-->
		</fieldset>

		<!--
			Catatan Prestasi Yang Telah DIcapai
		-->
		<fieldset class="Nilai 1 mt-6" >
			<p><b>VI Catatan Prestasi Yang Telah Dicapai</b></p>
			<!--begin: Datatable-->
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
				<thead>
					<tr class="text-center">
						<th style="width: 10px">No</th>
						<th>Kegiatan Yang Diikuti</th>
						<th>Bukti Sertifikat</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td rowspan="4">1</td>
						<td rowspan="4">Ekstrakurikuler</td>
					</tr>
					<tr>
						<td>1. </td>
					</tr>
					<tr>
						<td>2. </td>
					</tr>
					<tr>
						<td>3. </td>
					</tr>

					<tr>
						<td rowspan="4">2</td>
						<td rowspan="4">Keikutsertaan dalam organisasi kegiatan sekolah</td>
					</tr>
					<tr>
						<td>1. </td>
					</tr>
					<tr>
						<td>2. </td>
					</tr>
					<tr>
						<td>3. </td>
					</tr>

					<tr>
						<td rowspan="4">3</td>
						<td rowspan="4">Catatan khusus lainnya</td>
					</tr>
					<tr>
						<td>1. </td>
					</tr>
					<tr>
						<td>2. </td>
					</tr>
					<tr>
						<td>3. </td>
					</tr>
				</tbody>
			</table>
			<!--end: Datatable-->
		</fieldset>

		<!--
			Kelulusan Peserta Didik
		-->
		<fieldset class="Nilai 1 mt-6" >
			<p><b>VII Kelulusan Peserta Didik</b></p>
			<!--begin: Datatable-->
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
				<thead>
					<tr class="text-center">
						<th style="width: 10px">No</th>
						<th>Uraian</th>
						<th>Ijazah</th>
						<th>SKHUN</th>
						<th>SHUAMBN</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Nomor</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Penanggalan</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Diberikan Tanggal</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
					</tr>
				</tbody>
			</table>
			<!--end: Datatable-->
		</fieldset>

		<!--
			Nilai Hasil Ujian (UM & Ijazah)
		-->
		<fieldset class="Nilai 1 mt-6" >
			<p><b>VIII Nilai Hasil Ujian (UM & Ijazah)</b></p>
			<!--begin: Datatable-->
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
				<thead>
					<tr>
						<th style="width: 10px">No</th>
						<th>Pelajaran</th>
						<th>UM</th>
						<th>Ijazah</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><b>A</b></td>
						<td><b>Kelompok Wajib A</b></td>
						<td></td>
						<td></td>
					</tr>

					<tr>
						<td rowspan="3">1</td>
						<td>PAI</td>
						<td></td>
						<td></td>
					</tr>

					<tr>
						<td>a. Al-Qur'an</td>
						<td></td>
						<td></td>
					</tr>

					<tr>
						<td>b. Aqidah</td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<!--end: Datatable-->
		</fieldset>
	</div>
</div>
<!--end::Card-->
@endsection
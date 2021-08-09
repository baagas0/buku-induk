@extends('teacher.layouts.app')
@push('title', 'View Siswa')
@section('content')
<?php
	$r_th = Request::get('tahun_pelajaran');
?>

<form class="row">
	<div class="form-group col-md-6">
		<label class="text-white text-hover-white opacity-75 hover-opacity-100">Tahun Pelajaran</label>
		<div class="input-group">
			<input type="text" class="form-control" name="tahun_pelajaran" id="filter_th_pelajaran" value="{{ $r_th ? $r_th : '' }}" placeholder="yyyy/yyyy" />
			<div class="input-group-append">
				<button type="submit" class="btn btn-info" type="button">Go!</button>
			</div>
		</div>
		<span class="form-text text-muted">Input tahun pelajaran: <code>yyyy/yyyy</code></span>
	</div>
</form>
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
			<tr>
				<td>Tahun Pelajaran</td>
				<td> : {{ $th->th_mulai.'/'.$th->th_selesai }}</td>
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
						<?php for($i=0; $i<count($tahunpelajaran); $i++){?>
							<th colspan="7">Tahun Pelajaran : {{ $tahunpelajaran[$i].'/'.($tahunpelajaran[$i]+1) }}</th>
						<?php } ?>
					</tr>
					<tr>
					<?php for($i=0; $i<count($tahunpelajaran); $i++){?>
						<th colspan="7">Kelas : X IPA</th>
						<?php } ?>
					</tr>
					<tr>
						<?php for($i=0; $i<count($tahunpelajaran); $i++){?>
						<th rowspan="2">KKM</th>
						<th>SMT</th>
						<th>:</th>
						<th>1</th>

						<th>SMT</th>
						<th>:</th>
						<th>2</th>
						<?php } ?>
					</tr>
					<tr>
						<?php for($i=0; $i<count($tahunpelajaran); $i++){ ?>
							<th>Peng</th>
							<th>Ketr</th>
							<th>Skp</th>

							<th>Peng</th>
							<th>Ketr</th>
							<th>Skp</th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1; 
					$temp_kel="";
					$temp_map="";?>

					@foreach($nilai as $row)
					<?php
						
						// if($temp_kel!=$row->name){
						// 	$temp_kel=$row->name;
						// 	echo '<tr><td></td><td><b>'.$temp_kel.'</b></td>';
							
						// 	for($j=0;$j<count($tahunpelajaran)*7;$j++){
						// 		echo '<td></td>';
						// 	}
						// 	echo '</tr>';
						// }
						if($temp_kel!=$row->nmkel){
							$temp_kel=$row->nmkel;
							$totcol = count($tahunpelajaran)*7+1;
							echo '<tr class="bg-secondary"><td></td><td colspan="'.$totcol.'"><b>'.$temp_kel.'</b></td></tr>';
						}
					?>

					<?php if($row->is_sub==1 && $temp_map != $row->name){ $totcol = count($tahunpelajaran)*7+1;?>
						<tr><td>{{ $no }}</td><td colspan="<?=$totcol?>">{{ $row->name }}masuk</td>
						</tr>
					<?php $no++; } $temp_map=$row->name;?>
					
					<tr>
						<?php if($row->is_sub == 0){ ?>
							<td>{{ $no }}</td>
							<td>{{ $row->name}}</td>
							<?php for($i=0; $i<count($tahunpelajaran); $i++){ ?>
							<?php 
								$mapelid = $row->nameid;
								$thun2 = $tahunpelajaran[$i];
								$q2 = DB::select("SELECT a.id, a.kkm, b.n_peng, b.n_ketr, b.n_skp , c.n_peng as n_peng2, c.n_ketr as n_ketr2, c.n_skp as n_skp2 from master_nilais a left join nilais b on a.id = b.master_nilai_id left join nilais c on a.id = c.master_nilai_id where a.th_pelajaran='$thun2' and a.mapel_id='$mapelid' and b.student_id='1' and b.semester='1' and c.student_id='1' and c.semester='2' limit 1");
								if(count($q2)!=0){
								?>
								
								@foreach($q2 as $qrow)
								<td>{{ $qrow->kkm}}</td>
								<td>{{ $qrow->n_peng }}</td>
								<td>{{ $qrow->n_ketr }}</td>
								<td>{{ $qrow->n_skp }}</td>
								<td>{{ $qrow->n_peng2 }}</td>
								<td>{{ $qrow->n_ketr2 }}</td>
								<td>{{ $qrow->n_skp2 }}</td>
								@endforeach
							<?php }else{?>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
							<?php
								
							}

							}?>
							<?php $no++;?>
						<?php }else{ ?>
							<td></td>
							<td>{{ $row->subname}}</td>
							<?php for($i=0; $i<count($tahunpelajaran); $i++){ ?>
							<?php 
								$submapelid = $row->subnameid;
								$thun1 = $tahunpelajaran[$i];
								$q1 = DB::select("SELECT a.id, a.kkm, b.n_peng, b.n_ketr, b.n_skp , c.n_peng as n_peng2, c.n_ketr as n_ketr2, c.n_skp as n_skp2 from master_nilais a left join nilais b on a.id = b.master_nilai_id left join nilais c on a.id = c.master_nilai_id where a.th_pelajaran='$thun1' and a.sub_mapel_id='$submapelid' and b.student_id='1' and b.semester='1' and c.student_id='1' and c.semester='2' limit 1");
								if(count($q1)!=0){
									?>
								@foreach($q1 as $qrow)
								<td>{{ $qrow->kkm}}</td>
								<td>{{ $qrow->n_peng }}</td>
								<td>{{ $qrow->n_ketr }}</td>
								<td>{{ $qrow->n_skp }}</td>
								<td>{{ $qrow->n_peng2 }}</td>
								<td>{{ $qrow->n_ketr2 }}</td>
								<td>{{ $qrow->n_skp2 }}</td>
								@endforeach
								<?php }else{?>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
								<?php
									
								}

							}?>
						<?php } ?>
					</tr>
					@endforeach
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
						<th colspan="2">TP {{ $th->th_mulai.'/'.$th->th_selesai }}</th>
					</tr>
					<tr>
						<th>Smt 1</th>
						<th>Smt 2</th>
					</tr>
				</thead>
				<tbody>
					@foreach($upds as $upd)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $upd->upd->name }}</td>
						<td>{{ $upd->n_smt_1 }}</td>
						<td>{{ $upd->n_smt_2 }}</td>
					</tr>
					@endforeach
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
						<th colspan="2">TP {{ $th->th_mulai.'/'.$th->th_selesai }}</th>
					</tr>
					<tr>
						<th>Semester 1</th>
						<th>Semester 2</th>
					</tr>
				</thead>
				<tbody>
					@foreach($aspeks as $aspek)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $aspek->name }}</td>
						<td>{{ $aspek->score->n_smt_1 }}</td>
						<td>{{ $aspek->score->n_smt_2 }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<!--end: Datatable-->
		</fieldset>

		<!--
			Ketidakhadiran
		-->
		<fieldset class="Nilai 1 mt-6" >
			<p><b>IV Ketidakhadiran</b></p>
			<!--begin: Datatable-->
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
				<thead>
					<tr class="text-center">
						<th rowspan="2" style="width: 10px">No</th>
						<th rowspan="2">Alasan Ketidakhadiran</th>
						<th colspan="2">TP {{ $th->th_mulai.'/'.$th->th_selesai }}</th>
					</tr>
					<tr>
						<th>Semester 1</th>
						<th>Semester 2</th>
					</tr>
				</thead>
				<tbody>
					@foreach($ketidakhadirans as $row)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $row->name }}</td>
						<td>{{ $row->score->n_smt_1 }}</td>
						<td>{{ $row->score->n_smt_2 }}</td>
					</tr>
					@endforeach
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
						<th>Nomor Sertifikat</th>
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
@push('js')
<script type="text/javascript">
	// Class definition

var KTInputmask = function () {

 // Private functions
 var demos = function () {
  // date format
  $("#filter_th_pelajaran").inputmask("9999/9999", {
   "placeholder": "yyyy/yyyy",
   autoUnmask: true
  });
 }

 return {
  // public functions
  init: function() {
   demos();
  }
 };
}();

jQuery(document).ready(function() {
 KTInputmask.init();
});
</script>
@endpush
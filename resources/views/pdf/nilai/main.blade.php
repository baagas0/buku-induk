<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>asd</title>

		{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" /> --}}
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
				<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		{{-- <link href="http://buku-induk.test/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> --}}
		{{-- <link href="http://buku-induk.test/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" /> --}}
		<link href="http://buku-induk.test/assets/css/style.bundle.css" rel="stylesheet" type="text/css" media="all" />

	<style type="text/css">
		table { page-break-inside:auto!important }
		tr    { page-break-inside:avoid!important; page-break-after:auto!important }
		thead { display:table-header-group!important }
		tfoot { display:table-footer-group!important }
	</style>
	<style type="text/css" rel="stylesheet"	>
	html {
		margin: 0;
	}
	body {
		font-size: 12px;
	}

	table, thead, th, tr, td {
		line-height: 0.7!important;
	}

	/*.table {
		page-break-inside: avoid;
	}*/

	.table thead tr th, 
	.table tbody tr, 
	.table th {
		max-height: 10px;
		vertical-align: middle;
	}
	</style>
</head>
<body style="background: #ffffff!important;">
<?php
	$r_th = Request::get('tahun_pelajaran');
?>

		<!--begin::Card-->

		{{-- <center> --}}
		<h3 class="card-label text-center">Capaian Hasil Belajar Peserta Didik</h3>
		{{-- </center> --}}

		<table class="" style="margin-left: 30px;">
			<tr>
				<td style="line-height: 1.3!important;">Nama</td>
				<td style="line-height: 1.3!important;"> : {{ $student->name }}</td>
			</tr>
			{{-- <tr>
				<td style="line-height: 1.3!important;">Nis</td>
				<td style="line-height: 1.3!important;"> : {{ $student->nis }}</td>
			</tr>
			<tr>
				<td style="line-height: 1.3!important;">Tahun Pelajaran</td>
				<td style="line-height: 1.3!important;"> : {{ $tahunpelajaran[0].'/'.$tahunpelajaran[count($tahunpelajaran) - 1 ] }}</td>
			</tr> --}}
		</table>

		<!--
			Nilai Pengetahuan, Praktik dan Sikap
		-->
		<fieldset class="" >
			<p class="p-line-height"><b>I Nilai Pengetahuan, Praktik dan Sikap</b></p>
			<!--begin: Datatable-->
			
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
				<thead class="text-center">
					<tr>
						<th rowspan="4" style="width: 10px;">No</th>
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
						<tr><td>{{ $no }}</td><td colspan="<?=$totcol?>">{{ $row->name }}</td>
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
								$q2 = DB::select("SELECT a.id, a.kkm, b.n_peng, b.n_ketr, b.n_skp , c.n_peng as n_peng2, c.n_ketr as n_ketr2, c.n_skp as n_skp2 from master_nilais a left join nilais b on a.id = b.master_nilai_id left join nilais c on a.id = c.master_nilai_id where a.th_pelajaran='$thun2' and a.mapel_id='$mapelid' and b.student_id='$student->id' and b.semester='1' and c.student_id='$student->id' and c.semester='2' limit 1");
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
								$q1 = DB::select("SELECT a.id, a.kkm, b.n_peng, b.n_ketr, b.n_skp , c.n_peng as n_peng2, c.n_ketr as n_ketr2, c.n_skp as n_skp2 from master_nilais a left join nilais b on a.id = b.master_nilai_id left join nilais c on a.id = c.master_nilai_id where a.th_pelajaran='$thun1' and a.sub_mapel_id='$submapelid' and b.student_id='$student->id' and b.semester='1' and c.student_id='$student->id' and c.semester='2' limit 1");
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
		<fieldset class="" >
			<p class="p-line-height"><b>II Pengembangan Diri</b></p>
			<!--begin: Datatable-->
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
				<thead>
					<tr class="text-center">
						<th rowspan="2" style="width: 10px">No</th>
						<th rowspan="2">Jenis Kegiatan</th>
						<?php for($i=0; $i<count($tahunpelajaran); $i++){?>
						<th colspan="2">TP {{ $tahunpelajaran[$i].'/'.($tahunpelajaran[$i]+1) }}</th>
						<?php } ?>
					</tr>
					<tr>
						<?php for($i=0; $i<count($tahunpelajaran); $i++){?>
						<th>Smt 1</th>
						<th>Smt 2</th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					@foreach($upds as $key => $upd)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $upd[0]->upd->name }}</td>
						@foreach($upd as $nilai)
						<td>{{ $nilai ? $nilai->n_smt_1 : '-' }}</td>
						<td>{{ $nilai ? $nilai->n_smt_2 : '-' }}</td>
						@endforeach
					</tr>
					@endforeach
				</tbody>
			</table>
			<!--end: Datatable-->
		</fieldset>

		<!--
			Akhlak Mulia dan Kepribadian
		-->
		<fieldset class="" >
			<p class="p-line-height"><b>III Akhlak Mulia dan Kepribadian</b></p>
			<!--begin: Datatable-->
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important;-fs-table-paginate: paginate;">
				<thead>
					<tr class="text-center">
						<th rowspan="2" style="width: 10px">No</th>
						<th rowspan="2">Aspek Yang Dinilai</th>
						<?php for($i=0; $i<count($tahunpelajaran); $i++){?>
						<th colspan="2">TP {{ $tahunpelajaran[$i].'/'.($tahunpelajaran[$i]+1) }}</th>
						<?php } ?>
					</tr>
					<tr>
						<?php for($i=0; $i<count($tahunpelajaran); $i++){?>
						<th>Smt 1</th>
						<th>Smt 2</th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					@foreach($aspeks as $key => $aspek)
					@if($loop->iteration == 5)

					@endif
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $aspek->name }}</td>
						@php
							for($i=0; $i<count($tahunpelajaran); $i++){
								$nilai = App\AspekScore::where([
									'student_id'	=> $student->id,
									'th_pelajaran' 	=> $tahunpelajaran[$i],
									'aspek_id'		=> $aspek->id
								])->first();
						@endphp
							<td>{{ $nilai ? $nilai->n_smt_1 : '-' }}</td>
							<td>{{ $nilai ? $nilai->n_smt_2 : '-' }}</td>
						@php } @endphp
					</tr>
					@endforeach
				</tbody>
			</table>
			<!--end: Datatable-->
		</fieldset>

		<!--
			Ketidakhadiran
		-->
		<fieldset class="" >
			<p class="p-line-height"><b>IV Ketidakhadiran</b></p>
			<!--begin: Datatable-->
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
				<thead>
					<tr class="text-center">
						<th rowspan="2" style="width: 10px">No</th>
						<th rowspan="2">Alasan Ketidakhadiran</th>
						<?php for($i=0; $i<count($tahunpelajaran); $i++){?>
						<th colspan="2">TP {{ $tahunpelajaran[$i].'/'.($tahunpelajaran[$i]+1) }}</th>
						<?php } ?>
					</tr>
					<tr>
						<?php for($i=0; $i<count($tahunpelajaran); $i++){?>
						<th>Smt 1</th>
						<th>Smt 2</th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					@foreach($ketidakhadirans as $key => $ketidakhadiran)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $ketidakhadiran->name }}</td>
						@php
							for($i=0; $i<count($tahunpelajaran); $i++){
								$nilai = App\KetidakhadiranScore::where([
									'student_id'	=> $student->id,
									'th_pelajaran' 	=> $tahunpelajaran[$i],
									'ketidakhadiran_id'		=> $ketidakhadiran->id
								])->first();
						@endphp
							@if($nilai)
							<td>{{ $nilai->n_smt_1 }}</td>
							<td>{{ $nilai->n_smt_2 }}</td>
							@else
							<td>-</td>
							<td>-</td>
							@endif
						@php } @endphp
					</tr>
					@endforeach
				</tbody>
			</table>
			<!--end: Datatable-->
		</fieldset>

		<!--
			Catatan Prestasi Yang Telah DIcapai
		-->
		<fieldset class="" >
			<p class="p-line-height"><b>VI Catatan Prestasi Yang Telah Dicapai</b></p>
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
					@foreach($kegiatans as $key => $kegiatan)
						@php
							$prestasi = App\Prestasi::where([
								'student_id'	=> $student->id,
								'kegiatan_id'	=> $kegiatan->id
							])->get();
							$rowspan = count($prestasi) + 1;
						@endphp
					<tr>
						<td rowspan="{{ $rowspan < 4 ? 4 : $rowspan }}">{{ $loop->iteration }}</td>
						<td rowspan="{{ $rowspan < 4 ? 4 : $rowspan }}">{{ $kegiatan->name }}</td>
					</tr>
						@foreach($prestasi as $row)
						<tr>
							<td>{{ $loop->iteration.'. '.$row->nomor_sertifikat }}</td>
						</tr>
						@endforeach
						@for($i=$rowspan; $i < 4; $i++)
						<tr>
							<td>{{ $i.'.' }}</td>
						</tr>
						@endfor
					@endforeach
				</tbody>
			</table>
			<!--end: Datatable-->
		</fieldset>

		<!--
			Kelulusan Peserta Didik
		-->
		<fieldset class="" >
			<p class="p-line-height"><b>VII Kelulusan Peserta Didik</b></p>
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
					@foreach($kelulusans as $row)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $row->uraian }}</td>
						<td>{{ $row->ijazah ? $row->ijazah : '-' }}</td>
						<td>{{ $row->skhun ? $row->skhun : '-' }}</td>
						<td>{{ $row->shuambn ? $row->shuambn : '-' }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<!--end: Datatable-->
		</fieldset>

		<!--
			Nilai Hasil Ujian (UM & Ijazah)
		-->
		<fieldset class="" >
			<p class="p-line-height"><b>VIII Nilai Hasil Ujian (UM & Ijazah)</b></p>
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
					@foreach($kelompoks as $key => $kelompok)
					<tr class="bg-secondary">
						<td></td>
						<td colspan="3"><b>{{ $kelompok->name }}</b></td>
					</tr>
					@php
						$mapels = App\Mapel::where('kelompok_id', $kelompok->id)->get(); 
					@endphp
						@foreach($mapels as $mapel)
						@php
							$n = App\HasilUjian::where([
								'student_id' => $student->id,
								'mapel_id'	 => $mapel->id,
							])->first();
						@endphp
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td  colspan="{{ $mapel->is_sub == 1 ? 3 : '' }}">{{ $mapel->name }}</td>
							@if($mapel->is_sub == 0)
							<td>{{ $n ? $n->n_um : '-' }}</td>
							<td>{{ $n ? $n->n_ijazah : '-' }}</td>
							@endif
						</tr>
							@if($mapel->is_sub == 1)
							<?php $submapels = App\SubMapel::where('mapel_id', $mapel->id)->get() ?>
								@foreach($submapels as $submapel)
								@php
									$sn = App\HasilUjian::where([
										'student_id' => $student->id,
										'sub_mapel_id'	 => $submapel->id,
									])->first();
								@endphp
								<tr>
									<td></td>
									<td>{{ $submapel->name }}</td>
									<td>{{ $sn ? $sn->n_um : '-' }}</td>
									<td>{{ $sn ? $sn->n_ijazah : '-' }}</td>

								</tr>
								@endforeach
							@endif
						@endforeach
					@endforeach
				</tbody>
			</table>
			<!--end: Datatable-->
		</fieldset>
		<!--end::Card-->
</body>
</html>
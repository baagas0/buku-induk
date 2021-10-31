<?php
	$r_th = Request::get('tahun_pelajaran');
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" media="all"> --}}
    <style type="text/css">
        /* Header & Footer CSS */
        @page {
            header: page-header;
            footer: page-footer;
        }
		table { page-break-inside:auto!important }
		tr    { page-break-inside:avoid!important; page-break-after:auto!important }
		thead { display:table-header-group!important }
		tfoot { display:table-footer-group!important }
	</style>
	<style type="text/css" rel="stylesheet"	media="all">
	html {
		margin: 10;
        background-color: #ffffff!important;
	}
	body {
        background-color: #ffffff!important;
        font-family: Poppins;
		font-size: 10px;
	}

	table, thead, th, tr, td {
        height: 20px;
		/* line-height: 1!important; */
	}

	.table thead tr th,
	.table tbody tr td {
        /* text-align: left;
        margin-left: 5px;
        vertical-align: middle; */
		/* max-height: 10px; */
		/* vertical-align: middle; */
	}

	.page {page-break-inside:avoid!important; page-break-after:auto!important};
	</style>
  </head>

  <body>
        @foreach ($jurnals as $jurnal)
        <!-- Title -->
		<b><h5 class="text-center">Jurnal Kelas {{ $jurnal->kelas->name }}</h5></b>

        <!-- Biodata Siswa -->
		<table class="" style="margin-left: 30px;">
			<tr>
				<td style="line-height: 1.3!important;">Tanggal </td>
				<td style="line-height: 1.3!important;"> : {{ $jurnal->day.', '.$jurnal->date }}</td>
			</tr>
			<tr>
				<td style="line-height: 1.3!important;">Kelas </td>
				<td style="line-height: 1.3!important;"> : {{ $jurnal->kelas->name }}</td>
			</tr>
            <tr>
				<td style="line-height: 1.3!important;">Mata Pelajaran </td>
				<td style="line-height: 1.3!important;"> : {{ !empty($jurnal->mapel) ? $jurnal->mapel->name : $jurnal->sub_mapel->name }}</td>
			</tr>
            <tr>
				<td style="line-height: 1.3!important;">Jam Ke </td>
				<td style="line-height: 1.3!important;"> : {{ $jurnal->jam_ke }}</td>
			</tr>
            <tr>
				<td style="line-height: 1.3!important;">materi </td>
				<td style="line-height: 1.3!important;"> : {{ $jurnal->materi }}</td>
			</tr>
		</table>

		<!--
			Kelulusan Peserta Didik
		-->
		<fieldset class="" style="margin-top: 30px">
			<p class="p-line-height"><b>Data siswa yang berhalangan</b></p>
			<!--begin: Datatable-->
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
				<thead>
					<tr class="text-center">
						<th style="width: 20px" style="text-align: center;">No</th>
						<th>Nama Siswa</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				<tbody>
                    @foreach ($jurnal->student as $student)
					<tr>
                        <td style="text-align: center;">{{ $loop->iteration }}</td>
						<td>{{ $student->student->name }}</td>
						<td>{{ $student->keterangan }}</td>
					</tr>
                    @endforeach
				</tbody>
			</table>
			<!--end: Datatable-->
		</fieldset>
        @if(!$loop->last)
        <div style="height:0;page-break-after: always; margin:0; border-top:none;"></div>
        @endif
        @endforeach
        <!-- Footer -->
        <htmlpagefooter name="page-footer">
            <p style="text-align: right!important">
                &copy; Dibuat otomatis oleh platform {{ setting('app_name') }}
            </p>
        </htmlpagefooter>
  </body>
</html>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> --}}

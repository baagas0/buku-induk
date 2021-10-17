@extends('master.layouts.app')
@push('title', 'Data Mata Pelajaran')
@section('instruction', 'mapel_page')
@section('content')
	<!--begin::Card-->
	<div class="card card-custom">
		<div class="card-header">
			<div class="card-title">
				<span class="card-icon">
					<i class="flaticon2-favourite text-primary"></i>
				</span>
				<h3 class="card-label">Mata Pelajaran</h3>
			</div>
			<div class="card-toolbar">

				<!--begin::Button-->
				<a href="#" class="btn btn-primary font-weight-bolder">
				<i class="la la-plus"></i>New Record</a>
				<!--end::Button-->
			</div>
		</div>
		<div class="card-body">
			<!--begin: Datatable-->
			<table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
				<thead>
					<tr>
						<th style="width: 10px">No</th>
						<th>Komponen</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($kelompoks as $key => $kelompok)
					<tr>
						<td>{{ chr(substr("000".($key+65),-3)) }}</td>
						<td>{{ $kelompok->name }}</td>
						<td>
							<!-- Entry Data Kelompok -->
	                        <a href="javascript::" data-toggle="modal" data-target="#modalKelompok" class="btn btn-sm btn-clean btn-icon mr-2" data-type="create" title="Entry Data Kelompok">
	                            <span class="svg-icon svg-icon-md">
	                            	<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo2\dist/../src/media/svg/icons\Code\Commit.svg-->
	                            	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	                            		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                            			<rect x="0" y="0" width="24" height="24"/>
	                            			<path d="M20.5,11 L22.5,11 C23.3284271,11 24,11.6715729 24,12.5 C24,13.3284271 23.3284271,14 22.5,14 L20.5,14 C19.6715729,14 19,13.3284271 19,12.5 C19,11.6715729 19.6715729,11 20.5,11 Z M1.5,11 L3.5,11 C4.32842712,11 5,11.6715729 5,12.5 C5,13.3284271 4.32842712,14 3.5,14 L1.5,14 C0.671572875,14 1.01453063e-16,13.3284271 0,12.5 C-1.01453063e-16,11.6715729 0.671572875,11 1.5,11 Z" fill="#000000" opacity="0.3"/>
	                            			<path d="M12,16 C13.6568542,16 15,14.6568542 15,13 C15,11.3431458 13.6568542,10 12,10 C10.3431458,10 9,11.3431458 9,13 C9,14.6568542 10.3431458,16 12,16 Z M12,18 C9.23857625,18 7,15.7614237 7,13 C7,10.2385763 9.23857625,8 12,8 C14.7614237,8 17,10.2385763 17,13 C17,15.7614237 14.7614237,18 12,18 Z" fill="#000000" fill-rule="nonzero"/>
	                            		</g>
	                            	</svg>
	                            	<!--end::Svg Icon-->
	                            </span>
	                        </a>

	                        <!-- Entry Data Mapel -->
	                        <a href="javascript::" data-toggle="modal" data-target="#modalMapel" data-type="create" data-field-kelompok-id="{{ $kelompok->id }}" data-field-kelompok-name="{{ $kelompok->name }}" class="btn btn-sm btn-clean btn-icon mr-2" title="Entry Data Mapel">
	                            <span class="svg-icon svg-icon-md">
	                            	<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo2\dist/../src/media/svg/icons\Code\Git1.svg-->
	                            	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	                            		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                            			<rect x="0" y="0" width="24" height="24"/>
	                            			<rect fill="#000000" opacity="0.3" x="11" y="8" width="2" height="9" rx="1"/>
	                            			<path d="M12,21 C13.1045695,21 14,20.1045695 14,19 C14,17.8954305 13.1045695,17 12,17 C10.8954305,17 10,17.8954305 10,19 C10,20.1045695 10.8954305,21 12,21 Z M12,23 C9.790861,23 8,21.209139 8,19 C8,16.790861 9.790861,15 12,15 C14.209139,15 16,16.790861 16,19 C16,21.209139 14.209139,23 12,23 Z" fill="#000000" fill-rule="nonzero"/>
	                            			<path d="M12,7 C13.1045695,7 14,6.1045695 14,5 C14,3.8954305 13.1045695,3 12,3 C10.8954305,3 10,3.8954305 10,5 C10,6.1045695 10.8954305,7 12,7 Z M12,9 C9.790861,9 8,7.209139 8,5 C8,2.790861 9.790861,1 12,1 C14.209139,1 16,2.790861 16,5 C16,7.209139 14.209139,9 12,9 Z" fill="#000000" fill-rule="nonzero"/>
	                            		</g>
	                            	</svg>
	                            	<!--end::Svg Icon-->
	                            </span>
	                        </a>

	                        <!-- Edit Data Kelompok -->
							<a href="javascript::" data-toggle="modal" data-target="#modalKelompok" data-type="update" data-field-id="{{ $kelompok->id }}" data-field-name="{{ $kelompok->name }}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
	                            <span class="svg-icon svg-icon-md">
	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                                        <rect x="0" y="0" width="24" height="24"/>
	                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
	                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
	                                    </g>
	                                </svg>
	                            </span>
	                        </a>

	                        <!-- Delete Data Kelompok -->
	                        <a href="javascript::" class="btn btn-sm btn-clean btn-icon mr-2 deleteKelompok" data-field-id="{{ $kelompok->id }}" title="Hapus data">
	                            <span class="svg-icon svg-icon-md">
	                            	<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo2\dist/../src/media/svg/icons\General\Trash.svg-->
	                            	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	                            		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                            			<rect x="0" y="0" width="24" height="24"/>
	                            			<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
	                            			<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
	                            		</g>
	                            	</svg>
	                            	<!--end::Svg Icon-->
	                            </span>
	                        </a>
						</td>
					</tr>
						<?php $mapels = App\Mapel::where('kelompok_id', $kelompok->id)->get() ?>
						@foreach($mapels as $mapel)
							<?php $submapels = App\SubMapel::where('mapel_id', $mapel->id)->get() ?>
							<tr>
								<td rowspan="{{ $submapels->count() + 1 }}">{{ $loop->iteration }}</td>
								<td>{{ $mapel->name }}</td>
								<td>
									<!-- Entry Data Sub Mapel -->
									<a href="javascript::" data-toggle="modal" data-target="#modalSubMapel" data-type="create" data-field-mapel-id="{{ $mapel->id }}" data-field-mapel-name="{{ $mapel->name }}" class="btn btn-sm btn-clean btn-icon mr-2" title="Entry Data Sub Mapel">
										<span class="svg-icon svg-icon-md">
											<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo2\dist/../src/media/svg/icons\Code\Git4.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M6,7 C7.1045695,7 8,6.1045695 8,5 C8,3.8954305 7.1045695,3 6,3 C4.8954305,3 4,3.8954305 4,5 C4,6.1045695 4.8954305,7 6,7 Z M6,9 C3.790861,9 2,7.209139 2,5 C2,2.790861 3.790861,1 6,1 C8.209139,1 10,2.790861 10,5 C10,7.209139 8.209139,9 6,9 Z" fill="#000000" fill-rule="nonzero"/>
													<path d="M7,11.4648712 L7,17 C7,18.1045695 7.8954305,19 9,19 L15,19 L15,21 L9,21 C6.790861,21 5,19.209139 5,17 L5,8 L5,7 L7,7 L7,8 C7,9.1045695 7.8954305,10 9,10 L15,10 L15,12 L9,12 C8.27142571,12 7.58834673,11.8052114 7,11.4648712 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
													<path d="M18,22 C19.1045695,22 20,21.1045695 20,20 C20,18.8954305 19.1045695,18 18,18 C16.8954305,18 16,18.8954305 16,20 C16,21.1045695 16.8954305,22 18,22 Z M18,24 C15.790861,24 14,22.209139 14,20 C14,17.790861 15.790861,16 18,16 C20.209139,16 22,17.790861 22,20 C22,22.209139 20.209139,24 18,24 Z" fill="#000000" fill-rule="nonzero"/>
													<path d="M18,13 C19.1045695,13 20,12.1045695 20,11 C20,9.8954305 19.1045695,9 18,9 C16.8954305,9 16,9.8954305 16,11 C16,12.1045695 16.8954305,13 18,13 Z M18,15 C15.790861,15 14,13.209139 14,11 C14,8.790861 15.790861,7 18,7 C20.209139,7 22,8.790861 22,11 C22,13.209139 20.209139,15 18,15 Z" fill="#000000" fill-rule="nonzero"/>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</a>

									<!-- Edit Data -->
									<a href="javascript::" data-toggle="modal" data-target="#modalMapel" data-type="update" data-mapel-id="{{ $mapel->id }}" data-mapel-name="{{ $mapel->name }}" data-mapel-is-sub="{{ $mapel->is_sub }}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
										<span class="svg-icon svg-icon-md">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
													<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
												</g>
											</svg>
										</span>
									</a>
									<a href="javascript::" class="btn btn-sm btn-clean btn-icon mr-2 deleteMapel" data-field-id="{{ $mapel->id }}" title="Edit details">
										<span class="svg-icon svg-icon-md">
											<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo2\dist/../src/media/svg/icons\General\Trash.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
													<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</a>
								</td>
							</tr>
							@if($mapel->is_sub == 1)
								@foreach($submapels as $submapel)
								<tr>
									<td>{{ strtolower(chr(substr("000".($key+62),-2))).'. '.$submapel->name }}</td>
									<td >
										<!-- Edit Data -->
										<a href="javascript::" data-toggle="modal" data-target="#modalSubMapel" data-type="update" data-field-sub-mapel-id="{{ $submapel->id }}" data-field-sub-mapel-name="{{ $submapel->name }}" data-field-mapel-id="{{ $mapel->id }}" data-field-mapel-name="{{ $mapel->name }}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
											<span class="svg-icon svg-icon-md">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
														<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
													</g>
												</svg>
											</span>
										</a>
										<a href="javascript::" class="btn btn-sm btn-clean btn-icon mr-2 deleteSubMapel" data-field-id="{{ $submapel->id }}" title="Edit details">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo2\dist/../src/media/svg/icons\General\Trash.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
														<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</a>
									</td>
								</tr>
								@endforeach
							@endif
						@endforeach
					@endforeach
				</tbody>
			</table>
			<!--end: Datatable-->
		</div>
		@include('master.mapel.modal')
	</div>
	<!--end::Card-->
@endsection
@push('css')
<link href="/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endpush
@push('js')
<script src="/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="/assets/js/pages/features/miscellaneous/sweetalert2.js"></script>
<script>
	"use strict";
	var KTDatatablesDataSourceHtml = function() {

		var initTable1 = function() {
			var table = $('#kt_datatablea');

		// CRUD Table Kelompok
		$('#modalKelompok').on('shown.bs.modal', function (e) {
			var type = e.relatedTarget.dataset.type;

			if (type == 'create') {
				$('#kelompok_id').val('');
				$('#kelompok_name').val('');

				$('#modalKelompokLabel').text('Entry Data Kelompok');
				$('#saveModalKelompok').attr('data-button-type', 'create');
			}else if (type == 'update') {
				var field_id = e.relatedTarget.dataset.fieldId;
				var field_name = e.relatedTarget.dataset.fieldName;

				$('#kelompok_id').val(field_id);
				$('#kelompok_name').val(field_name);

				$('#modalKelompokLabel').text('Edit Kelompok');
				$('#saveModalKelompok').attr('data-button-type', 'update');
			}
		});
		$('#saveModalKelompok').on('click', function() {
			var type = $(this).attr('data-button-type');

			var name = $('#kelompok_name').val();
			if (type == 'create') {
				var alert = 'Berhasil Menambah data kelompok';
				var url = '{{ route('master.mapel.cu.kelompok') }}/'+type;
				var data = {
					name: name,
				};
			}else if (type == 'update') {
				var alert = 'Berhasil Mengedit data kelompok';
				var id = $('#kelompok_id').val();
				var url = '{{ route('master.mapel.cu.kelompok') }}/'+type+'/'+id;
				var data = {
					name: name,
				};
			}else { toastr.error('Kesalahan Fungsi'); }

			$.ajax({
				type: "POST",
				url: url,
				data: data,
				success: function(data){
					toastr.success(alert);
				},
				error: function(data){
					toastr.error('Operasi Gagal');
				}
			});
		});
		$('#kt_datatable').on('click', '.deleteKelompok', function() {
			var fieldId = $(this).attr('data-field-id');

			Swal.fire({
				title: "Anda Yakin?",
				text: "Menghapus data Kelompok",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Ya, hapus sekarang!"
			}).then(function(result) {
				if (result.value) {
					deleteData('kelompoks', fieldId);
				}
			});
		});
		$('#kt_datatable').on('click', '.deleteMapel', function() {
			var fieldId = $(this).attr('data-field-id');

			Swal.fire({
				title: "Anda Yakin?",
				text: "Menghapus data Mata Pelajaran",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Ya, hapus sekarang!"
			}).then(function(result) {
				if (result.value) {
					deleteData('mapels', fieldId);
				}
			});
		});
		$('#kt_datatable').on('click', '.deleteSubMapel', function() {
			var fieldId = $(this).attr('data-field-id');

			Swal.fire({
				title: "Anda Yakin?",
				text: "Menghapus data Sub Mata Pelajaran",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Ya, hapus sekarang!"
			}).then(function(result) {
				if (result.value) {
					deleteData('sub_mapels', fieldId);
				}
			});
		});

		// CRUD Table Mapel
		$('#modalMapel').on('shown.bs.modal', function (e) {
			console.log(e);
			var type = e.relatedTarget.dataset.type;
			var dataset = e.relatedTarget.dataset;

			if (type == 'create') {
				$('#mapel_id').val('');
				$('#mapel_name').val('');

				$('#mapel_kelompok_id').val(dataset.fieldKelompokId);
				$('#mapel_kelompok_name').val(dataset.fieldKelompokName);

				$('#modalMapelLabel').text('Entry Data Mapel');
				$('#saveModalMapel').attr('data-button-type', 'create');
			}else if (type == 'update') {
				$('#mapel_id').val(dataset.mapelId);
				$('#mapel_name').val(dataset.mapelName);

				$('#mapel_kelompok_id').val('');
				$('#mapel_kelompok_name').val('');
				// console.log(dataset.mapelIsSub);
				if (dataset.mapelIsSub == '1') {
					$('#mapel_is_sub').attr("checked", true);
					// alert('true');
				}else {
					$('#mapel_is_sub').attr("checked", false);
					// alert('false');
				}

				$('#modalMapelLabel').text('Edit Data Mapel');
				$('#saveModalMapel').attr('data-button-type', 'update');
			}
		});
		$('#saveModalMapel').on('click', function() {
			var type = $(this).attr('data-button-type');

			var mapel_kelompok_id 	 = $('#mapel_kelompok_id').val();
			var mapel_name			 = $('#mapel_name').val();
			var is_sub 			 	 = document.getElementById("mapel_is_sub").checked;
			console.log(is_sub);
			if (is_sub == true) {
				is_sub = 1;
			}else {
				is_sub = 0;
			}
			if (type == 'create') {
				var alert = 'Berhasil Menambah data mapel';
				var url = '{{ route('master.mapel.cu.mapel') }}/'+type;
				var data = {
					kelompok_id	: mapel_kelompok_id,
					name			: mapel_name,
					is_sub			: is_sub,
				};
			}else if (type == 'update') {
				var alert = 'Berhasil Mengedit data mapel';
				var id = $('#mapel_id').val();
				var url = '{{ route('master.mapel.cu.mapel') }}/'+type+'/'+id;
				var data = {
					// kelompok_id	: mapel_kelompok_id,
					name			: mapel_name,
					is_sub			: is_sub,
				};
			}else { toastr.error('Kesalahan Fungsi'); }

			$.ajax({
				type: "POST",
				url: url,
				data: data,
				success: function(data){
					toastr.success(alert);
				},
				error: function(data){
					toastr.error('Operasi Gagal');
				}
			});
		});

		// CRUD Table Sub Mapel
		$('#modalSubMapel').on('shown.bs.modal', function (e) {
			console.log(e);
			var type = e.relatedTarget.dataset.type;
			var dataset = e.relatedTarget.dataset;

			if (type == 'create') {
				$('#submapel_mapel_id').val(dataset.fieldMapelId);
				$('#submapel_mapel_name').val(dataset.fieldMapelName);

				$('#sub_mapel_id').val('');
				$('#sub_mapel_name').val('');

				$('#modalSubMapelLabel').text('Entry Data Sub Mapel');
				$('#saveModalSubMapel').attr('data-button-type', 'create');
			}else if (type == 'update') {
				$('#submapel_mapel_id').val(dataset.fieldMapelId);
				$('#submapel_mapel_name').val(dataset.fieldMapelName);

				$('#sub_mapel_id').val(dataset.fieldSubMapelId);
				$('#sub_mapel_name').val(dataset.fieldSubMapelName);

				$('#modalSubMapelLabel').text('Edit Data Sub Mapel');
				$('#saveModalSubMapel').attr('data-button-type', 'update');
			}
		});
		$('#saveModalSubMapel').on('click', function() {
			var type = $(this).attr('data-button-type');

			var mapel_id 	 = $('#submapel_mapel_id').val();
			var name 	 = $('#sub_mapel_name').val();

			if (type == 'create') {
				var alert = 'Berhasil Menambah data sub mapel';
				var url = '{{ route('master.mapel.cu.sub.mapel') }}/'+type;
				var data = {
					mapel_id : mapel_id,
					name	 : name,
				};
			}else if (type == 'update') {
				var alert = 'Berhasil Mengedit data sub mapel';
				var id = $('#sub_mapel_id').val();
				var url = '{{ route('master.mapel.cu.sub.mapel') }}/'+type+'/'+id;
				var data = {
					name			: name,
				};
			}else { toastr.error('Kesalahan Fungsi'); }

			$.ajax({
				type: "POST",
				url: url,
				data: data,
				success: function(data){
					toastr.success(alert);
				},
				error: function(data){
					toastr.error('Operasi Gagal');
				}
			});
		});

		function deleteData(table, fieldId) {
			$.ajax({
				type: "POST",
				url: "{{ route('master.mapel.delete.data') }}/"+table+'/'+fieldId,
				success: function(data){
					toastr.success(data);
				},
				error: function(data){
					toastr.error('Operasi penghapusan data Gagal');
				}
			});
		}

		// begin first table
		table.DataTable({
			responsive: true,
			orderable: false,
			columnDefs: [
			{
				targets: -1,
				title: 'Actions',
				orderable: false,
				render: function(data, type, full, meta) {
					return '\
					<div class="dropdown dropdown-inline">\
					<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
					<i class="la la-cog"></i>\
					</a>\
					<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">\
					<ul class="nav nav-hoverable flex-column">\
					<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-edit"></i><span class="nav-text">Edit Details</span></a></li>\
					<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-leaf"></i><span class="nav-text">Update Status</span></a></li>\
					<li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-print"></i><span class="nav-text">Print</span></a></li>\
					</ul>\
					</div>\
					</div>\
					<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
					<i class="la la-edit"></i>\
					</a>\
					<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
					<i class="la la-trash"></i>\
					</a>\
					';
				},
			},

			],
		});

	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesDataSourceHtml.init();
});


</script>
@endpush

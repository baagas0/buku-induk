<!-- Begin Modal Update Kelulusan -->

<div class="modal fade" id="updateKelulusan" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="updateKelulusanLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" class="form-control" id="kelulusan_id" hidden="" />
				<div class="form-group student_fieldset" hidden="">
					<label>Nama Siswa:</label>
					<input type="text" class="form-control" placeholder="Nama Siswa" id="kelulusan_student_name" disabled="" />
					<span class="form-text text-muted">[Diubah otomatis] Nama Siswa</span>
				</div>
				<div class="form-group">
					<label>Uraian:</label>
					<select class="form-control select2" id="kelulusan_uraian" name="kelulusan_uraian" style="width:100%">
						<option value="Nomor">Nomor</option>
						<option value="Penanggalan">Penanggalan</option>
						<option value="Diberikan Tanggal">Diberikan Tanggal</option>
					</select>
					<span class="form-text text-muted">[Edit: Tidak dapat diubah] Uraian nilai</span>
				</div>
				<div class="form-group">
					<label>Nilai</label>
					<div class="input-group input-group-lg">
						<div class="input-group-prepend"><span class="input-group-text" >Ijazah</span></div>
						<input type="text" class="form-control" placeholder="99.9" id="kelulusan_ijazah" />
					</div>
					<div class="input-group input-group-lg mt-3">
						<div class="input-group-prepend"><span class="input-group-text" >SKHUN</span></div>
						<input type="text" class="form-control" placeholder="99.9" id="kelulusan_skhun" />
					</div>
					<div class="input-group input-group-lg mt-3">
						<div class="input-group-prepend"><span class="input-group-text" >SHUAMBN</span></div>
						<input type="text" class="form-control" placeholder="99.9" id="kelulusan_shuambn" />
					</div>
					<span class="form-text text-muted">Nilai Ijazah, SKHUN, SHUAMBN dengan masing masing uraian</span>
				</div>						
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
				<button type="submit" id="saveUpdateKelulusan" data-button-type="update" class="btn btn-primary font-weight-bold">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- End Modal Update Kelulusan -->
<!-- Begin Modal Update Prestasi -->

<div class="modal fade" id="updatePrestasi" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="updatePrestasiLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" class="form-control" id="prestasi_id" hidden="" />
				<div class="form-group student_fieldset" hidden="">
					<label>Nama Siswa:</label>
					<input type="text" class="form-control" placeholder="Nama Siswa" id="prestasi_student_name" disabled="" />
					<span class="form-text text-muted">[Diubah otomatis] Nama Siswa</span>
				</div>
				<div class="form-group">
					<label>Kegiatan:</label><br>
					<select class="form-control select2" id="prestasi_kegiatan" name="prestasi_kegiatan" style="width:100%">
						@foreach($kegiatan as $row)
						<option value="{{ $row->id }}">{{ $row->name }}</option>
						@endforeach
					</select>
				</div>	
				<div class="form-group">
					<label>Nomor Sertifikat:</label>
					<input type="text" class="form-control" placeholder="Nomor Sertifikat" id="nomor_sertifikat" />
					<span class="form-text text-muted">Bukti kepemilikan sertifikat</span>
				</div>						
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
				<button type="submit" id="saveUpdatePrestasi" data-button-type="update" class="btn btn-primary font-weight-bold">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- End Modal Update Prestasi -->
<!-- Begin Modal Update Ketidakhadiran -->

<div class="modal fade" id="updateKetidakhadiran" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="updateKetidakhadiranLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" class="form-control" id="ketidakhadiran_id" hidden="" />
				<div class="form-group student_fieldset" hidden="">
					<label>Nama Siswa:</label>
					<input type="text" class="form-control" placeholder="Nama Siswa" id="ketidakhadiran_student_name" disabled="" />
					<span class="form-text text-muted">[Diubah otomatis] Nama Siswa</span>
				</div>
				<div class="form-group">
					<label>Kegiatan Ketidakhadiran:</label>
					<select class="form-control select2" id="ketidakhadiran_name" name="ketidakhadiran_name" style="width:100%" disabled="">
						@foreach($ketidakhadiran as $row)
						<option value="{{ $row->id }}">{{ $row->name }}</option>
						@endforeach
					</select>
					<span class="form-text text-muted">[Edit: Tidak dapat diubah] Nama Kegiatan Ketidakhadiran</span>
				</div>
				<div class="form-group">
					<label>Tahun Pelajaran:</label>
					<input type="text" class="form-control" placeholder="9999" id="ketidakhadiran_th_pelajaran" disabled="" />
					<span class="form-text text-muted">[Edit: Tidak dapat diubah] Tahun Pelajaran Kegiatan</span>
				</div>
				<div class="form-group">
					<label>Nilai</label>
					<div class="input-group input-group-lg">
						<div class="input-group-prepend"><span class="input-group-text" >S1</span></div>
						<input type="text" class="form-control" placeholder="99.9" id="ketidakhadiran_n_smt_1" />
					</div>
					<div class="input-group input-group-lg mt-3">
						<div class="input-group-prepend"><span class="input-group-text" >S2</span></div>
						<input type="text" class="form-control" placeholder="99.9" id="ketidakhadiran_n_smt_2" />
					</div>
					<span class="form-text text-muted">Nilai semester 1 & semester 2</span>
				</div>							
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
				<button type="submit" id="saveUpdateKetidakhadiran" data-button-type="update" class="btn btn-primary font-weight-bold">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- End Modal Update Ketidakhadiran -->
<!-- Begin Modal Update Aspek -->

<div class="modal fade" id="updateAspek" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="updateAspekLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" class="form-control" id="aspek_id" hidden="" />
				<div class="form-group student_fieldset" hidden="">
					<label>Nama Siswa:</label>
					<input type="text" class="form-control" placeholder="Nama Siswa" id="aspek_student_name" disabled="" />
					<span class="form-text text-muted">[Diubah otomatis] Nama Siswa</span>
				</div>
				<div class="form-group">
					<label>Kegiatan Aspek:</label>
					<select class="form-control select2" id="aspek_name" name="aspek_name" style="width:100%" disabled="">
						@foreach($aspek as $row)
						<option value="{{ $row->id }}">{{ $row->name }}</option>
						@endforeach
					</select>
					<span class="form-text text-muted">[Edit: Tidak dapat diubah] Nama Kegiatan Aspek</span>
				</div>
				<div class="form-group">
					<label>Tahun Pelajaran:</label>
					<input type="text" class="form-control" placeholder="9999" id="aspek_th_pelajaran" disabled="" />
					<span class="form-text text-muted">[Edit: Tidak dapat diubah] Tahun Pelajaran Kegiatan</span>
				</div>
				<div class="form-group">
					<label>Nilai</label>
					<div class="input-group input-group-lg">
						<div class="input-group-prepend"><span class="input-group-text" >S1</span></div>
						<input type="text" class="form-control" placeholder="99.9" id="aspek_n_smt_1" />
					</div>
					<div class="input-group input-group-lg mt-3">
						<div class="input-group-prepend"><span class="input-group-text" >S2</span></div>
						<input type="text" class="form-control" placeholder="99.9" id="aspek_n_smt_2" />
					</div>
					<span class="form-text text-muted">Nilai semester 1 & semester 2</span>
				</div>							
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
				<button type="submit" id="saveUpdateAspek" data-button-type="update" class="btn btn-primary font-weight-bold">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- End Modal Update Aspek -->
<!-- Begin Modal Update UPD -->

<div class="modal fade" id="updateUPD" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="updateUPDLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" class="form-control" id="upd_id" hidden="" />
				<div class="form-group student_fieldset" hidden="">
					<label>Nama Siswa:</label>
					<input type="text" class="form-control" placeholder="Nama Siswa" id="upd_student_name" disabled="" />
					<span class="form-text text-muted">[Diubah otomatis] Nama Siswa</span>
				</div>
				<div class="form-group">
					<label>Kegiatan UPD:</label>
					<select class="form-control select2" id="upd_name" name="upd_name" style="width:100%" disabled="">
						@foreach($upd as $row)
						<option value="{{ $row->id }}">{{ $row->name }}</option>
						@endforeach
					</select>
					<span class="form-text text-muted">[Edit: Tidak dapat diubah] Nama Kegiatan UPD</span>
				</div>
				<div class="form-group">
					<label>Tahun Pelajaran:</label>
					<input type="text" class="form-control" placeholder="9999" id="upd_th_pelajaran" disabled="" />
					<span class="form-text text-muted">[Edit: Tidak dapat diubah] Tahun Pelajaran Kegiatan</span>
				</div>
				<div class="form-group">
					<label>Nilai</label>
					<div class="input-group input-group-lg">
						<div class="input-group-prepend"><span class="input-group-text" >S1</span></div>
						<input type="text" class="form-control" placeholder="99.9" id="upd_n_smt_1" />
					</div>
					<div class="input-group input-group-lg mt-3">
						<div class="input-group-prepend"><span class="input-group-text" >S2</span></div>
						<input type="text" class="form-control" placeholder="99.9" id="upd_n_smt_2" />
					</div>
					<span class="form-text text-muted">Nilai semester 1 & semester 2</span>
				</div>							
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
				<button type="submit" id="saveUpdateUpd" data-button-type="update" class="btn btn-primary font-weight-bold">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- End Modal Update UPD -->
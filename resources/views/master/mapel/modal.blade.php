<!-- Begin Modal Kelompok -->

<div class="modal fade" id="modalKelompok" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalKelompokLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group" >
					<label>Nama Kelompok:</label>
					<input type="text" class="form-control" placeholder="Kelompok ID" id="kelompok_id" />
					<input type="text" class="form-control" placeholder="Nama Kelompok" id="kelompok_name" />
					<span class="form-text text-muted">Nama Kelompok</span>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
				<button type="submit" id="saveModalKelompok" data-button-type="create" class="btn btn-primary font-weight-bold">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- End Modal Kelompok -->
<!-- Begin Modal Mapel -->

<div class="modal fade" id="modalMapel" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalMapelLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group" >
					<label>Nama Kelompok:</label>
					<input type="text" class="form-control" placeholder="Kelompok ID" id="mapel_kelompok_id" disabled="" />
					<input type="text" class="form-control" placeholder="Nama Kelompok" id="mapel_kelompok_name" disabled="" />
					<span class="form-text text-muted">[Tidak dapat diubah] Nama Kelompok</span>
				</div>
				<div class="form-group" >
					<label>Nama Mapel:</label>
					<input type="text" class="form-control" placeholder="Mapel ID" id="mapel_id" disabled="" />
					<input type="text" class="form-control" placeholder="Nama Mapel" id="mapel_name" />
					<span class="form-text text-muted">Nama Mapel</span>
				</div>

				<div class="form-group row">
					<label class="col-3 col-form-label">Punya sub mapel?</label>
					<div class="col-3">
						<span class="switch switch-sm switch-icon">
							<label>
								<input type="checkbox" id="mapel_is_sub" name="is_sub" />
								<span></span>
							</label>
						</span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
				<button type="submit" id="saveModalMapel" data-button-type="create" class="btn btn-primary font-weight-bold">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- End Modal Mapel -->
<!-- Begin Modal Sub Mapel -->

<div class="modal fade" id="modalSubMapel" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalSubMapelLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group" >
					<label>Nama Mapel:</label>
					<input type="text" class="form-control" placeholder="Mapel ID" id="submapel_mapel_id" disabled="" />
					<input type="text" class="form-control" placeholder="Nama Mapel" id="submapel_mapel_name" disabled="" />
					<span class="form-text text-muted">[Tidak dapat diubah] Nama Kelompok</span>
				</div>
				<div class="form-group" >
					<label>Nama Sub Mapel:</label>
					<input type="text" class="form-control" placeholder="Sub Mapel ID" id="sub_mapel_id" disabled="" />
					<input type="text" class="form-control" placeholder="Sub Nama Mapel" id="sub_mapel_name" />
					<span class="form-text text-muted">Nama Sub Mapel</span>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
				<button type="submit" id="saveModalSubMapel" data-button-type="create" class="btn btn-primary font-weight-bold">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- End Modal Sub Mapel -->
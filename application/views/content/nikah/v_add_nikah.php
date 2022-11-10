<!doctype html>
<html>

<head>
	<title>Tambah Data Nikah</title>
	<!-- CSS only CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- JQuery and Javascript CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
	<script async src="https://docs.opencv.org/master/opencv.js" type="text/javascript"></script>
	<!-- JQuery Validation CDN -->
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
</head>

<body>
	<div style="width: 1200px ;" class="card">
		<div class="card-header">
			<h3>Tambah Data Nikah</h3>
		</div>
		<div class="card-body">
			<form id="form-tambah-nikah" method="post" action="<?= site_url('nikah/insert') ?>" enctype="multipart/form-data">
				<div class="form-group">
					<label class="form-label">Nomor Nikah</label>
					<input required type="number" class="form-control" name="no_nikah">
				</div>
				<div class="form-group">
					<label class="form-label">Nama Pria</label>
					<br>
					<select name="id_jemaat_pria" id="" class="form-control">
						<option value="" disabled selected>Pilih Data</option>
						<?php
						foreach ($jemaat as $j) {
							if ($j->jk_jemaat == 'L') {
								echo "<option value='$j->id_jemaat'>$j->nik_jemaat / $j->nama_jemaat</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="form-label">Nama Wanita</label>
					<br>
					<select name="id_jemaat_wanita" id="" class="form-control">
						<option value="" disabled selected>--pilih data--</option>
						<?php
						foreach ($jemaat as $j) {
							if ($j->jk_jemaat == 'P') {
								echo "<option value='$j->id_jemaat'>$j->nik_jemaat / $j->nama_jemaat</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="form-label">Nama Pendeta</label>
					<br>
					<select name="id_pendeta" id="" class="form-control">
						<option value="" disabled selected>Pilih Data</option>
						<?php
						foreach ($pendeta as $p) {
							echo "<option value='$p->id_pendeta'>$p->nik / $p->nama</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="form-label">Saksi Nikah</label>
					<input required type="text" class="form-control" name="saksi_nikah">
				</div>
				<div class="form-group">
					<label class="form-label">Tempat Nikah</label>
					<input required type="text" class="form-control" name="tempat_nikah">
				</div>
				<div class="form-group">
					<label class="form-label">Tanggal Nikah</label>
					<input required type="date" class="form-control" name="tanggal_nikah">
				</div>
		</div>

		<div class="card-footer">
			<button type="submit" id="btn-save-nikah" class="btn btn-success btn-sm">
				<i class="fa fa-save"></i>Simpan
			</button>
			<a href="<?= site_url('nikah') ?>" class="btn btn-primary btn-sm">
				<i class="fa fa-reply"></i>Kembali
			</a>
		</div>
		</form>
	</div>
</body>

</html>
<script>
	$(function() {
		$("#btn-save-nikah").on("click", function() {
			let validate = $("#form-tambah-nikah").valid()
			if (validate) {
				$("#form-tambah-nikah").submit()
			}
		})
		$("#form-tambah-nikah").validates({
			rules: {
				harga_barang: {
					digits: true
				},
				jumlah_barang: {
					digits: true
				}
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			}
		})
	})
</script>
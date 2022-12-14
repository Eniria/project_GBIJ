<html>

<head>
	<title>Form Tambah</title>
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
	<div style="width: 2000px ;" class="card">
		<div class="card-header">
			<h3>Tambah Data Jemaat</h3>
		</div>
		<div class="card-body">
			<form id="form-tambah" method="post" action="<?= site_url('Pindahjemaat/insert') ?>" enctype="multipart/form-data">
				<div class="form-group">
					<label class="form-label">Nama</label>
					<br>
					<select name="id_jemaat" id="" class="form-control">
						<option value="" disabled selected>Pilih Nama</option>
						<?php
						foreach ($jemaat as $j) {
							echo "<option value='$j->id_jemaat'>$j->nik_jemaat / $j->nama_jemaat</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="form-label">Gereja_Asal</label>
					<input require type="text" class="form-control" name="Gereja_Asal">
				</div>
				<div class="form-group">
					<label class="form-label">Gereja_Tujuan</label>
					<input require type="text" class="form-control" name="Gereja_Tujuan">
				</div>
				<div class="form-group">
					<label class="form-label"> Alasan_Pindah </label>
					<input require type="text" class="form-control" name="Alasan_Pindah">
				</div>

		</div>
		<div class="card-footer">
			<button type="submit" id="btn-save-jemaat" class="btn btn-success btn-sm">
				<i class="fa fa-save"></i>Simpan
			</button>
			<a href="<?= site_url('Pindahjemaat') ?>" class="btn btn-primary btn-sm">
				<i class="fa fa-reply"></i> Kembali
			</a>
		</div>
		</form>
	</div>
</body>

</html>

<script>
	$(function() {
		$("#btn-save").on("click", function() {
			let validate = $("#form-tambah").valid()
			if (validate) {
				$("#form-tambah").submit()
			}
		})

	})
</script>
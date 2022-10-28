<!doctype html>
<html>

<head>
	<title>Ubah Data Nikah</title>
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
		<h3>Ubah Data Nikah</h3>
	</div>
	<div class="card-body">
		<form id="form-update-nikah" method="post" action="<?= site_url('nikah/update') ?>" enctype="multipart/form-data">
			<div class="form-group">
				<label class="form_label">Nomor Nikah </label>
				<input require type="text" value="<?= $nikah->no_nikah?>" class="form-control" name="no_nikah">

			</div>

			<div class="form-group">
				<label class="form_label">Nama Pria </label>
				<input require type="text" value="<?= $nikah->nama_pria?>" class="form-control" name="nama_pria">

			</div>

			<div class="form-group">
				<label class="form_label">Nama Wanita </label>
				<input require type="text" value="<?= $nikah->nama_wanita?>" class="form-control" name="nama_wanita">
			</div>

			<div class="form-group">
				<label class="form_label">Nama Pendeta </label>
				<input require type="text" value="<?= $nikah->nama_pendeta?>" class="form-control" name="nama_pendeta">
			</div>

			<div class="form-group">
				<label class="form_label">Saksi Nikah </label>
				<input require type="text" value="<?= $nikah->saksi_nikah?>" class="form-control" name="saksi_nikah">
			</div>

			<div class="form-group">
				<label class="form_label">Tempat Nikah </label>
				<input require type="text" value="<?= $nikah->tempat_nikah?>" class="form-control" name="tempat_nikah">
			</div>

			<div class="form-group">
				<label class="form_label">Tanggal Nikah </label>
				<input require type="date" value="<?= $nikah->tanggal_nikah?>" class="form-control" name="tanggal_nikah">
			</div>
			<input type="hidden" name="id_nikah" value="<?= $nikah->id_nikah ?>">
		</form>
	</div>
	<div class="card-footer">
		<button type="submit" id="btn-update-nikah" class="btn btn-success btn-sm">
			<i class="fa fa-save"></i> Simpan
		</button>
		<a href="<?= site_url('nikah') ?>" class="btn btn-primary btn-sm">
			<i class="fa fa-reply"></i>Kembali
		</a>
	</div>
</div>
</body>

</html>
<script>
	$(function() {
		$("#btn-update-nikah").on("click", function() {
			let validate = $("#form-update-nikah").valid()
			if (validate) {
				$("#form-update-nikah").submit()
			}
		})
		$("#form-update-barang").validates({
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

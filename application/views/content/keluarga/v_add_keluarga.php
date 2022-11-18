<!doctype html>
<html>

<head>
	<title>Tambah Data Keluarga</title>
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
		<h3>Tambah Data Keluarga</h3>
	</div>
	<div class="card-body">
		<form id="form-tambah-keluarga" method="post" action="<?= site_url('keluarga/insert') ?>" enctype="multipart/form-data">
			<div class="form-group">
				<label class="form-label">Nomor Kartu Keluarga</label>
				<input required type="text" class="form-control" name="nomorKK" placeholder="Masukkan Nomor Kartu Keluarga">
			</div>
			<div class="form-group">
				<label class="form-label">Nama Kepala Keluarga</label>
				<input required type="text" class="form-control" name="namaKK" placeholder="Masukkan nama kepala keluarga">
			</div>
	</div>

	<div class="card-footer">
		<button type="submit" id="btn-save-keluarga" class="btn btn-success btn-sm">
			<i class="fa fa-save"></i>Simpan
		</button>
		<a href="<?= site_url('keluarga') ?>" class="btn btn-primary btn-sm">
			<i class="fa fa-reply"></i>Kembali
		</a>
	</div>
	</form>
</div>

</body>

</html>
<script>
	$(function() {
		$("#btn-save-keluarga").on("click", function() {
			let validate = $("#form-tambah-keluarga").valid()
			if (validate) {
				$("#form-tambah-keluarga").submit()
			}
		})
		$("#form-tambah-keluarga").validates({
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

<!doctype html>
<html>

<head>
	<title>Form Tambah Pendeta</title>
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
			<h3>Tambah Data Pendeta</h3>
		</div>
		<div class="card-body">
			<form id="form-tambah-pendeta" method="post" action="<?= site_url('pendeta/insert') ?>" enctype="multipart/form-data">
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label class="form-label">Nomor SK</label>
							<input require type="text" class="form-control" name="no_sk" required="">
						</div>
						<div class="form-group">
							<label class="form-label">NIK</label>
							<input require type="text" class="form-control" name="nik" required="">
						</div>
						<div class="form-group">
							<label class="form-label">Nama</label>
							<input require type="text" class="form-control" name="nama" required="">
						</div>
						<div class="form-group">
							<label class="form-label">Jenis Kelamin</label>
							<select required class="form-control" name="jk">
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label class="form-label">Tempat Lahir</label>
							<input require type="text" class="form-control" name="tempat_lahir" required="">
						</div>
						<div class="form-group">
							<label class="form-label">Tanggal Lahir</label>
							<input require type="date" class="form-control" name="tanggal_lahir" required="">
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label class="form-label">Asal</label>
							<input require type="text" class="form-control" name="asal" required="">
						</div>
						<div class="form-group">
							<label class="form-label">Pendidikan</label>
							<input require type="text" class="form-control" name="pendidikan" required="">
						</div>
						<div class="form-group">
							<label class="form-label">Tanggal Mulai</label>
							<input require type="date" class="form-control" name="tanggal_mulai" required="">
						</div>
						<div class="form-group">
							<label class="form-label">Tanggal Selesai</label>
							<input require type="date" class="form-control" name="tanggal_selesai" required="">
						</div>
						<div class="form-group">
							<label class="form-label">Status</label>
							<input require type="text" class="form-control" name="status" required="">
						</div>
						<div class="form-group">
							<label class="form-label">Foto</label>
							<input require type="file" class="form-control" name="userfile" size="20" required="">
						</div>
					</div>
				</div>
		</div>
		<div class="card-footer">
			<button type="submit" id="btn-save-pendeta" class="btn btn-success btn-sm">
				<i class="fa fa-save"></i>Simpan
			</button>
			<a href="<?= site_url('pendeta') ?>" class="btn btn-primary btn-sm">
				<i class="fa fa-reply"></i>Kembali
			</a>
		</div>
		</form>
	</div>
</body>

</html>
<script>
	$(function() {
		$("#btn-save-pendeta").on("click", function() {
			let validate = $("#form-tambah-pendeta").valid()
			if (validate) {
				$("#form-tambah-pendeta").submit()
			}
		})
		$("#form-tambah-pendeta").validates({
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
<!doctype html>
<html>

<head>
	<title>Form Ubah Pendeta</title>
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
			<h3>Ubah Data Pendeta</h3>
		</div>
		<div class="card-body">
			<form id="form-update-pendeta" method="post" action="<?= site_url('pendeta/update') ?>" enctype="multipart/form-data">
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label class="form_label">Nomor SK </label>
							<input require type="text" value="<?= $pendeta->no_sk ?>" class="form-control" name="no_sk">

						</div>
						<div class="form-group">
							<label class="form_label">NIK </label>
							<input require type="text" value="<?= $pendeta->nik ?>" class="form-control" name="nik">

						</div>

						<div class="form-group">
							<label class="form_label">Nama </label>
							<input require type="text" value="<?= $pendeta->nama ?>" class="form-control" name="nama">

						</div>

						<div class="form-group">
							<label class="form_label">Jenis Kelamin </label>
							<select required class="form-control" name="jk">
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label class="form_label">Tempat Lahir </label>
							<input require type="text" value="<?= $pendeta->tempat_lahir ?>" class="form-control" name="tempat_lahir">
						</div>

						<div class="form-group">
							<label class="form_label">Tanggal Lahir </label>
							<input require type="text" value="<?= $pendeta->tanggal_lahir ?>" class="form-control" name="tanggal_lahir">
						</div>

					</div>
					<div class="col-6">
						
						<div class="form-group">
							<label class="form_label">Asal </label>
							<input require type="text" value="<?= $pendeta->asal ?>" class="form-control" name="asal">
						</div>

						<div class="form-group">
							<label class="form_label">Pendidikan </label>
							<input require type="text" value="<?= $pendeta->pendidikan ?>" class="form-control" name="pendidikan">
						</div>

						<div class="form-group">
							<label class="form_label">Tanggal Mulai </label>
							<input require type="date" value="<?= $pendeta->tanggal_mulai ?>" class="form-control" name="tanggal_mulai">
						</div>

						<div class="form-group">
							<label class="form_label">Tanggal Akhir </label>
							<input require type="date" value="<?= $pendeta->tanggal_selesai ?>" class="form-control" name="tanggal_selesai">
						</div>

						<div class="form-group">
							<label class="form_label">Status </label>
							<input require type="text" value="<?= $pendeta->status ?>" class="form-control" name="status">
						</div>

						<div class="form-group">
							<label class="form_label">Foto </label>
							<input require type="file" class="form-control" name="userfile" size="20" required="">
						</div>
					</div>
				</div>
				<input type="hidden" name="id_pendeta" value="<?= $pendeta->id_pendeta ?>">

		</div>
		<div class="card-footer">
			<button type="button" id="btn-update-pendeta" class="btn btn-success btn-sm">
				<i class="fa fa-save"></i> Simpan
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
		$("#btn-update-pendeta").on("click", function() {
			let validate = $("#form-update-pendeta").valid()
			if (validate) {
				$("#form-update-pendeta").submit()
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
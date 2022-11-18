<!doctype html>
<html>

<head>
	<title>Ubah Data Pengurus Gereja</title>
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
			<h3>Ubah Data Pengurus</h3>
		</div>
		<div class="card-body">
			<form id="form-update-PengurusGereja" method="post" action="<?= site_url('PengurusGereja/update') ?>" enctype="multipart/form-data">
				<!--- ini untuk membagi layar --->
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label class="form_label">NIK</label>
							<input require type="text" value="<?= $PengurusGereja->nik ?>" class="form-control" name="nik">

						</div>

						<!-- <div class="form-group">
							<label class="form_label">Nama</label>
							<input require type="text" value="<?= $PengurusGereja->nama ?>" class="form-control" name="nama">

						</div> -->

						<div class="form-group">
							<label class="form_label">Jenis Kelamin </label>
							<select required class="form-control" name="jenis_kelamin">
								<option value="L">Laki-laki</option>
								<option value="P">Perempuan</option>
							</select>
						</div>

						<div class="form-group">
							<label class="form_label">Tempat Lahir </label>
							<input require type="text" value="<?= $PengurusGereja->tempat_lahir ?>" class="form-control" name="tempat_lahir">
						</div>

						<div class="form-group">
							<label class="form_label">Tanggal Lahir </label>
							<input require type="date" value="<?= $PengurusGereja->tanggal_lahir ?>" class="form-control" name="tanggal_lahir">
						</div>
					</div>
					<div class="col-6">

						<div class="form-group">
							<label class="form-label">Pendidikan</label>
							<select required class="form-control" name="pendidikan">
								<option value="Tidak Sekolah">Tidak Sekolah</option>
								<option value="SD">SD</option>
								<option value="SMP">SMP</option>
								<option value="SMA">SMA</option>
								<option value="D1">D1</option>
								<option value="D2">D2</option>
								<option value="D3">D3</option>
								<option value="D4">D4</option>
								<option value="D5">D5</option>
								<option value="S1">S1</option>
								<option value="S2">S2</option>
								<option value="S3">S3</option>
								<option value="Lainnya">Lainnya</option>
							</select>
						</div>

						<div class="form-group">
							<label class="form_label">Jabatan </label>
							<input require type="text" value="<?= $PengurusGereja->jabatan ?>" class="form-control" name="jabatan">

						</div>
						<div class="form-group">
							<label class="form_label">Alamat</label>
							<input require type="text" value="<?= $PengurusGereja->alamat ?>" class="form-control" name="alamat">

						</div>
						<div class="form-group">
							<label class="form_label">Status</label>
							<select required class="form-control" name="status_pernikahan">
								<option value="Menikah">Sudah Kawin</option>
								<option value="Belum Nikah">Belum Kawin</option>
								<option value="Janda">Janda</option>
								<option value="Duda">Duda</option>
							</select>
						</div>

						<div class="form-group">
							<label class="form_label">Foto </label>
							<input require type="file" class="form-control" name="userfile" size="20" required="">
						</div>
					</div>
				</div>
				<input type="hidden" name="id_pengurusGereja" value="<?= $PengurusGereja->id_pengurusGereja ?>">
		</div>

		<div class="card-footer">
			<button type="submit" id="btn-update-PengurusGereja" class="btn btn-success btn-sm">
				<i class="fa fa-save"></i> Simpan
			</button>
			<a href="<?= site_url('PengurusGereja') ?>" class="btn btn-primary btn-sm">
				<i class="fa fa-reply"></i>Kembali
			</a>
		</div>
		</form>
	</div>
</body>

</html>
<script>
	$(function() {
		$("#btn-update-PengurusGereja").on("click", function() {
			let validate = $("#form-update-PengurusGereja").valid()
			if (validate) {
				$("#form-update-PengurusGereja").submit()
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
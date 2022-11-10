<!doctype html>
<html>

<head>
	<title>Form Tambah Jemaat</title>
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
			<h3 class="card-title">Tambah Data Jemaat</h3>
		</div>
		<div class="card-body">
			<form href="<?= site_url('jemaat/ubah') ?>" id="form-tambah-jemaat" method="post" action="<?= site_url('jemaat/insert') ?>" enctype="multipart/form-data">
				<!--- ini untuk membagi layar --->
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label class="form-label">NIK Jemaat</label>
							<input required type="text" class="form-control" name="nik_jemaat">
						</div>
						<div class="form-group">
							<label class="form-label">Nama Jemaat</label>
							<input required type="text" class="form-control" name="nama_jemaat">
						</div>
						<div class="form-group">
							<label class="form-label">Jenis Kelamin</label>
							<select required class="form-control" name="jk_jemaat">
								<option value="L">Perempuan</option>
								<option value="P">Laki-laki</option>
							</select>
						</div>
						<div class="form-group">
							<label class="form-label">Tempat Lahir</label>
							<input required type="text" class="form-control" name="tempat_lahir">
						</div>
						<div class="form-group">
							<label class="form-label">Tanggal Lahir</label>
							<input required type="date" class="form-control" name="tanggal_lahir">
						</div>
						<div class="form-group">
							<label class="form-label">Tanggal Dibaptis</label>
							<input required type="date" class="form-control" name="tanggal_dibaptis">
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label class="form-label">Tanggal Kematian</label>
							<input  type="date" class="form-control" name="tanggal_kematian">
						</div>
						<div class="form-group">
							<label class="form-label">Alamat</label>
							<input required type="text" class="form-control" name="alamat">
						</div>
						<div class="form-group">
							<label class="form-label">Pekerjaan</label>
							<input required type="text" class="form-control" name="pekerjaan">
						</div>
						<div class="form-group">
							<label class="form-label">Status Aktif</label>
							<select required class="form-control" name="status_aktif">
								<option value="nikah">Nikah</option>
								<option value="pindah">Pindah</option>
								<option value="mati">meninggal</option>
								<option value="berhenti">Berhenti</option>
								<option value="merantau">Merantau</option>
							</select>
						</div>
						<div class="form-group">
							<label class="form-label">Status Perkawinan</label>
							<select required class="form-control" name="status_perkawinan">
								<option value="Kawin">Belum Kawin</option>
								<option value="Singgle">Sudah Kawin</option>
								<option value="Janda">Janda</option>
								<option value="Duda">Duda</option>
							</select>
						</div>
						<div class="form-group">
							<label class="form-label">Foto</label>
							<input require type="file" class="form-control" name="userfile" size="20" required="">
						</div>

					</div>
				</div>
		</div>

		<div class="card-footer">
			<button type="submit" id="btn-save-jemaat" class="btn btn-success btn-sm">
				<i class="fa fa-save"></i>Simpan
			</button>
			<a href="<?= site_url('jemaat') ?>" class="btn btn-primary btn-sm">
				<i class="fa fa-reply"></i>Kembali
			</a>
		</div>
		</form>
	</div>

</body>

</html>
<script>
	$(function() {
		$("#btn-save-jemaat").on("click", function() {
			let validate = $("#form-tambah-jemaat").valid()
			if (validate) {
				$("#form-tambah-jemaat").submit()
			}
		})
		$("#form-tambah-jemaat").validates({
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
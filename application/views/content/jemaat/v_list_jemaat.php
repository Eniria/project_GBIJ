<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Jemaat</title>
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
	<!-- JQuery and Javascript CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
	<script async src="https://docs.opencv.org/master/opencv.js" type="text/javascript"></script>
	<!-- JQuery Validation CDN -->
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.css" />
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.13.1/datatables.min.js"></script>
</head>

<body>
	<div id="content" style="width: 1200px;">
		<nav class="navbar navbar-expand navbar-light topbar mb-3 static-top shadow" style="background-color: #173014;">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button" id="sidebarToggleTop">
						<i class="fa fa-bars"></i>
					</a>
				</li>
			</ul>
			<div>
				<h3 style="color: #9A8D8D;">Data Jemaat</h3>
			</div>
		</nav>

		<div class="card">
			<div class="card-body">
				<a href="<?= site_url('jemaat/tambah') ?>" class="btn btn-primary">
					<i class="fa fa-plus"></i>Tambah Jemaat
				</a>
				<a href="<?= site_url('jemaat/print') ?>" class="btn btn-danger">
					<i class="fa fa-print"></i>Print
				</a>
				<div class="table-responsive text-nowrap">
					<table id="btn-jemaat" class="table table-bordered table-hover table-sm mt-5">
						<thead>
							<tr style="background-color: #6B6D01;">
								<th>No</th>
								<th>NIK </th>
								<th>Nama </th>
								<th>JK</th>
								<th>Tempat Lahir</th>
								<th>Tgl Lahir</th>
								<th>Tgl Dibaptis</th>
								<th>Tgl Kematian</th>
								<th>Alamat</th>
								<th>Pekerjaan</th>
								<th>Status Aktif</th>
								<th>Status</th>
								<th>Foto</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($jemats as $j) {
								$this->db->where('id_jemaat', $j->id_jemaat);
								$cekbaptis = $this->db->get('baptis')->row();
								$ceknikah = $this->db->get('nikah')->row();
								$cekcerai = $this->db->get('cerai')->row();
								$cekpengurusgereja = $this->db->get('PengurusGereja')->row();
								$cekpindahjemaat = $this->db->get('pindah_Jemaat')->row();
								$cekmati = $this->db->get('mati')->row();
							?>
								<tr>

									<td><?= $no++ ?></td>
									<td><?= $j->nik_jemaat  ?></td>
									<td><?= $j->nama_jemaat  ?></td>
									<td><?= $j->jk_jemaat ?></td>
									<td><?= $j->tempat_lahir ?></td>
									<td><?= $j->tanggal_lahir  ?></td>
									<td><?= $j->tanggal_dibaptis  ?></td>
									<td><?= $j->tanggal_kematian  ?></td>
									<td><?= $j->alamat  ?></td>
									<td><?= $j->pekerjaan  ?></td>
									<td><?= $j->status_aktif  ?></td>
									<td><?= $j->status_perkawinan  ?></td>
									<td><img src="<?= base_url() . '/foto/' . $j->foto ?>" width="60px;"></td>
									<td>
										<a href="<?= site_url("jemaat/ubah/$j->id_jemaat") ?>" class="btn btn-warning btn-sm">
											<i class="fa fa-pencil"></i>
										</a>
										<?php if (!$cekbaptis) : ?>
											<?php if (!$ceknikah) : ?>
												<?php if (!$cekcerai) : ?>
													<?php if (!$cekpengurusgereja) : ?>
														<?php if (!$cekpindahjemaat) : ?>
															<?php if (!$cekmati) : ?>

																<a href="#" data-id="<?= $j->id_jemaat ?>" class="btn btn-danger btn-sm btn-delete-jemaat">
																	<i class="fa fa-trash"></i>
																</a>
															<?php endif; ?>
														<?php endif; ?>
													<?php endif; ?>
												<?php endif; ?>
											<?php endif; ?>
										<?php endif; ?>
									</td>
								</tr>
							<?php
							}
							?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="modal" id="modal-confirm-delete">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<h4>Anda Yakin Hapus data ini?</h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btn-delete">Hapus</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
	</div>
	<form id="form-delete" method="post" action="<?= site_url('jemaat/delete') ?>">

	</form>
	</div>
</body>

</html>
<script>
	$(function() {
		let idJemaat = 0
		$(".btn-delete-jemaat").on("click", function() {
			idJemaat = $(this).data("id");
			console.log(idJemaat);
			$("#modal-confirm-delete").modal('show');
		});
		$("#btn-delete").on("click", function() {
			//panggil url untuk hapus data
			let inputId = $("<input>")
				.attr("type", "hidden")
				.attr("name", "id_jemaat")
				.val(idJemaat);
			let formDelete = $("#form-delete");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-confirm-delete").modal('hide');
		});
	})
</script>
<script>
	$(function() {
		$('#btn-jemaat').DataTable();
	});
</script>
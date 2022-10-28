<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Pindah Jemaat</title>
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
</head>

<body>
	<div style="width: 2000px ;" id="content">
		<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: #173014;">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button" id="sidebarToggleTop">
						<i class="fa fa-bars"></i>
					</a>
				</li>
			</ul>
			<div>
				<h3 style="color: #9A8D8D;">Data Pindah Jemaat </h3>
			</div>
		</nav>
		<div class="card-body">
			<a href="<?= site_url('Pindahjemaat/tambah') ?>" class="btn btn-primary">
				<i class="fa fa-plus"></i>Tambah
			</a>
			<a href="<?= site_url('Pindahjemaat/print') ?>" class="btn btn-danger">
				<i class="fa fa-print"></i>Print
			</a>
			<div class="card-body">
				<table class="table">
					<thead>
						<tr style="background-color: #6B6D01;">
							<th>Nomor</th>
							<th>Nama Jemaat</th>
							<th>Gereja Asal</th>
							<th>Gereja Tujuan</th>
							<th>Alasan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($Pindah_Jemaat as $b) {
						?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $b->Nama_Jemaat  ?></td>
								<td><?= $b->Gereja_Asal ?></td>
								<td><?= $b->Gereja_Tujuan ?></td>
								<td><?= $b->Alasan_Pindah ?></td>
								<td>
									<a href="<?= site_url("Pindahjemaat/ubah/$b->Id_Pindah") ?>" class="btn btn-warning btn-sm">
										<i class="fa fa-pencil"></i>
									</a>
									<a href="#" data-id="<?= $b->Id_Pindah ?>" class="btn btn-danger btn-sm btn-delete">
										<i class="fa fa-trash"></i>
									</a>
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
	<div class="modal" id="modal-confirm-delete">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<h4>Anda Yakin Hapus data ini?</h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
					<button type="button" class="btn btn-danger" id="btn-delete">Hapus</button>
				</div>
			</div>
		</div>
	</div>
	<form id="form-delete" method="post" action="<?= site_url('Pindahjemaat/delete') ?>">

	</form>
</body>

</html>
<script>
	$(function() {
		let idPindah = 0
		$(".btn-delete").on("click", function() {
			idPindah = $(this).data("id");
			console.log(idPindah);
			$("#modal-confirm-delete").modal('show');
		});
		$("#btn-delete").on("click", function() {
			//panggil url untuk hapus data
			let inputId = $("<input>")
				.attr("type", "hidden")
				.attr("name", "Id_Pindah")
				.val(idPindah);
			let formDelete = $("#form-delete");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-confirm-delete").modal('hide');
		});
	})
</script>
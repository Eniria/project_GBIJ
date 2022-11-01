<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List Baptis</title>
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
	<div style="width: 2000px ;" class="card">
		<div class="card-header ">
			<h3 class="card-title">Data Baptis</h3>
		</div>
		<div class="card-body">
			<a href="<?= site_url('baptis/tambah') ?>" class="btn btn-primary btn-sm mb-3">
				<i class="fa fa-plus"></i>Tambah Baptis
			</a>
			<table class="table table-bordered table-hover table-sm ">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>No Surat Baptis </th>
						<th>Nama Baptis </th>
						<th>Jenis Kelamin </th>
						<th>Nama Pendeta</th>
						<th>Tempat Baptis</th>
						<th>Tanggal Baptis</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($baptiss as $b) {
					?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $b->no_surat_baptis  ?></td>
							<td><?= $b->nama_baptis  ?></td>
							<td><?= $b->jenis_kelamin  ?></td>
							<td><?= $b->nama_pendeta  ?></td>
							<td><?= $b->tempat_baptis ?></td>
							<td><?= $b->tanggal_baptis  ?></td>
							<td>
								<a href="<?= site_url("baptis/ubah/$b->id_baptis") ?>" class="btn btn-warning btn-sm">
									<i class="fa fa-pencil"></i>
								</a>
								<a href="#" data-id="<?= $b->id_baptis ?>" class="btn btn-danger btn-sm btn-delete-baptis">
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
	<form id="form-delete" method="post" action="<?= site_url('baptis/delete') ?>">

	</form>
</body>

</html>
<script>
	$(function() {
		let idBaptis = 0
		$(".btn-delete-baptis").on("click", function() {
			idBaptis = $(this).data("id");
			console.log(idBaptis);
			$("#modal-confirm-delete").modal('show');
		});
		$("#btn-delete").on("click", function() {
			//panggil url untuk hapus data
			let inputId = $("<input>")
				.attr("type", "hidden")
				.attr("name", "id_baptis")
				.val(idBaptis);
			let formDelete = $("#form-delete");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-confirm-delete").modal('hide');
		});
	})
</script>
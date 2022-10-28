<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Pendeta</title>
</head>

<body>
    <table class="table table-bordered table-hover table-sm">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>No SK</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Asal</th>
                <th>Pendidikan</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($pendeta as $p) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $p->no_sk  ?></td>
                    <td><?= $p->nik  ?></td>
                    <td><?= $p->nama  ?></td>
                    <td><?= $p->jk ?></td>
                    <td><?= $p->tempat_lahir ?></td>
                    <td><?= $p->tanggal_lahir  ?></td>
                    <td><?= $p->asal  ?></td>
                    <td><?= $p->pendidikan  ?></td>
                    <td><?= $p->tanggal_mulai  ?></td>
                    <td><?= $p->tanggal_selesai  ?></td>
                    <td><?= $p->status  ?></td>
                    <td><img src="<?= base_url() . '/foto/' . $p->foto ?>" width="50px;"></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
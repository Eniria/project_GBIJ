<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Jemaat </title>
</head>

<body>
    <table lass="table table-bordered table-hover table-sm">
        <thead>
            <tr>
                <th>No</th>
                <!-- <th>No KK</th> -->
                <th>NIK Jemaat </th>
                <th>Nama Jemaat</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Tanggal Dibaptis</th>
                <!-- <th>Tanggal Kematian</th> -->
                <th>Alamat</th>
                <th>Nama Bapak</th>
                <th>Nama Ibu</th>
                <th>Pekerjaan</th>
                <th>Status Perkawinan</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($jemaat as $j) : ?>
                <tr>

                    <td><?= $no++ ?></td>
                    <!-- <td><?= $j->no_kk  ?></td> -->
                    <td><?= $j->nik_jemaat  ?></td>
                    <td><?= $j->nama_jemaat  ?></td>
                    <td><?= $j->jk_jemaat ?></td>
                    <td><?= $j->tempat_lahir ?></td>
                    <td><?= $j->tanggal_lahir  ?></td>
                    <td><?= $j->tanggal_dibaptis  ?></td>
                    <!-- <td><?= $j->tanggal_kematian  ?></td> -->
                    <td><?= $j->alamat  ?></td>
                    <td><?= $j->nama_bapak  ?></td>
                    <td><?= $j->nama_ibu  ?></td>
                    <td><?= $j->pekerjaan  ?></td>
                    <td><?= $j->status_perkawinan  ?></td>
                    <td><img src="<?= base_url() . '/foto/' . $j->foto ?>" width="100px;"></td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
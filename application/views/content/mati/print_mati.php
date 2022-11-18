<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Kematian</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Kematiaan</th>
                <th>Tanggal Kematiaan</th>
                <th>Alasan Kematian</th>
                <th>Foto/File</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($mati as $m) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $m->nama_jemaat  ?></td>
                    <td><?= $m->jk_mati ?></td>
                    <td><?= $m->tempat_mati  ?></td>
                    <td><?= $m->tanggal_mati  ?></td>
                    <td><?= $m->alasan_mati  ?></td>
                    <td><img src="<?= base_url() . '/foto/' . $m->foto ?>" width="70px;"></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
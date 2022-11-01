<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Peceraian</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Nomor</th>
                <th>No Surat</th>
                <th>Nama Pria</th>
                <th>Nama Wanita</th>
                <th>Tanggal Perceraian</th>
                <th>Alasan Percerian</th>
                <th>Foto/File</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($cerai as $c) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $c->no_surat_cerai  ?></td>
                    <td><?= $c->nama_pria  ?></td>
                    <td><?= $c->nama_wanita  ?></td>
                    <td><?= $c->tanggal_cerai ?></td>
                    <td><?= $c->alasan_cerai ?></td>
                    <td><img src="<?= base_url() . '/foto/' . $c->foto ?>" width="70px;"></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
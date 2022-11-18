<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Pengurus</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIK </th>
                <th>Nama Pengurus</th>
                <th>JK</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Pendidikan</th>
                <th>Jabatan </th>
                <th>Alamat Pengurus</th>
                <th>Status</th>
                <th>Foto</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($PengurusGereja as $PG) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $PG->nik  ?></td>
                    <td><?= $PG->nama_jemaat  ?></td>
                    <td><?= $PG->jenis_kelamin ?></td>
                    <td><?= $PG->tempat_lahir ?></td>
                    <td><?= $PG->tanggal_lahir  ?></td>
                    <td><?= $PG->pendidikan ?></td>
                    <td><?= $PG->jabatan  ?></td>
                    <td><?= $PG->alamat  ?></td>
                    <td><?= $PG->status_pernikahan  ?></td>
                    <td><img src="<?= base_url() . '/foto/' . $PG->foto ?>" width="70px;"></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
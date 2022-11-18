<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Pernikahan</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nomor Nikah </th>
                <th>Nama Pria </th>
                <th>Nama Wanita </th>
                <th>Nama Pendeta</th>
                <th>Saksi Nikah</th>
                <th>Tempat Nikah</th>
                <th>Tanggal Nikah</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($nikah as $n) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $n->no_nikah  ?></td>
                    <td><?= $n->id_jemaat_pria  ?></td>
                    <td><?= $n->id_jemaat_wanita ?></td>
                    <!-- <td><?= $n->$jemaatpria->nama_jemaat  ?></td>
                    <td><?= $n->$jemaatwanita->nama_jemaat ?></td> -->
                    <td><?= $n->nama ?></td>
                    <td><?= $n->saksi_nikah ?></td>
                    <td><?= $n->tempat_nikah  ?></td>
                    <td><?= $n->tanggal_nikah  ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
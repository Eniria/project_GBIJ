<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Baptis</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NO SURAT BAPTIS</th>
                <th>JK</th>
                <th>NAMA PENDETA</th>
                <th>TEMPAT BAPTIS</th>
                <th>TANGGAL BAPTIS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($baptis as $b) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $b->no_surat_baptis  ?></td>
                    <td><?= $b->jenis_kelamin  ?></td>
                    <td><?= $b->nama ?></td>
                    <td><?= $b->tempat_baptis ?></td>
                    <td><?= $b->tanggal_baptis  ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
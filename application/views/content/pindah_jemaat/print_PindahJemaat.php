<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Data Pendeta</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama Jemaat</th>
                <th>Gereja Asal</th>
                <th>Gereja Tujuan</th>
                <th>Alasan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($PindahJemaat as $b) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $b->nama_jemaat  ?></td>
                    <td><?= $b->Gereja_Asal ?></td>
                    <td><?= $b->Gereja_Tujuan ?></td>
                    <td><?= $b->Alasan_Pindah ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
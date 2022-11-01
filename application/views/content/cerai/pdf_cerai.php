<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head><body>
    <table>
    <tr>
                <th>Nomor</th>
                <th>No Surat</th>
                <th>Nama Pria</th>
                <th>Nama Wanita</th>
                <th>Tanggal Perceraian</th>
                <th>Alasan Percerian</th>
                <th>Foto/File</th>
            </tr>
            <?php
            $no = 1;
            foreach ($Cerai as $c) : ?>
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
    </table>
    <script type="text/javascript">
        window.pdf();
    </script>
</body></html>
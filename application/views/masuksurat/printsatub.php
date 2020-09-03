<?php

header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

    <thead>

        <tr>
            <th>No</th>
            <th>No Surat Tanggal Surat</th>
            <th>Asal</th>
            <th>Tanggal Diterima</th>
            <th>Perihal</th>
        </tr>

    </thead>

    <tbody>
        <?php foreach ($bmsurat as $a) : ?>
            <tr>
                <td><?= $a['id']; ?></td>
                <td><?= $a['no']; ?> <?= date('d-m-y', strtotime($a['tglsurat'])); ?></td>
                <td><?= $a['asal']; ?></td>
                <td><?= date('d-m-y', strtotime($a['tglmasuk'])); ?></td>
                <td><?= $a['perihal']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
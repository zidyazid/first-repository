<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3 align="center">Data Kelulusan Siswa</h3>
    <h3 align="center">SMK MANA AJAH PEKANPARBU</h3>
    <p>
        <br>
        <table border="1" align="center">
            <tr>
                <td>Nisn</td>
                <td>Nama</td>
                <td>Keterangan</td>
            </tr>
            <?php foreach ($siswa as $s) { ?>
            <tr>
                <td><?php echo $s['nisn']; ?></td>
                <td><?php echo $s['name']; ?></td>
                <td><?php echo $s['keterangan']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </p>
    <p>
        <h4 align="center">Dari data siswa tersebut didapatkan : </h4>
        <h5 style="padding-right: 13%" align="center">siswa lulus : <?php echo $SiswaKet; ?></h5>
        <h5 style="padding-right: 8.2%" align="center">siswa yang tidak lulus : <?php echo $tidaklulus; ?><br>

        </h5>


    </p>
</body>

</html>
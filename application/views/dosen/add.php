<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <form action="<?= base_url("Dosen_controller/save") ?>" method="post">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="number" name="laporan" placeholder="Nilai Laporan" style="margin-top: 50px;"><br>
            <input type="number" name="video" placeholder="Nilai video" style="margin-top: 10px;"><br>
            <input type="number" name="blog" placeholder="Nilai blog" style="margin-top: 10px;"><br>
            <input type="number" name="aplikasi" placeholder="Nilai aplikasi" style="margin-top: 10px;"><br>
            <input type="submit" value="submit" name="submit" style="margin-top: 10px;">
        </form>
    </center>
</body>

</html>
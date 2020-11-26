<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <div class="container" style="margin-top: 50px;">
        <a href="<?= base_url('Dosen_controller/addNilai/') ?>?id=<?= $id; ?>" class="btn btn-primary" style="margin-bottom: 10px;  float:right;">Tambah Nilai</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Pertemuan</th>
                    <th scope="col">Video</th>
                    <th scope="col">Laporan</th>
                    <th scope="col">Blog</th>
                    <th scope="col">Aplikasi</th>
                    <th scope="col">Persentasi</th>
                    <th scope="col">Nilai Sementara</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($nilai as $mhs) {
                ?>
                    <tr>
                        <th><?= $no++; ?></th>
                        <td><?= $mhs['video'] ?></td>
                        <td><?= $mhs['laporan'] ?></td>
                        <td><?= $mhs['blog'] ?></td>
                        <td><?= $mhs['aplikasi'] ?></td>
                        <td><?php
                            $akumulasi = ($mhs['video'] + $mhs['laporan'] + $mhs['blog'] + $mhs['aplikasi']) / 4;
                            echo $akumulasi . "%";
                            ?></td>
                        <td>
                            <?php
                            if ($akumulasi <= 20) {
                                echo "E";
                            } elseif ($akumulasi <= 40) {
                                echo "D";
                            } elseif ($akumulasi <= 60) {
                                echo "C";
                            } elseif ($akumulasi <= 80) {
                                echo "B";
                            } elseif ($akumulasi <= 100) {
                                echo "A";
                            } else {
                                echo "Tidak Memiliki Nilai";
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <a href="<?= base_url("Dosen_controller"); ?>" class="btn btn-danger"> Kembali </a>
    </div>
</body>

</html>
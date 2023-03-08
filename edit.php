<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div class="container">
<h2>Form Edit Bukutamu</h2>
<?php
    include 'koneksi.php';
    $ambil=mysqli_query($db,"SELECT * FROM tamu WHERE id='$_GET[id_edit]'");
    $data=mysqli_fetch_array($ambil);
?>
<div class="row">
    <div class="col-md-4">
    <form action="" method="post">
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="<?= $data['email'] ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Komentar</label>
        <textarea name="komentar" class="form-control"  rows="3"><?= $data['komentar'] ?></textarea>
</div>
    
    <div class="mb-3">
        <label class="form-label"></label>
        <input type="submit" name="submit" value="update" class="btn btn-primary">
    </div>
    </form>
    <?php
    include 'koneksi.php';

    if (isset($_POST['submit'])){
        $sql=mysqli_query($db,"UPDATE tamu SET
            nama = '$_POST[nama]',
            email = '$_POST[email]',
            komentar = '$_POST[komentar]' WHERE id='$_GET[id_edit]'");
        if ($sql) {
            header('location:list.php');
        }
        else {
            echo "Gagal";
        }
    }
    ?>
    </div>
 </div>
</div>

<script src="js/bootstrap.bundle.js"></script>
</body>
</html>
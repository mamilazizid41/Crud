<!DOCTYPE html>
<html>
<head>
    <title>Form Daftar Anggota</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $email=input($_POST["email"]);
        $no_hp=input($_POST["no_hp"]);

        //Menambahakan Prepare Statement
        $sql="insert into peserta (nama,email,no_hp) values
        (?, ?, ?)";
        $values = array($nama,$email,$no_hp);

        $statement = mysqli_prepare($kon,$sql);
        $hasil = $statement->execute($values);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }

}
?>
<h2>Input Data</h2>


<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <div class="form-grup">
        <label>Nama:</label>
        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />
    </div>
    
    <div class="form-grup">
        <label>email:</label>
        <input type="text" name="email" class="form-control" placeholder="Masukan Email" required />
    </div>
        </p>
    <div class="form-grup">
        <label>No HP:</label>
        <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required />
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </m>
</div>
</body>
</html>
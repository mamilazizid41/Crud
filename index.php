<!DOCTYPE html>
<html>
<head>
    <link rel=" stylesheet" href="http://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<title>
    Mamila Zizid Tuqo</title>
<body>
    <nav class="navbar navbar-dark bg-danger">
            <span class="navbar-brand mb-0 h1"> CRUD</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4 class="text-center">DAFTAR ANGGOTA KELOMPOK</h4>
<?php

    include "koneksi.php";

    //cek apakah ada kiriman form dari method post
    if (isset ($_GET['id_peserta'])) {
        echo "req delete";
        $id_peserta=htmlspecialchars($_GET["id_peserta"]);

        $sql="delete from peserta where id_peserta='$id_peserta' ";
        $hasil=mysqli_query($kon,$sql);

        //kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
    }
?>


        <table class="my-3 table table-bordered">
            <tr class="table-warning">
            <th>NO</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Hp</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from peserta order by id_peserta desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["email"]; ?></td>
                <td><?php echo $data["no_hp"]; ?></td>
                <td>
                    <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_peserta=<?php echo $data['id_peserta']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>

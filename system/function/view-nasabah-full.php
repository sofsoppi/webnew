<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../datatables/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<h2 style="font-size: 30px; color: #262626;">Data Nasabah</h2>
	<br>
    <div class="container">
	<table class="table" >
        <thead>
        <tr align="center">
            <th scope="col">NIN</th>
            <th scope="col">Nama</th>
            <th scope="col">RT</th>
            <th scope="col">Alamat</th>
            <th scope="col">Telepon</th>
            <th scope="col">E-mail</th>
            <th scope="col">Saldo</th>
            <th scope="col">Sampah</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $query = mysqli_query($conn, "SELECT * FROM nasabah ORDER BY nin ASC");
            while($row = mysqli_fetch_assoc($query)){
        ?>
        <tr align="center">
            <td><?php echo $row['nin'] ?></td>
            <td><?php echo $row['nama'] ?></td>
            <td><?php echo $row['rt'] ?></td>
            <td><?php echo $row['alamat'] ?></td>
            <td><?php echo $row['telepon'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td>
              <?php
                        $saldonya = mysqli_query($conn, "SELECT SUM(total) AS totalsaldo FROM setor WHERE nin='".$row['nin']."'");
                        $tariknya = mysqli_query($conn, "SELECT SUM(jumlah_tarik) AS totaltarik FROM tarik WHERE nin='".$row['nin']."'");
                        $var_saldo = mysqli_fetch_array($saldonya);$var_tarik = mysqli_fetch_array($tariknya);
                        $tot_saldo_total=($var_saldo['totalsaldo'])-($var_tarik['totaltarik']);
                       $saldoakhir = mysqli_query($conn, 
                        "update nasabah SET saldo=$tot_saldo_total WHERE nin='".$row['nin']."'");                    
              ?>                    
                <?php echo "Rp. ".number_format($row['saldo'], 2, ",", ".")  ?></td>
            <td>
              <?php 
                    $querysampah = mysqli_query($conn, "SELECT SUM(berat) AS totalberat FROM setor WHERE nin='".$row['nin']."'");
                    $rowsampah = mysqli_fetch_array($querysampah);
                    $sampahnya=$rowsampah['totalberat'];
                    $beratakhir = mysqli_query($conn, 
                    "update nasabah SET sampah=$sampahnya WHERE nin='".$row['nin']."'");
              ?>               
                <?php echo number_format($row['sampah'])." Kg"  ?></td>
            <td>
            <button class="btn btn-primary"> <a href="admin.php?page=edit-nasabah-id&id=<?php echo $row['nin']; ?>" class="text-light">Edit</button>    
            <button class="btn btn-danger"> <a onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="../system/function/delete-nasabah.php?id=<?php echo $row['nin']; ?>" class="text-light">hapus</a></button>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <br>
    <br>
    
    <a href="admin.php?page=tambah-data-nasabah">
    <button class="btn btn-primary" class="text-light" aria-hidden="true"></i>Tambah</button>
    </a>

    <script type="text/javascript" src="../datatables/js/jquery.min.js"></script>
    <script type="text/javascript" src="../datatables/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
           $('#example').DataTable();
        } );
    </script>
     </div>
</body>
</html>
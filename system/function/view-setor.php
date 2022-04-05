<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../datatables/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
		label{
        font-family: Montserrat;    
        font-size: 18px;
        display: block;
        color: #262627;
        }

	</style>
</head>
<body>
	<h2 style="font-size: 30px; color: #262626;">Transaksi Setor Sampah</h2>
	<br>
	<table class="table">
        <thead>
        <tr align="center">
            <th scope="col">ID</th>
            <th scope="col">Tanggal</th>
            <th scope="col">NIN</th>
            <th scope="col">Jenis Sampah</th>
            <th scope="col">Berat</th>
            <th scope="col">Harga</th>
            <th scope="col">Total</th>
            <th scope="col">NIA</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
       
        <tbody>
        <?php
            $query = mysqli_query($conn, "SELECT * FROM setor ORDER BY id_setor ASC");
            while($row = mysqli_fetch_assoc($query)){
        ?>
        <tr align="center">
            <td><?php echo $row['id_setor'] ?></td>
            <td><?php echo $row['tanggal_setor'] ?></td>
            <td><?php echo $row['nin'] ?></td>
            <td><?php echo $row['jenis_sampah'] ?></td>
            <td><?php echo number_format($row['berat'])." Kg"  ?></td>
            <td><?php echo "Rp. ".number_format($row['harga'], 2, ",", ".")  ?></td>
            <td><?php echo "Rp. ".number_format($row['total'], 2, ",", ".")  ?></td>
            <td><?php echo $row['nia'] ?></td>
            <td>
            <button class="btn btn-primary"><a href="admin.php?page=edit-setor&id=<?php echo $row['id_setor']; ?>" class="text-light">edit</a></button> 

            <button class="btn btn-danger"> <a onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="../system/function/delete-setor.php?id=<?php echo $row['id_setor']; ?>" class="text-light">hapus</a></button>

            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <br>
    <br>
    
    <a href="admin.php?page=tambah-data-setor">
    <button class="btn btn-primary" class="text-light" aria-hidden="true"></i>Tambah</button>
    </a>
    
    <script type="text/javascript" src="../datatables/js/jquery.min.js"></script>
    <script type="text/javascript" src="../datatables/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
           $('#example').DataTable();
        } );
    </script>

</body>
</html>
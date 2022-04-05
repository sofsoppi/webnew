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
        color: #262626;
        }

	</style>
</head>
<body>
	<h2 style="font-size: 30px; color: #262626;">Transaksi Tarik Saldo</h2>
	<br>
	<table class="table" >
        <thead>
        <tr align="center">
            <th scope="col">No</th>
            <th scope="col">ID</th>
            <th scope="col">Tanggal</th>
            <th scope="col">NIN</th>
            <th scope="col">Saldo</th>
            <th scope="col">Jumlah Tarik</th>
            <th scope="col">NIA</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>

        <tbody>
        <?php
            $no = 0;
            $query = mysqli_query($conn, "SELECT * FROM tarik ORDER BY id_tarik ASC");
            while($row = mysqli_fetch_assoc($query)){$no++;
        ?>
        <tr align="center">
            <td><?php echo "$no" ?></td>
            <td><?php echo $row['id_tarik'] ?></td>
            <td><?php echo $row['tanggal_tarik'] ?></td>
            <td><?php echo $row['nin'] ?></td>
            <td><?php echo "Rp. ".number_format($row['saldo'], 2, ",", ".")  ?></td>
            <td><?php echo "Rp. ".number_format($row['jumlah_tarik'], 2, ",", ".")  ?></td>
            <td><?php echo $row['nia'] ?></td>
            <td>
            <button class="btn btn-primary"><a href="admin.php?page=edit-tarik&id=<?php echo $row['id_tarik']; ?>" class="text-light">edit</a></button> 

            <button class="btn btn-danger"><a onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="../system/function/delete-tarik.php?id=<?php echo $row['id_tarik']; ?>" class="text-light">hapus</a></button>

            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <br>
    <br>
    
    <a href="admin.php?page=tambah-data-tarik">
    <button class="btn btn-primary" class="text-light" aria-hidden="true">Tambah</button>
    </a>

    <script type="text/javascript" src="../datatables/js/jquery.min.js"></script>
    <script type="text/javascript" src="../datatables/js/jquery.dataTables.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
           $('#example').DataTable();
        } );
    </script>
</body>
</html>
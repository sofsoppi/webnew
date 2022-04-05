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
    <h2 style="font-size: 30px; color: #262626;">Data Sampah</h2>
    <br>
<table class="table">
        <thead>
        <tr align="center">
            <th scope="col">No</th>
            <th scope="col">Jenis Sampah</th>
            <th scope="col">Satuan</th>
            <th scope="col">Harga</th>
            <th scope="col">Gambar</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $no = 0;
            $query = mysqli_query($conn, "SELECT * FROM sampah ORDER BY jenis_sampah ASC");
            while($row = mysqli_fetch_assoc($query)){$no++;
        ?>
        <tr align="center">
            <td><?php echo "$no" ?></td>
            <td><?php echo $row['jenis_sampah'] ?></td>
            <td><?php echo $row['satuan'] ?></td>
            <td><?php echo "Rp. ".number_format($row['harga'], 2, ",", ".")  ?></td>
            <td><img src="../asset/internal/img/uploads/<?php echo $row['gambar'] ?>" width="100px" height="50px"></td>
            <td><?php echo $row['deskripsi'] ?></td>
            <td>
            <button class="btn btn-primary"><a href="admin.php?page=edit-sampah&id=<?php echo $row['jenis_sampah']; ?>" class="text-light">edit</a></button> 

            <button class="btn btn-danger">  <a onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="../system/function/delete-sampah.php?id=<?php echo $row['jenis_sampah']; ?>"class="text-light">hapus</a></button>

            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <br>
    <br>
    
    <a href="admin.php?page=tambah-data-sampah">    
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
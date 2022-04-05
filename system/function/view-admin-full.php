<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../datatables/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h2 style="font-size: 30px; color: #262626;">Data Administrator</h2>
    <br>
<div class="container">
<table class="table">
  <thead>
      <tr align="center">
            <th scope="col">No</th>
            <th scope="col">NIA</th>
            <th scope="col">Nama Admin</th>
            <th scope="col">Nomor Telepon</th>
            <th scope="col">E-mail</th>
            <th scope="col">Level</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
 
        <tbody>
        <?php
            $no = 0;
            $query = mysqli_query($conn, "SELECT * FROM admin ORDER BY nia ASC");
            while($row = mysqli_fetch_assoc($query)){$no++;
        ?>
        <tr align="center">
            <td><?php echo "$no" ?></td>
            <td><?php echo $row['nia'] ?></td>
            <td><?php echo $row['nama'] ?></td>
            <td><?php echo $row['telepon'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['level'] ?></td>
            <td>
            <button class="btn btn-primary"><a href="admin.php?page=edit-admin-id&id=<?php echo $row['nia']; ?>" class="text-light">edit</a></button> 
          

            <button class="btn btn-danger"><a onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="../system/function/delete-admin.php?id=<?php echo $row['nia']; ?>" class="text-light">hapus</a></button>
            
                
            </td>
        </tr> 
        <?php } ?>
        </tbody>
    </table>
    <br>
    <br>
    
    <a href="admin.php?page=tambah-data-admin">
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
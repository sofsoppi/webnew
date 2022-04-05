
<?php
 
  $query = mysqli_query($conn, "SELECT * FROM admin WHERE nia='".$_SESSION['nia']."'");
  $row = mysqli_fetch_array($query);
  

 ?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!--link datatables-->
 
<body>
<h2 style="font-size: 30px; color: #262626;">Data Administrator</h2>

<div class="form-group">
     <form action="" method="post">
     <label class="text-left">Nomor Induk Admin</label>
     <input type="text" " class="form-control" 
     style="cursor: not-allowed;" name="nia" disabled="disabled" value="<?php echo $row['nia'] ?>" />
    </div>
    <div class="form-group">
     <label class="">Nama Admin</label>
     <input type="text" " class="form-control" 
     style="cursor: not-allowed;" name="nama" disabled="disabled" value="<?php echo $row['nama'] ?> "/>
    </div>
    <div class="form-group">
     <label class="">Nomor Telepon</label>
     <input type="text" " class="form-control" 
     style="cursor: not-allowed;" name="telepon" disabled="disabled" value="<?php echo $row['telepon'] ?>" required/>
    </div>
    <div class="form-group">
     <label class="">E-mail</label>
     <input type="text" " class="form-control" 
     style="cursor: not-allowed;" name="username" disabled="disabled" value="<?php echo $row['email'] ?>" required/>
    </div>
    <div class="form-group">
     <label class="">Password</label>
     <input type="password" " class="form-control" 
     style="cursor: not-allowed;" name="password" disabled="disabled" value="<?php echo $row['password'] ?>" required/>
    </div>

    <div class="form-group">
     <label class="">Level Admin</label>
     <input type="text" " class="form-control" 
     style="cursor: not-allowed;" disabled="disabled" name="level" value="<?php echo $row['level'] ?>"/>
    </div>
   
    <input type="button" onclick="window.location='admin.php?page=edit-admin';" value="Edit Data" />
   
   
</body>
</body>
</html>

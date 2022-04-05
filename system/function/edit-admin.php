<?php
  require_once("../system/config/koneksi.php");

 if (isset($_POST['simpan'])) {
  $nama = $_POST['nama'];
  $telepon = $_POST['telepon'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "UPDATE admin SET nama = '$nama', telepon = '$telepon', email = '$username', password = '$password' WHERE nia='".@$_SESSION['nia']."' ";
  $queryact = mysqli_query($conn, $query);
  header("Location: admin.php");
 }

?>

<html>
<head>
	<title>Homepage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
</head>

<body>
	   <h2 style="font-size: 30px; color: #262626;">Edit Data Administrator</h2>
     
     <?php 
        $cek = mysqli_query($conn, "SELECT * FROM admin WHERE nia='".$_SESSION['nia']."'");
        $row = mysqli_fetch_array($cek);
      ?>
	
     <div class="form-group">
          <form method="post">
          <label>Nomor Induk Admin</label>
          <input type="text" style="cursor: not-allowed;" name="nia" disabled="disabled" value="<?php echo @$_SESSION['nia'] ?>" />
         </div>
         <div class="form-group">
          <label class="">Nama Admin</label>
          <input type="text" name="nama" value="<?php echo $row['nama'] ?> "/>
         </div>
         <div class="form-group">
          <label class="">Nomor Telepon</label>
          <input type="text" name="telepon" value="<?php echo $row['telepon'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">E-mail</label>
          <input type="text" name="username" value="<?php echo $row['email'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Password</label>
          <input type="text" name="password" value="<?php echo $row['password'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Level Admin</label>
          <input type="text" style="cursor: not-allowed;" disabled="disabled" name="level" value="<?php echo $row['level'] ?>"/>
         </div>
         
         <input class="button" onclick="alert('Berhasil Mengubah data admin!')" type="submit" name="simpan" value="Simpan Data" />
         

         </form>
      


</body>
</html>

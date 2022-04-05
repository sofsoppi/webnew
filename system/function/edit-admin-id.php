<?php
  require_once("../system/config/koneksi.php");

 if (isset($_POST['simpan'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $telepon = $_POST['telepon'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "UPDATE admin SET nama = '$nama', telepon = '$telepon', email = '$username', password = '$password' WHERE nia='".$id."' ";
  $queryact = mysqli_query($conn, $query);
  echo "<meta http-equiv='refresh'
   content='0; url=http://localhost/bsk09/page/admin.php?page=data-admin-full'>";
 }

?>

<html>
<head>
  <title>Homepage</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!--link datatables-->
</head>

<body>
     <h2 style="font-size: 30px; color: #262626;">Edit Data Administrator</h2>
     <?php if(isset($_GET['id'])){$id=$_GET['id']; ?>
     <?php 
        $cek = mysqli_query($conn, "SELECT * FROM admin WHERE nia='".$_GET['id']."'");
        $row = mysqli_fetch_array($cek);
      ?>
      <div class="container my-5">
      <form method="post">
       <div class="form-group">
          <label>Nomor Induk Admin</label>
          <input type="text" class="form-control" 
          placeholder="enter nomor induk admin" name="nia" autocomplete="off" value="<?php echo $_GET['id']; ?>">
          
         <div class="form-group">
          <label>Nama Admin</label>
          <input type="text" class="form-control"
          placeholder="enter nama" name="nama" autocomplete="off" value="<?php echo $row['nama'] ?> "/>
         </div>
         <div class="form-group">
          <label>Nomor Telepon</label>
          <input type="text" class="form-control" 
          placeholder="enter nomor telepon" name="telepon" autocomplete="off" value="<?php echo $row['telepon'] ?>">
         </div>
         <div class="form-group">
          <label>E-mail</label>
          <input type="text" class="form-control"
          placeholder="enter email" name="username" autocomplete="off" value="<?php echo $row['email'] ?>">
         </div>
         <div class="form-group">
          <label>Password</label>
          <input type="text" class="form-control" 
          placeholder="enter password" name="password" autocomplete="off" value="<?php echo $row['password'] ?>">
         </div>
         <div class="form-group">
          <label>Level Admin</label>
          <input type="text" class="form-control" 
          placeholder="enter level admin" name="level" autocomplete="off" value="<?php echo $row['level'] ?>"/>
         </div>
         <input name="id" type="hidden"  value="<?php echo $_GET['id']; ?>" />
         <input class="button" onclick="alert('Berhasil Mengubah data admin!')" type="submit" name="simpan" value="Simpan Data" />
         

         </form>     
     <?php } else {
        $cek = mysqli_query($conn, "SELECT * FROM admin WHERE nia='".$_SESSION['nia']."'");
        $row = mysqli_fetch_array($cek);
      ?>
  
          <form action="" method="post">
          <label>Nomor Induk Admin</label>
          <input type="text" name="nia" autocomplete="off" value="<?php echo @$_SESSION['nia'] ?>" />
                   <input name="id" type="hidden"  value="<?php echo @$_SESSION['nia'] ?>" />

         <div class="form-group">
          <label>Nama Admin</label>
          <input type="text" class="form-control" 
          placeholder="enter nama" name="nama" autocomplete="off" value="<?php echo $row['nama'] ?>">
         </div>
         <div class="form-group">
          <label>Nomor Telepon</label>
          <input type="text" class="form-control" 
          placeholder="enter nomor telepon" name="telepon" autocomplete="off" value="<?php echo $row['telepon'] ?>">
         </div>
         <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" 
          placeholder="enter username" name="username"autocomplete="off" value="<?php echo $row['username'] ?>">
         </div>
         <div class="form-group">
          <label>Password</label>
          <input type="text" class="form-control" 
          placeholder="enter password" name="password" autocomplete="off" value="<?php echo $row['password'] ?>">
         </div>
         <div class="form-group">
          <label>Level Admin</label>
          <input type="text" class="form-control" 
          placeholder="enter level admin"name="level" autocomplete="off" value="<?php echo $row['level'] ?>"/>
         </div>
         
         <input class="button" onclick="alert('Berhasil Mengubah data admin!')" type="submit" onclick="" name="simpan" value="Simpan Data" />
         

         </form>
     </div>
<?php } ?>

</body>
</html>

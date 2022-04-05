<?php
  require_once("../system/config/koneksi.php");

 if (isset($_POST['simpan'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telepon = $_POST['telepon'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "UPDATE nasabah SET nama = '$nama', alamat = '$alamat', telepon = '$telepon', email = '$username', password = '$password' WHERE nin='".$id."' ";
  $queryact = mysqli_query($conn, $query);
  echo "<meta http-equiv='refresh'
   content='0; url=http://localhost/bsk09/page/admin.php?page=data-nasabah-full'>";
 }

?>

<html>
<head>
  <title>Homepage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     <h2 style="font-size: 30px; color: #262626;">Edit Data Nasabah</h2>
     <?php if(isset($_GET['id'])){$id=$_GET['id']; ?>
     <?php 
        $cek = mysqli_query($conn, "SELECT * FROM nasabah WHERE nin='".$_GET['id']."'");
        $row = mysqli_fetch_array($cek);
      ?>
  
          <form method="post">
          <label>Nomor Induk Nasabah</label>
          <input type="text" class="form-control" 
          placeholder="enter nomor induk nasabah" name="nin" disabled="disabled" value="<?php echo $_GET['id']; ?>" />
         <div class="form-group">
          <label>Nama Nasabah</label>
          <input type="text" class="form-control" 
          placeholder="enter nama" name="nama" value="<?php echo $row['nama'] ?> "/>
         </div>
         <div class="form-group">
          <label>Alamat</label>
          <input type="text" class="form-control" 
          placeholder="enter alamat" name="alamat" value="<?php echo $row['alamat'] ?>" required/>
         </div>
         <div class="form-group">
          <label>Nomor Telepon</label>
          <input type="text" class="form-control" 
          placeholder="enter nomor elepon" name="telepon" value="<?php echo $row['telepon'] ?>" required/>
         </div>
         <div class="form-group">
          <label>E-mail</label>
          <input type="text" class="form-control" 
          placeholder="enter email" name="username" value="<?php echo $row['email'] ?>" required/>
         </div>
         <div class="form-group">
          <label>Password</label>
          <input type="text" class="form-control" 
          placeholder="enter password" name="password" value="<?php echo $row['password'] ?>" required/>
         </div>
         <div class="form-group">
          <label>Saldo (Rp)</label>
          <input type="text" class="form-control" 
           disabled="disabled" name="saldo" value="<?php echo $row['saldo'] ?>"/>
         </div>
         <div class="form-group">
          <label>Sampah (Kg)</label>
          <input type="text"class="form-control" 
          disabled="disabled" name="saldo" value="<?php echo $row['sampah'] ?>"/>
         </div>


         <input name="id" type="hidden"  value="<?php echo $_GET['id']; ?>" />
         <input class="button" onclick="alert('Berhasil Mengubah data nasabah!')" type="submit" name="simpan" value="Simpan Data" />
         

         </form>     
     <?php } else {
        $cek = mysqli_query($conn, "SELECT * FROM nasabah WHERE nin='".$_SESSION['nin']."'");
        $row = mysqli_fetch_array($cek);
      ?>
  
          <form action="" method="post">
          <label>Nomor Induk Admin</label>
          <input type="text" class="form-control" 
          placeholder="enter nomor induk admin" autocomplete="off"  name="nia" disabled="disabled" value="<?php echo @$_SESSION['nin'] ?>" />
          <input name="id" type="hidden"  value="<?php echo @$_SESSION['nin'] ?>" />

         <div class="form-group">
          <label>Nama Nasabah</label>
          <input type="text" class="form-control" 
          placeholder="enter nama" name="nama" value="<?php echo $row['nama'] ?> "/>
         </div>
         <div class="form-group">
          <label>Alamat</label>
          <input type="text" class="form-control" 
          placeholder="enter alamat" name="alamat" value="<?php echo $row['alamat'] ?>" required/>
         </div>
         <div class="form-group">
          <label>Nomor Telepon</label>
          <input type="text" class="form-control" 
          placeholder="enter nomor telepon"name="telepon" value="<?php echo $row['telepon'] ?>" required/>
         </div>
         <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" 
          placeholder="enter username" name="username" value="<?php echo $row['username'] ?>" required/>
         </div>
         <div class="form-group">
          <label>Password</label>
          <input type="text" class="form-control" 
          placeholder="enter password" name="password" value="<?php echo $row['password'] ?>" required/>
         </div>
         <div class="form-group">
          <label>Saldo (Rp)</label>
          <input type="text" class="form-control" 
          disabled="disabled" name="saldo" value="<?php echo $row['saldo'] ?>"/>
         </div>
         <div class="form-group">
          <label>Sampah (Kg)</label>
          <input type="text" class="form-control" 
          disabled="disabled" name="saldo" value="<?php echo $row['sampah'] ?>"/>
         </div>
         
         <input class="button" type="submit" onclick="alert('Berhasil Mengubah data nasabah!')" name="simpan" value="Simpan Data" />
         

         </form>
<?php } ?>

</body>
</html>

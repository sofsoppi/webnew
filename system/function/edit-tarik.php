<?php
  require_once("../system/config/koneksi.php");

 if (isset($_POST['simpan'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telepon = $_POST['telepon'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "UPDATE nasabah SET nama = '$nama', alamat = '$alamat', telepon = '$telepon', username = '$username', password = '$password' WHERE nin='".$id."' ";
  $queryact = mysqli_query($conn, $query);
  echo "<meta http-equiv='refresh'
   content='0; url=http://localhost/bsk09/page/admin.php?page=data-nasabah-full'>";
 }

?>

<html>
<head>

  <script type="text/javascript" src="../asset/plugin/datepicker/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../asset/plugin/datepicker/css/jquery.datepick.css"> 
  <script type="text/javascript" src="../asset/plugin/datepicker/js/jquery.plugin.js"></script> 
  <script type="text/javascript" src="../asset/plugin/datepicker/js/jquery.datepick.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
     <h2 style="font-size: 30px; color: #262626;">Edit Data Penarikan</h2>
     <?php if(isset($_GET['id'])){$id=$_GET['id']; ?>
     <?php 
        $cek = mysqli_query($conn, "SELECT * FROM tarik WHERE id_tarik='".$_GET['id']."'");
        $row = mysqli_fetch_array($cek);
      ?>
        <div class="container my-5">
          <form action="" method="post">

         <div class="form-group">
          <label class="">Tanggal Penarikan</label>
          <input type="text" id="date" class="form-control" 
          placeholder="enter tanggal" name="tanggal_tarik" value="<?php echo $row['tanggal_tarik'] ?> "/>
          <script type="text/javascript">
            $('#date').datepick({dateFormat: 'yyyy-mm-dd'});
          </script>
         </div>
         <div class="form-group">
          <label class="">Nomor Induk Nasabah</label>
          <input type="text" class="form-control" 
          placeholder="enter nomor induk nasabah" name="nin" disabled="disabled" value="<?php echo $row['nin'] ?>" required/>
         </div>
         <div class="form-group">
          <label>Saldo (Rp)</label>
          <input type="text" class="form-control" 
           disabled="disabled" name="saldo" value="<?php echo $row['saldo'] ?>"/>
         </div>
         <div class="form-group">
          <label class="">Jumlah Tarik (Rp)</label>
          <input type="text" class="form-control" 
          disabled="disabled" name="jumlah_tarik" value="<?php echo $row['jumlah_tarik'] ?>"/>
         </div>
         <div class="form-group">
          <label class="">Nomor Induk Admin</label>
          <input type="text" class="form-control"  
          disabled="disabled" name="nia" value="<?php echo $row['nia'] ?>"/>
         </div>


         <input name="id" type="hidden"  value="<?php echo $_GET['id']; ?>" />
         <input class="button" type="submit" name="simpan" value="Simpan Data" />
         

         </form>     
     <?php } else {
        $cek = mysqli_query($conn, "SELECT * FROM nasabah WHERE nin='".$_SESSION['nin']."'");
        $row = mysqli_fetch_array($cek);
      ?>
  
          <form action="" method="post">
          <label class="text-left">Nomor Induk Admin</label>
          <input type="text" name="nia" disabled="disabled" value="<?php echo @$_SESSION['nin'] ?>" />
                   <input name="id" type="hidden"  value="<?php echo @$_SESSION['nin'] ?>" />

         <div class="form-group">
          <label class="">Nama Nasabah</label>
          <input type="text" class="form-control"
          placeholder="enter nama" name="nama" value="<?php echo $row['nama'] ?> "/>
         </div>
         <div class="form-group">
          <label class="">Alamat</label>
          <input type="text" class="form-control"
          placeholder="enter alamat" name="alamat" value="<?php echo $row['alamat'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Nomor Telepon</label>
          <input type="text" class="form-control"
          placeholder="enter nomor telepon" name="telepon" value="<?php echo $row['telepon'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Username</label>
          <input type="text" class="form-control"
          placeholder="enter username" name="username" value="<?php echo $row['username'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Password</label>
          <input type="text" class="form-control"
          placeholder="enter password" name="password" value="<?php echo $row['password'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Saldo (Rp)</label>
          <input type="text" disabled="disabled" name="saldo" value="<?php echo $row['saldo'] ?>"/>
         </div>
         <div class="form-group">
          <label class="">Sampah (Kg)</label>
          <input type="text" disabled="disabled" name="saldo" value="<?php echo $row['sampah'] ?>"/>
         </div>
         
         <input class="button" type="submit" onclick="" name="simpan" value="Simpan Data" />
         

         </form>
         </div>
<?php } ?>

</body>
</html>

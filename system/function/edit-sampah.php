<?php
error_reporting(E_ALL | E_STRICT); 
  require_once("../system/config/koneksi.php");

 if (isset($_POST['simpan'])) {
  $jenis_sampah = $_POST['jenis_sampah'];
   $id = $_POST['id'];
  $satuan = $_POST['satuan'];
  $harga = $_POST['harga'];
  $deskripsi = $_POST['deskripsi'];	 
 if (isset($_FILES["gambar"]["tmp_name"])) {
  $nama_file = $_FILES['gambar']['name'];
  $source = $_FILES['gambar']['tmp_name'];
  $folder = '../asset/internal/img/uploads/';

  move_uploaded_file($source, $folder.$nama_file);
  $query = mysqli_query($conn,"UPDATE sampah SET jenis_sampah='".$jenis_sampah."',satuan='".$satuan."',harga='".$harga."',gambar='".$nama_file."',deskripsi='".$deskripsi."' WHERE id='$id'");	 
 } else {
  $query = mysqli_query($conn,"UPDATE sampah SET jenis_sampah='".$jenis_sampah."',satuan='".$satuan."',harga='".$harga."',deskripsi='".$deskripsi."' WHERE id='$id'");	 
 }  
  if ($query){
    echo "
        <script>
          alert('Berhasil Menambah Data!');
        </script>
        ";

        echo "<meta http-equiv='refresh'
              content='0; url=http://localhost/bsk09/page/admin.php?page=data-sampah'>";
  }else{
    echo "
        <script>
          alert('Gagal Menambah Data!');
        </script>
        ";

        echo "<meta http-equiv='refresh'
              content='0; url=http://localhost/bsk09/page/admin.php?page=data-sampah'>";
  }
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
     <h2 style="font-size: 30px; color: #262626;">Edit Data Sampah</h2>
    
           <div class="container my-5">
          <form action="" method="post" enctype="multipart/form-data">

         <div class="form-group">
          <label>Jenis Sampah</label>
          <input type="text" class="form-control" 
          placeholder="enter jenis_sampah" name="jenis_sampah" autocomplete="off" value="<?php echo $row['jenis_sampah'] ?> "/>
		  <input type="hidden"  name="id" value="<?php echo $row['id'] ?> "/>
         </div>
         <div class="form-group">
          <label>Satuan</label>
          <input type="text" class="form-control"
          placeholder="enter satuan" name="satuan" autocomplete="off" value="<?php echo $row['satuan'] ?>" readonly />
         </div>
         <div class="form-group">
          <label>Harga</label>
          <input type="text" class="form-control" 
          placeholder="enter harga" name="harga" autocomplete="off" value="<?php echo $row['harga'] ?>" required/>
         </div>
         <div class="form-group">
          <label>Gambar</label>
          <input type="file" class="form-control" 
         name="gambar" autocomplete="off" value="<?php echo $row['gambar'] ?>"/>
         </div>
         <div class="form-group">
          <label>Deskripsi</label>
          <input type="text" class="form-control"
          placeholder="enter deskripsi" name="deskripsi" autocomplete="off" value="<?php echo $row['deskripsi'] ?>" required/>
         </div>

         <input name="id" type="hidden"  value="<?php echo $_GET['id']; ?>" />
         <input class="button" type="submit" name="simpan" value="Simpan Data" />
         

         </form>     
     </div>


</body>
</html>

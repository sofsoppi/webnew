
<?php
 if (isset($_POST['simpan'])) {
  require_once("../system/config/koneksi.php");
  $jenis_sampah = $_POST['jenis_sampah'];
  $satuan = $_POST['satuan'];
  $harga = $_POST['harga'];
  $nama_file = $_FILES['gambar']['name'];
  $source = $_FILES['gambar']['tmp_name'];
  $folder = '../asset/internal/img/uploads/';
  $deskripsi = $_POST['deskripsi'];

  move_uploaded_file($source, $folder.$nama_file);

  $query = mysqli_query($conn,"INSERT INTO sampah VALUES ('','$jenis_sampah','$satuan','$harga','$nama_file','$deskripsi')");
  
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
	<title>Homepage</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">

function cek_data() {
   var x=daftar_user.jenis_sampah.value;
   var x1=parseInt(x);
   
   if(x==""){
      alert("Maaf harap input jenis sampah!");
      daftar_user.jenis_sampah.focus(); 
      return false;
   } 
   if(isNaN(x1)==false){
      alert ("Maaf jenis sampah harus di input huruf!");
      daftar_user.jenis_sampah.focus();
      return false;
   }
    var p=daftar_user.satuan.value;
    if (p =="p"){
      alert("Maaf harap input satuan sampah!");
      return (false);
   }
   var x=daftar_user.harga.value;
   var angka = /^[0-9]+$/;
   var panjang=x.length;

   if(x==""){
      alert("Maaf harap input harga!");
      daftar_user.harga.focus();  
      return false;
   }
   if (!x.match(angka)) {
      alert ("Maaf harga harus di input angka!");
      daftar_user.harga.focus();
      return false;
   }
   if(panjang<3 || panjang>5){
      alert("harga di input minimum 3 karakter dan maksimum 5 karakter!");
      daftar_user.harga.focus();
      return false;
   }
   if(daftar_user.gambar.value==""){
      alert("Maaf harap input gambar!");
      daftar_user.gambar.focus();  
      return false;
  }
   var x=daftar_user.deskripsi.value;
   var panjang=x.length;
   
   if(x==""){
      alert("Maaf harap input deskripsi!");
      daftar_user.deskripsi.focus(); 
      return false;
   } 
   if(panjang>50){
      alert ("deskripsi di input maksimum 50 karakter!");
      daftar_user.deskripsi.focus();
      return false;
  }else{
  confirm("Apakah Anda yakin sudah input data dengan benar?");
  }
   return true;
}
</script>

</head>

<body>
<div class="container my-5">
	   <h2 style="font-size: 30px; color: #262626;">Tambah Data Sampah</h2>

	   <form id="daftar_user" action="" method="post" enctype="multipart/form-data" onsubmit="return cek_data()">
         <div class="form-group">
           <label>Jenis Sampah</label>
           <input type="text" class="form-control" 
           placeholder="Masukan jenis sampah" name="jenis_sampah" />
         </div>

         <div class="form-group">
          <label>Satuan</label>
           <select name="satuan">
               <option value="p">---Pilih Satuan---</option>
               <option value="KG">Kilogram</option>
               <option value="PC">Pieces</option>
               <option value="LT">Liter</option>
           </select>
         </div>

         <div class="form-group">
           <label>Harga (Rp)</label>
           <input type="text" class="form-control" 
            placeholder="Masukan harga (Rp)" name="harga" />
         </div>

         <div class="form-group">
           <label>Gambar</label>
           <input type="file" class="form-control" name="gambar"/>
         </div>

         <div class="form-group">
          <label>Deskripsi</label>
          <input type="text" class="form-control" 
          placeholder="Masukan deskripsi sampah" name="deskripsi"/>
         </div>

        <input type="submit" name="simpan" value="Simpan"></input>
    </form>
      
</div>

</body>
</html>

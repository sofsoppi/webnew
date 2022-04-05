<?php
 if (isset($_POST['simpan'])) {
  require_once("../system/config/koneksi.php");
  $tanggal_setor = $_POST['tanggal_setor'];
  $nin = $_POST['nin'];
  $jenis_sampah = $_POST['jenis_sampah'];
  $berat = $_POST['berat'];
  $harga = $_POST['harga'];
  $total = $_POST['total'];
  $nia = $_POST['nia'];
  $query = "INSERT INTO setor(id_setor,tanggal_setor,nin,jenis_sampah,berat,harga,total,nia) VALUE ('NULL','$tanggal_setor','$nin','$jenis_sampah','$berat','$harga','$total','$nia')";
  $queryact = mysqli_query($conn, $query);

  echo "<script>alert('Selamat berhasil input data!')</script>";

  echo "<meta http-equiv='refresh'
   content='0; url=http://localhost/bsk09/page/admin.php?page=data-setor'>";

 }
 ?>


<html>
<head>
  <title>Homepage</title>
	<script type="text/javascript" src="../asset/plugin/datepicker/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../asset/plugin/datepicker/css/jquery.datepick.css"> 
	<script type="text/javascript" src="../asset/plugin/datepicker/js/jquery.plugin.js"></script> 
	<script type="text/javascript" src="../asset/plugin/datepicker/js/jquery.datepick.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">

function cek_data() {
   var x=daftar_user.tanggal_setor.value;
   
   if(x==""){
      alert("Maaf harap input tanggal setor!");
      daftar_user.tanggal_setor.focus(); 
      return false;
   }
    var pnin=daftar_user.nin.value;
    if (pnin =="pnin"){
      alert("Maaf harap input nomor induk nasabah!");
      return (false);
   }
   var pjs=daftar_user.jenis_sampah.value;
    if (pjs =="pjs"){
      alert("Maaf harap input jenis sampah!");
      return (false);
   }
   var x=daftar_user.berat.value;
   var angka = /^[0-9]+$/;

   if(x==""){
      alert("Maaf harap input berat sampah!");
      daftar_user.berat.focus(); 
      return false;
   }
   if (!x.match(angka)) {
      alert ("Berat sampah harus di input angka!");
      daftar_user.berat.focus();
      return false;
   }
   var x=daftar_user.harga.value;

   if(x==""){
      alert("Maaf harga sampah masih kosong!");
      daftar_user.harga.focus(); 
      return false;
   }
   var x=daftar_user.total.value;

   if(x==""){
      alert("Maaf total transaksi penyetoran masih kosong!");
      daftar_user.total.focus(); 
      return false;
   }else{
  confirm("Apakah Anda yakin sudah input data dengan benar?");
  }
   return true;
}
</script>
	<script>
	$(document).ready(function(){ // Ketika halaman sudah diload dan siap
	
	});
	</script>  
    
</head>

<body>
<div class="container my-5">
		<h2 style="font-size: 30px; color: #262626;">Setor Sampah</h2>
     <form id="daftar_user" name='autoSumForm' action="" method="post" onsubmit="return cek_data()">
         <br>
         <div class="form-group">
          <label class="text-left">Tanggal Penyetoran</label>
          <input type="text" class="form-control" 
          placeholder="Masukan tanggal setor" id="date"  name="tanggal_setor" />
			<script type="text/javascript">  $('#date').datepick({dateFormat: 'yyyy-mm-dd'});</script>	
         </div>

         <div class="form-group">
          <label class="">Nomor Induk Nasabah</label>
          <select class="nomornasabah" name="nin" >

          <option value="pnin">---Pilih NIN---</option>
          
          <?php 
            $query = mysqli_query($conn, "SELECT * FROM nasabah");
            while ($row = mysqli_fetch_array($query)) {
              echo '<option value="' . $row['nin'] . '">' . $row['nin'] . '</option>';
            }
          ?>

          </select>
         </div>

         <div class="form-group">
          <label class="">Jenis Sampah</label>
          <select class="jensampah" name="jenis_sampah" id="jenis_sampah" onchange="changeValue(this.value)" >
          <option value="pjs">---Pilih Jenis Sampah---</option>
          <?php 
            $query = mysqli_query($conn, "SELECT * FROM sampah");
            $jsArray = "var dtsampah = new Array();\n";
            while ($row = mysqli_fetch_array($query)) {
              echo '<option value="' . $row['jenis_sampah'] . '">' . $row['jenis_sampah'] . '</option>';    
              $jsArray .= "dtsampah['" . $row['jenis_sampah'] . "'] = {harga:'" . addslashes($row['harga']) . "'};\n";
            }
          ?>
          </select>
         </div>

         <div class="form-group">
          <label class="">Berat Sampah</label>
          <input type="text" class="form-control" 
          placeholder="Masukan berat sampah" id="berat" name="berat" onkeyup="sum();" />
         </div>

         <div class="form-group">
          <label class="">Harga Sampah (Rp)</label>
          <input type="text" class="form-control" 
          placeholder="Otomatis terisi" style="cursor: not-allowed;" id="harga" name="harga" value="<?php echo $row['harga'] ?>" onkeyup="sum();" readonly />
         </div>

         <div class="form-group">
          <label class="">Total (Rp)</label>
          <input type="text" class="form-control" 
          placeholder="Otomatis terisi" style="cursor: not-allowed;" id="total"  name="total" readonly />
         </div>
         <div class="form-group">
          <label class="">Nomor Induk Admin</label>
          <input type="text" class="form-control" 
          style="cursor: not-allowed;" name="nia" value="<?php echo $_SESSION["nia"]; ?>" readonly />
         </div>
         
         <input type="submit" name="simpan" value="Simpan" />

		<div id="insert-form"></div>
		
		<hr>
	</form>
	
	<!-- Kita buat textbox untuk menampung jumlah data form -->
	<input type="hidden" id="jumlah-form" value="1">
	
        <script type="text/javascript">    
          <?php echo $jsArray; ?>  
          function changeValue(jenis_sampah){
          console.log(dtsampah);  
          document.getElementById('harga').value = dtsampah[jenis_sampah]['harga'];
          sum();  
          };

          function sum() {
          var txtFirstNumberValue = document.getElementById('berat').value;
          var txtSecondNumberValue = document.getElementById('harga').value;
          var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
          if (!isNaN(result)) {
             document.getElementById('total').value = result;
          }
          }  

           </script>
           <script src="js/jquery.min.js"></script>
           <script src="js/custom.js"></script>      

          <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
          <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
         
          <script>
            $(document).ready(function() {
                $('.nomoradmin').select2();
              $('.nomornasabah').select2();
              $('.jensampah').select2();
            });
          </script>
	
</body>
          </div>
</html>

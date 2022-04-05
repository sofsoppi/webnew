
<html>
<head>
	<title>Homepage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	   <h2 style="font-size: 30px; color: #262626;">Data Nasabah</h2>
     <div class="container">
	   <div class="form-group">
            <label class="text-left">Nomor Induk Nasabah</label>
            <input type="text" class="form-control" style="cursor: not-allowed;" disabled="disabled" value="<?php echo @$_SESSION['nin']; ?>" />
         </div>
         <div class="form-group">
          <label class="">Nama Nasabah</label>
          <input type="text" class="form-control" 
          style="cursor: not-allowed;" disabled="disabled" value="<?php echo @$_SESSION['nama_n']; ?>"/>
         </div>
         <div class="form-group">
          <label class="">Alamat</label>
          <input type="text" class="form-control" 
          style="cursor: not-allowed;" disabled="disabled" value="<?php echo @$_SESSION['alamat']; ?>"/>
         </div>
         <div class="form-group">
          <label class="">Nomor Telepon</label>
          <input type="text" class="form-control" 
          style="cursor: not-allowed;" disabled="disabled" value="<?php echo @$_SESSION['telepon_n']; ?>"/>
         </div>
         <div class="form-group">
          <label class="">E-mail</label>
          <input type="text" class="form-control" 
          style="cursor: not-allowed;" disabled="disabled" value="<?php echo @$_SESSION['email_n']; ?>"/>
         </div>
         <div class="form-group">
          <label class="">Password</label>
          <input type="password" class="form-control" 
          style="cursor: not-allowed;" disabled="disabled" value="<?php echo @$_SESSION['pass_n']; ?>"/>
         </div>
         <div class="form-group">
          <label class="">Saldo Total (Rp)</label>
          <?php
          			$saldonya = mysqli_query($conn, "SELECT SUM(total) AS totalsaldo FROM setor WHERE nin='".$_SESSION['nin']."'");

          			$tariknya = mysqli_query($conn, "SELECT SUM(jumlah_tarik) AS totaltarik FROM tarik WHERE nin='".$_SESSION['nin']."'");

          			$var_saldo = mysqli_fetch_array($saldonya);$var_tarik = mysqli_fetch_array($tariknya);
          			$tot_saldo_total=($var_saldo['totalsaldo'])-($var_tarik['totaltarik']);
          ?>		  
          <input type="text" class="form-control" 
          style="cursor: not-allowed;" disabled="disabled" value="<?php echo $tot_saldo_total; ?>"/>

         </div>
         <div class="form-group">
          <label class="">Berat Sampah (Kg)</label>
          
          <input type="text" class="form-control" 
          style="cursor: not-allowed;" disabled="disabled" value="<?php 
            $query = mysqli_query($conn, "SELECT SUM(berat) AS totalberat FROM setor WHERE nin='".$_SESSION['nin']."'");
            while($row = mysqli_fetch_array($query)){
			echo $row['totalberat']; }?>"/>
         </div>
        
         <input type="button" onclick="window.location='nasabah.php?page=edit-nasabah';" value="Edit Data" />
          </div>
</body>
</html>

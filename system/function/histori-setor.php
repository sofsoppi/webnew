

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../datatables/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2 style="font-size: 30px; color: #262626;">Histori Setor Nasabah</h2>
    <br>
<table class="table">
        <thead>
        <tr align="center">
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Jenis Sampah</th>
            <th scope="col">Berat</th>
            <th scope="col">Harga</th>
            <th scope="col">Total</th>
            <th scope="col">NIA</th>
        </tr>
        </thead>
        <tfoot>

        <tbody>
        <?php
            $no = 0; 
            $query = mysqli_query($conn, "SELECT * FROM setor WHERE nin='".$_SESSION['nin']."' ORDER BY id_setor DESC");
            while($row = mysqli_fetch_array($query)){$no++;
        ?>
        <tr align="center">
            <td><?php echo "$no" ?></td>
            <td><?php echo $row['tanggal_setor'] ?></td>
            <td><?php echo $row['jenis_sampah'] ?></td>
            <td><?php echo number_format($row['berat'])." Kg"  ?></td>
            <td><?php echo "Rp. ".number_format($row['harga'], 2, ",", ".")  ?></td>
            <td><?php echo "Rp. ".number_format($row['total'], 2, ",", ".")  ?></td>
            <td><?php echo $row['nia'] ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <br>
    <br>

    <script type="text/javascript" src="../datatables/js/jquery.min.js"></script>
    <script type="text/javascript" src="../datatables/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
           $('#example').DataTable();
        } );
    </script>
    </body>
</html>
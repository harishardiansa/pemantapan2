<h1 class="mt-4">Laporan Peminjaman</h1>
<div class="card">
<div class="card-body">   
<div class="row">
    <div class="col-md-12">
    <a href="cetak.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i>Cetak Data</a>
    <form method="post">
        <table align="center">
            <tr>
                    <input type="date" name="dari_tgl" required>
                    <td></td>
                    <td></td>
                    <input type="date" name="sampai_tgl" required>
                    <input type="submit" class="btn btn-dark" name="submit" value="Cari">
    </tr>
    </table>
    </form>
    <?php
    if(isset($_POST['submit'])){
       $dari_tgl =mysqli_real_escape_string($koneksi, $_POST['dari_tgl']);
       $sampai_tgl =mysqli_real_escape_string($koneksi, $_POST['sampai_tgl']);
       
       echo "Dari Tanggal".$dari_tgl."Sampai Tanggal".$sampai_tgl;
    }
    ?>
    <table border="1" cellspacing="0" cellpadding="5" width="100%">
        <thead class="thead-light">
        <tr>
            <th>No</th>
            <th>User</th>
            <th>ID Buku</th>
            <th>Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Status Peminjaman</th>
        </tr>
        </thead>
        <?php
        $i = 1;

        if (isset($_POST['submit'])){
            $dari_tgl = mysqli_real_escape_string($koneksi, $_POST['dari_tgl']);
            $sampai_tgl = mysqli_real_escape_string($koneksi, $_POST['sampai_tgl']);
             $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on buku.id_buku = peminjaman.id_buku WHERE tanggal_peminjaman BETWEEN '$dari_tgl' AND '$sampai_tgl'");   
        }else{
             $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on buku.id_buku = peminjaman.id_buku");
        }
        while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['id_buku']; ?></td>
                <td><?php echo $data['judul']; ?></td>
                <td><?php echo $data['tanggal_peminjaman']; ?></td>
                <td><?php echo $data['tanggal_pengembalian']; ?></td>
                <td><?php echo $data['status_peminjaman']; ?></td>

         <?php
        }
        ?>
        </tr>
        
    </table>
    </center>
</div>
</div>
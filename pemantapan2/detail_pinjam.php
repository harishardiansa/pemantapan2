<h1 class="mt-4">Detail Peminjaman</h1>
<div class="card">
<div class="card-body">   
<div class="row">
    <div class="col-md-12">
      
        <table border="1" cellspacing="0" cellpadding="5" width="100%">
        <tr>
            <th>No</th>
            <th>User</th>
            <th>ID Buku</th>
            <th>Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Status Peminjaman</th>
            <th>Aksi</th>
        </tr>
        <?php
        $i = 1;
        $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on buku.id_buku = peminjaman.id_buku");
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
                <td>
                <?php
         if($_SESSION['user']['level'] !='peminjam'){
                ?>
            <?php
                if($data['status_peminjaman'] != 'dikembalikan'){
            ?>
        <a href="?page=peminjaman_ubah&&id=<?php echo $data['id_peminjaman'];?>" class="btn btn-info">Ubah</a>
        <a onclick="return confirm('Apakah anda yakin ingin mengahapus buku ini?');" href="?page=peminjaman_hapus&&id=<?php echo $data['id_peminjaman'];?>" class="btn btn-danger">Hapus</a>
        <?php
         }
        ?>
         <?php
        }
        ?>
        </td>
        <?php
        }
        ?>
        </tr>
        
    </table>
</div>
</div>
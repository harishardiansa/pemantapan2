<h1 class="mt-4">Peminjaman</h1>
<div class="card">
<div class="card-body">   
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th>No</th>
            <th>User</th>
            <th>ID Buku</th>
            <th>Buku</th>
            <th>Foto</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Jumlah Minjam</th>
            <th>Status Peminjaman</th>
            
        </tr>
        <?php
        $i = 1;
        $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on buku.id_buku = peminjaman.id_buku WHERE peminjaman.id_user=" . $_SESSION['user']['id_user']);
        while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['id_buku']; ?></td>
                <td><?php echo $data['judul']; ?></td>
                <td><img width="100px" src="assets/img/<?php echo $data['foto'];?>"></td>
                <td><?php echo $data['tanggal_peminjaman']; ?></td>
                <td><?php echo $data['tanggal_pengembalian']; ?></td>
                <td><?php echo $data['jumlah']; ?></td>
                <td><?php echo $data['status_peminjaman']; ?></td>

        </tr>
        <?php
        }
        ?>
    </table>
</div>
</div>
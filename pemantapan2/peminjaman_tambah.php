<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
        <form method="post">
            <?php
            if(isset($_POST['submit'])) {
                $id_buku = $_POST['id_buku'];
                $id_user = $_SESSION['user']['id_user'];
                $tanggal_peminjaman = date('y-m-d');
                $tanggal_pengembalian = date('y-m-d', strtotime($tanggal_peminjaman.'+7 days'));
                $jumlah = $_POST['jumlah'];
                $status_peminjaman = $_POST['status_peminjaman'];
                $query = mysqli_query($koneksi, "INSERT INTO peminjaman(id_buku,id_user,tanggal_peminjaman,tanggal_pengembalian,jumlah,status_peminjaman) values('$id_buku','$id_user','$tanggal_peminjaman','$tanggal_pengembalian','$jumlah','$status_peminjaman')");

                if($query) {
                    echo '<script>alert("Minjam buku berhasil.");location.href="?page=peminjaman";</script>';
                }else{
                    echo '<script>alert("Minjam buku gagal.");</script>';
                }
            }
            ?>
            <div class="row mb-3">
            <div class="col-md-2">Buku</div>
                <div class="col-md-8">
                        <?php
                        $id = $_GET['id'];
                            $buk = mysqli_query($koneksi,"SELECT*FROM buku WHERE id_buku='$id'");
                            while($buku = mysqli_fetch_array($buk)){
                                ?>
                              <input type="hidden" class="form-control" name="id_buku" value="<?php echo $buku['id_buku']?>">
                              <input type="text" class="form-control" name="id_buku" value="<?php echo $buku['judul']?>"disabled>
                                <?php    
                            }
                        ?>
                        </div>
                        </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Jumlah</div>
                <div class="col-md-8"><input type="number" class="form-control" name="jumlah" max="2" min="1"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Status Peminjaman</div>
                <div class="col-md-8">
                    <select name="status_peminjaman" class="form-control">
          <option value="dipinjam">Dipinjam</option>
            </select>
            </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
            <button type="submit" class="btn  btn-primary" name="submit" value="submit">Simpan</button>
            <button type="reset" class="btn  btn-secondary">Reset</button>
            <a href="?page=daftar_buku" class= "btn btn-danger">Kembali</a>
</form>           
</div>
</div>
</div>
<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
        <form method="post">
            <?php
            $id = $_GET['id'];
            if(isset($_POST['submit'])) {
                $id_buku = $_POST['id_buku'];
                $id_user = $_SESSION['user']['id_user'];
                $tanggal_peminjaman = date('y-m-d');
                $tanggal_pengembalian = date('y-m-d', strtotime($tanggal_peminjaman.'+7 days'));
                $status_peminjaman = $_POST['status_peminjaman'];
                $query = mysqli_query($koneksi, "UPDATE peminjaman set id_buku='$id_buku', tanggal_peminjaman='$tanggal_peminjaman', tanggal_pengembalian='$tanggal_pengembalian', status_peminjaman='$status_peminjaman' WHERE id_peminjaman=$id");

                if($query) {
                    echo '<script>alert("Ubah data berhasil.");location.href="?page=laporan";</script>';
                }else{
                    echo '<script>alert("Ubah data gagal.");</script>';
                }
            }
            $query = mysqli_query($koneksi, "SELECT*FROM peminjaman WHERE id_peminjaman=$id");
            $data = mysqli_fetch_array($query);

            ?>
            <div class="row mb-3">
            <div class="col-md-2">Buku</div>
                <div class="col-md-8">
                    <select name="id_buku" class="form-control">
                        <?php
                            $buk = mysqli_query($koneksi,"SELECT*FROM buku");
                            while($buku = mysqli_fetch_array($buk)){
                                ?>
                                <option <?php if($buku['id_buku'] == $data['id_buku']) echo 'selected'; ?> value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul'];?></option>
                                <?php    
                            }
                        ?>
                        </select>
                        </div>
                        </div>
            <div class="row mb-3">
                <div class="col-md-2">Jumlah Pinjam</div>
                <div class="col-md-8">
                <input type="number" class="form-control" value="<?php echo $data['jumlah']; ?>" name="jumlah">
            </div>
            </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Status Peminjaman</div>
                <div class="col-md-8">
                    <select name="status_peminjaman" class="form-control">
          <option value="dikembalikan"><?php if($data['status_peminjaman'] == 'dikembalikan') echo 'selected';?>Dikembalikan</option>
            </select>
            </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
            <button type="submit" class="btn  btn-primary" name="submit" value="submit">Simpan</button>
            <button type="reset" class="btn  btn-secondary">Reset</button>
            <a href="?page=laporan" class= "btn btn-danger">Kembali</a>
</form>           
</div>
</div>
</div>
<h1 class="mt-4">Tambah User</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
        <form method="post">
            <?php
            if(isset($_POST['submit'])) {
                $nama = $_POST['nama'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $alamat = $_POST['alamat'];
                $no_telp = $_POST['no_telp'];
                $level= $_POST['level'];
                $query = mysqli_query($koneksi, "INSERT INTO user(nama,username,email,alamat,no_telp,level) values ('$nama','$username','$email','$alamat','$no_telp','$level')");

                if($query) {
                    echo '<script>alert("Tambah anggota berhasil.");location.href="?page=user";</script>';
                }else{
                    echo '<script>alert("Tambah buku gagal.");</script>';
                }
            }
            ?>
<form method="post">
    <div class="form-group">
    <label for="inputEmail">Nama Lengkap</label>
    <input class="form-control py-4" type="text" required name="nama" placeholder="Masukkan Nama Lengkap" />
    </div>
    <div class="form-group">
    <label for="inputEmail">Email</label>
    <input class="form-control py-4" type="text" required name="email" placeholder="Masukkan Email" />
    </div>
    <div class="form-group">
    <label for="inputEmail">No Telepon</label>
    <input class="form-control py-4" type="text" required name="no_telp" placeholder="Masukkan No Telepon" />
    </div>
    <div class="form-group">
    <label for="inputEmail">Alamat</label>
    <textarea name="alamat" rows="5" required class="form-control"></textarea>
    </div>
    <div class="form-group">
    <label for="inputEmail">Username</label>
    <input class="form-control py-4" type="username" required name="username" placeholder="Masukkan Username" />                                             
    </div>
    <div class="form-group">
    <label for="inputPassword">Password</label>
    <input class="form-control py-4" id="inputPassword" type="password" required name="password" placeholder="Masukkan Password" />
    </div>
    <div class="form-group">
    <label for="inputPassword">level</label>
    <select name="level" required class="form-control">
    <option value="peminjam">Peminjam</option>
    <option value="admin">Admin</option>
    <option value="admin">Petugas</option>
    </select>
     </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
            <button type="submit" class="btn  btn-primary" name="submit" value="submit">Simpan</button>
            <button type="reset" class="btn  btn-secondary">Reset</button>
            <a href="?page=user" class= "btn btn-danger">Kembali</a>
</form>           
</div>
</div>
</div>
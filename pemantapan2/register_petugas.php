<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            body{
                background-image: url('assets/img/buku2.JPG');
                background-size: cover;
            }
        </style>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register Petugas</h3></div>
                                    <div class="card-body">
                                    <?php
                                            if(isset($_POST['register'])){
                                                $nama = $_POST['nama'];
                                                $email = $_POST['email'];
                                                $alamat = $_POST['alamat'];
                                                $no_telp = $_POST['no_telp'];
                                                $username = $_POST['username'];
                                                $level = $_POST['level'];
                                                $password = md5($_POST['password']);

                                                $insert = mysqli_query($koneksi, "INSERT INTO user(nama,email,alamat,no_telp,username,password,level) Values ('$nama','$email','$alamat','$no_telp','$username','$password','$level')");

                                                if($insert){
                                                    echo '<script>alert("Selamat, Register telah berhasil. Silahkan login"); location.href="login.php"</script>';
                                                }else{

                                                    echo '<script>alert("Register gagal, Silahkan coba kembali");</script>';
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
                                                    <option value="petugas">Petugas</option>
                            
                                                 </select>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">                           
                                                <button class="btn btn-primary" type="submit" name="register">Register</button>
                                                <a class="btn btn-danger" href="index.php">kembali</a>
                                               
                                                
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">
                                            &copy; 2024 Perpustakaan Digital
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

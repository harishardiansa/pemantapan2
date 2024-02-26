<?php
    include  "koneksi.php";
?>
<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login ke perpustakaan digital</title>
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            body{
                background-image: url('assets/img/buku.JPG');
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login Perpustakaan Digital</h3></div>
                                    <div class="card-body">
                                    <center><img src="assets/img/logo2.PNG" id="preview" width="75%" height="80%"></center>
                                        
                                    <?php
                                            if(isset($_POST['login'])){
                                                $username = $_POST['username'];
                                                $password = md5($_POST['password']);

                                                $data = mysqli_query($koneksi, "SELECT*FROM user WHERE username = '$username' AND password = '$password'");
                                                $cek = mysqli_num_rows($data);
                                                if($cek > 0){
                                                    $_SESSION['user'] = mysqli_fetch_array($data);

                                                    echo '<script>alert("Selamat Datang, Anda Berhasil Login"); location.href="index.php";</script>';
                                                }else{

                                                    echo '<script>alert("Maaf, Username/Password Yang Anda Masukkan Salah")</script>';
                                                }
                                            }
                                        ?>
                                         <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" >Username</label>
                                                <input class="form-control py-4"  name="username" type="text" placeholder="Masukan Username" autofocus required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" >Password</label>
                                                <input class="form-control py-4" name="password" type="password" placeholder="Masukan Password" autofocus required />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="login">Login</button>
                                                <a class="btn btn-warning" type="submit" href="register.php">Register</a> 
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

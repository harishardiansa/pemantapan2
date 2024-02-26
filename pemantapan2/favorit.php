<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Daftar Buku Yang di Favoritkan</h1>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <form method="post">
            <?php
            if(isset($_GET['id'])){
              $id = $_GET['id'];
                $query = mysqli_query($koneksi, "SELECT * FROM buku  WHERE id_buku='$id'");
                $data = mysqli_fetch_array($query);

                $id = $_SESSION['user']['id_user'];
                $buku = $data['id_buku'];
                $check_query = "SELECT COUNT(*) AS total FROM koleksi_pribadi WHERE id_user = $id AND id_buku = $buku";
                $check_result = mysqli_query($koneksi, $check_query);
                $check_data = mysqli_fetch_assoc($check_result);

                if($check_data['total']> 0){

                  echo"<script>
                        alert('Buku sudah ada dalam koleksi favorit anda');
                        location.href='index.php?page=favorit';
                        </script>";
                }else{

                  $query = "INSERT INTO koleksi_pribadi (id_user, id_buku)  VALUES ($id, $buku)";
                  mysqli_query($koneksi, $query);

                  echo "<script>
                  alert('Buku sudah ada dalam koleksi favorit anda');
                  location.href='index.php?page=favorit';
                  </script>";

                }
              }
                
            
            ?>
          <div class="row m-4"> 
        <?php
        $query = mysqli_query($koneksi, "SELECT*FROM koleksi_pribadi JOIN buku on buku.id_buku = koleksi_pribadi.id_buku JOIN user on user.id_user= koleksi_pribadi.id_user");
        while($data = mysqli_fetch_array($query)){
            ?>
            <div class="card m-4" style="width: 15rem;">
            <img src="assets/img/<?php echo $data['foto'];?>" class="cart-img-top">
            <div class="card-body">
                <h5 class="cart-title"><?php echo $data['judul'];?></h5>
                <?php
                if($_SESSION['user']['level'] =='peminjam'){
                    ?>
                    <a class="btn btn-outline-success" href="?page=daftar_buku&&id=<?php echo $data['id_buku']?>">Pinjam</a>
                    <a onclick="return confirm('Apakah anda yakin ingin mengahapus favorit buku ini?');" class="btn btn-outline-danger" href="?page=hapus_favorit&&id=<?php echo $data['id_koleksi'];?>" class="btn btn-danger">Hapus</a>
                    <a class="btn btn-outline-warning"<?php echo $data['id_buku'];?>><i class="fas fa-bookmark"></i></a>
                            
                    <?php
                }?>
                </div>
              </div>
              <?php
            }?>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>

            
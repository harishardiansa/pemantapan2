      <h1 class="mt-4">Daftar Buku</h1>
      <div class="card">
      <div class="card-body">   
      <div class="row">
        <div class="col-md-12">
        <div class="row m-4">
          <?php
            $i = 1;
                  $query = mysqli_query($koneksi, "SELECT * FROM buku order by id_buku asc");
                   while($data = mysqli_fetch_array($query)){
           ?>
                          <div class="card m-4 " style="width: 14rem;">
                            <img src="assets/img/<?php echo $data['foto']; ?>" class="card-img-top" >
                            <div class="card-body">
                            <h5 class="card-title"><?php echo $data['id_buku']; ?></h5>
                              <h5 class="card-title"><?php echo $data['judul']; ?></h5>
                              <h6>Tahun Terbit : <?php echo $data['tahun_terbit']; ?></h6>
                              <a href="?page=detail&&id=<?php echo $data['id_buku'];?>" class="btn btn-primary">Detail</a>
                              <a href="?page=peminjaman_tambah&&id=<?php echo $data['id_buku'];?> "class="btn btn-success">Pinjam</a>
                              <a href="?page=favorit&&id=<?php echo $data['id_buku'];?>"><i class="fas fa-bookmark"></i></a>
                            </div>
                          </div>
                          <?php
                            }
                          ?>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
        <!---Container Fluid-->
      </div>
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
</body>

</html>
<?php 
    if($this->session->userdata('id_user')== NULL){
  ?>
      <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
          <p>Ini Adalah Website Sistem Informasi Untuk Memudahkan Tracking Berkas Pengadaan Barang dan Jasa Pada Balai Besar Bahan dan Barang Teknik (B4T).</p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; 2017 Balai Besar Bahan dan Barang Teknik. All Rights Reserved</p>
      </footer>
    </div> <!-- /container -->

    <!-- Modal -->
    <div class="modal fade" style="padding-top: 200px" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Username atau Password Salah</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <?php
      
    }
    ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->

    <script src="<?php echo base_url() ?>template/user/js/jquery-1.12.4.min.js" type="text/javascript"></script> 
    <script src="<?php echo base_url() ?>template/user/js/popper.min.js" type="text/javascript"></script> 
    <script src="<?php echo base_url() ?>template/user/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>


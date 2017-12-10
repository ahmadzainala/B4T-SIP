        <div class="jumbotron" style="margin-bottom: -20px;">
	      <div class="container">
	      	<div class="alert alert-secondary" role="alert">
			  <h4 class="alert-heading">Ini Adalah Halaman Panduan</h4>
			  <p>Halaman ini bertujuan untuk memberikan bantuan kepada pengguna perihal tata cara menggunakan website siminda.b4t.go.id</p>
			  <hr>
			  <p class="mb-0">Gunakan <strong>Ctrl + F</strong> untuk menemukan apa yang anda cari.</p>
			  <hr>
			  <form action="<?php echo base_url(); ?>" method="POST"><input class="btn btn-success" type="submit" name="submit" value="Kembali ke Halaman Utama"></td></form>
			</div>
			<br>
	        <div class="card">
			  <div class="card-body">
			    <h4 class="card-title">Username dan Password</h4>
			    <hr>
			    <p class="card-text">
			    	<ul style="list-style-type:disc">
				    	<li>Username dan Password diberikan oleh Admin dari siminda.b4t.go.id</li>
				    	<li>Jika melupakan Username atau Password harap meminta bantuan kepada Admin</li>
				    </ul>
			    </p>
			  </div>
			</div>
			<br>
	        <div class="card">
			  <div class="card-body">
			    <h4 class="card-title">Halaman Utama (Dasboard)</h4>
			    <hr>
			    <p class="card-text">
			    	<ul style="list-style-type:disc">
				    	<li>
				    		<h5>Sebagai User</h5>
				    		<table>
				    			<tr>
				    				<td width="40px"><i class="material-icons">timelapse</i></td>
				    				<td>Jumlah pesanan yang menunggu disetujui Kabid</td>
				    			</tr>
				    			<tr>
				    				<td><i class="material-icons">assignment_ind</i></td>
				    				<td>Jumlah pesanan yang menunggu disetujui Tata Usaha</td>
				    			</tr>
				    			<tr>
				    				<td><i class="material-icons">assignment</i></td>
				    				<td>Jumlah pesanan yang menunggu disetujui PPK</td>
				    			</tr>
				    			<tr>
				    				<td><i class="material-icons">assignment_returned</i></td>
				    				<td>Jumlah pesanan yang sedang dalam proses pengadaan</td>
				    			</tr>
				    			<tr>
				    				<td><i class="material-icons">assignment_late</i></td>
				    				<td>Jumlah pesanan yang sedang dalam verifikasi pengadaan</td>
				    			</tr>
				    			<tr>
				    				<td><i class="material-icons">assignment_turned_in</i></td>
				    				<td>Jumlah pesanan yang telah selesai proses pengadaan</td>
				    			</tr>
				    			
				    		</table>
				    	</li>
				    	<br>
				    	<li>
				    		<h5>Sebagai Kepala Bidang, Tata Usaha dan PPK</h5>
				    		<table>
				    			<tr>
				    				<td width="40px"><i class="material-icons">message</i></td>
				    				<td>Jumlah pesanan yang belum dibaca</td>
				    			</tr>
				    			<tr>
				    				<td><i class="material-icons">announcement</i></td>
				    				<td>Jumlah pesanan yang sudah dibaca dan menunggu tindakan</td>
				    			</tr>
				    			<tr>
				    				<td><i class="material-icons">check_circle</i></td>
				    				<td>Jumlah pesanan yang telah disetujui</td>
				    			</tr>
				    			<tr>
				    				<td><i class="material-icons">cancel</i></td>
				    				<td>Jumlah pesanan yang telah ditolak</td>
				    			</tr>				    			
				    		</table>
				    	</li>
				    	<br>
				    	<li>
				    		<h5>Sebagai Staff Pengadaan</h5>
				    		<table>
				    			<tr>
				    				<td width="40px"><i class="material-icons">message</i></td>
				    				<td>Jumlah pesanan yang belum dibaca</td>
				    			</tr>
				    			<tr>
				    				<td><i class="material-icons">announcement</i></td>
				    				<td>Jumlah pesanan yang sudah dibaca dan menunggu tindakan</td>
				    			</tr>
				    			<tr>
				    				<td><i class="material-icons">assignment_turned_in</i></td>
				    				<td>Jumlah pesanan yang telah selesai proses pengadaan</td>
				    			</tr>				    			
				    		</table>
				    	</li>
				    </ul>
			    </p>
			  </div>
			</div>
			<br>
			<div class="card">
			  <div class="card-body">
			    <h4 class="card-title">Membuat Pemesanan</h4>
			    <hr>
			    <p class="card-text">
			    	<ul style="list-style-type:disc">
				    	<li>Login menggunakan Username dan Password anda di siminda.b4t.go.id</li>
				    	<li>Setelah itu anda akan diarahkan ke halaman Main Dasboard</li>
				    	<li>Klik tombol <b>Buat Pesanan</b></li>
				    	<li>Lalu masukan <b>Nama Kegiatan, Agar</b></li>
				    	<li>Dan <b>Diperlukan Tanggal</b> harap isikan sesuai urgensi pesanan, misal barang tersebut sangat diperlukan segera maka isikan <b>Segera</b> sedangkan bila pesanan sifatnya ditentukan tanggal maka isikan <b>Tanggal</b> sesuai dengan keperluan pesanan</li>
				    	<li>Langkah selanjutnya masukan <b>Kategori</b> sesuai dengan jenis barang (misal pensil, termasuk kategori ATK), <b>Banyaknya, Satuan</b></li>
				    	<li>Jika sudah klik tambahkan, jika ingin menambahkan barang lagi maka isikan lagi dibawahnya dan ulangi langkah tadi</li>
				    	<li>Pilih sumber anggaran apakah dari <b>RM</b> atau <b>BLU</b></li>
				    	<li>Tambahkan keterangan dan Lampiran file jika memungkinkan, Lampiran file pada form pemesanan hanya mendukung format dalam bentuk Zip dan maksimal berukuran 2MB</li>
				    	<li>Setelah semua selesai diisi mohon cek kembali dan isikan password lalu klik tombol <b>Submit</b></li>			    	
			    	</ul>
			    </p>
			  </div>
			</div>
			<br>
			<div class="card">
			  <div class="card-body">
			    <h4 class="card-title">Mencari Pesanan</h4>
			    <hr>
			    <p class="card-text">
			    	<ul style="list-style-type:disc">
				    	<li>Isikan nama pesanan apa yang anda akan cari di kotak <b>"Cari Berkas"</b></li>	
				    	<li>Klik tombol dengan ikon <b><i class="material-icons">search</i></b></li>
				    	<li>Lalu pilih pesanan mana yang akan anda tinjau</li>		    	
			    	</ul>
			    </p>
			  </div>
			</div>
			<br>
			<div class="card">
			  <div class="card-body">
			    <h4 class="card-title">Membuat Zip pada Lampiran File</h4>
			    <hr>
			    <p class="card-text">
			    	<ul style="list-style-type:disc">
				    	<li>Sebelumnya bila pada komputer anda belum memiliki software Zip silahkan unduh terlebih dahulu dengan meminta bantuan Admin</li>	
				    	<li>Jika sudah maka silahkan pilih file (boleh lebih dari satu) yang akan menjadi lampiran dalam bentuk foto maupun berkas dokumen</li>
				    	<li>Tentukan nama bebas tergantung pada anda, setelah itu silahkan klik tombol create archive dan pilih format zip</li>
				    	<li>Maka zip tadi siap untuk diunggah pada halaman pengajuan pemesaanan</li>			    	
			    	</ul>
			    </p>
			  </div>
			</div>
	      </div>
	    </div>

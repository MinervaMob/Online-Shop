<h1>Halaman Pelanggan</h1>
    

  <div class="row m-t-30">
      <div class="col-md-12">
		<div class="table-responsive m-b-40">
		<table class="table table-borderless table-data3">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Pelanggan</th>
					<th>E-Mail</th>
					<th>Telepon</th>
				</tr>
			</thead>

			<tbody>
			<?php $no = 1; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM tb_pelanggan"); ?>
			<?php while($pecah = $ambil->fetch_assoc()) { ?>
			
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $pecah['nama_pelanggan']; ?></td>
					<td><?php echo $pecah['email']; ?></td>
					<td><?php echo $pecah['telepon']; ?></td>
				</tr>
			<?php $no++; ?>
			<?php } ?>
			</tbody>
		</table>
		</div>
	</div>
</div>
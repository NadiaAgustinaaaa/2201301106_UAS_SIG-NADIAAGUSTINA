<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Dapur Arang</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Dapur Arang Di Desa Ranggang</h6>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url('dapur/tambah') ?>"><button class="btn btn-success"><i class="fa fa-plus"></i>Tambah Data</button></a>
            <br><br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemilik</th>
                            <th>Keterangan</th>
                            <th>Latitude Longitude</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $key) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $key->nama_pemilik; ?></td>
                                <td><?php echo $key->keterangan; ?></td>
                                <td><?php echo $key->lat . ',' . $key->long; ?></td>
                                <td>
                                    <a href="<?php echo base_url('dapur/edit/' . $key->id_dapur); ?>"><button class="btn btn-warning" type="button"><i class="fa fa-edit"></i></button></a>
                                    <a href="<?php echo base_url('dapur/hapus/' . $key->id_dapur); ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')"><button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
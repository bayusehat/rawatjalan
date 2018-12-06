        <div class="container-fluid">
            <?php if ($this->session->flashdata('berhasil')): ?>
                <script>
                    swal({
                        title: "Success",
                        text: "<?php echo $this->session->flashdata('berhasil'); ?>",
                        timer: 2500,
                        showConfirmButton: false,
                        type: 'success'
                        });
                </script>
            <?php endif; ?>
            <?php if ($this->session->flashdata('gagal')): ?>
                <script>
                    swal({
                        title: "Failed",
                        text: "<?php echo $this->session->flashdata('gagal'); ?>",
                        timer: 2500,
                        showConfirmButton: false,
                        type: 'error'
                        });
                </script>
            <?php endif; ?>
            <a href="" data-toggle="modal" data-target="#tambahDokter" class="btn btn-success btn-sm" style="margin-bottom: 20px"><i class="fa fa-plus"></i> Tambah Dokter</a>
            <div class="row">
                <div class="col-md-12">
                    <table id="projectdashboard" class="table table-striped table-bordered nowrap tb" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dokter</th>
                                <th>Alamat/th>
                                
                                <th>Aksi</th>
                                </tr>
                        </thead>
                        <tbody>
                             <?php
                            $no = 0;
                                foreach ($dokter as $data) {
                                    echo '<tr>
                                            <td>'.++$no.'</td>
                                            <td>'.$data->nama_dokter.'</td>
                                            <td>'.$data->alamat_dokter.'</td>
                                            <td>
                                                <a href="" class="btn btn-fill btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>';
                                    }
                                ?>                    
                                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- Modal Tambah Dokter -->
<form method="post" action="<?php echo base_url();?>index.php/admin/tambah_dokter">
    <div class="modal fade" id="tambahDokter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Tambah Barang Baru</h4>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> -->
          </div>
          <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="nama_dokter" class="form-control border-input" placeholder="Nama Dokter">
                </div>
                <div class="form-group">
                    <input type="text" name="alamat_dokter" class="form-control border-input" placeholder="Alamat Dokter">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-info btn-fill" value="Simpan">
            </div>  
        </div>
    </div>
</div>
</form>
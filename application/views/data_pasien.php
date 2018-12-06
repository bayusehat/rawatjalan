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
            <div class="row">
                <div class="col-md-6">
                     <a href="<?php echo base_url();?>index.php/admin/pendaftaran_pasien" class="btn btn-success btn-sm" style="margin-bottom: 20px"><i class="fa fa-plus"></i> Pendaftaran Pasien</a>
                     <a href="<?php echo base_url();?>index.php/admin/pendaftaran_pasien_rawat" class="btn btn-success btn-sm" style="margin-bottom: 20px"><i class="fa fa-plus"></i> Tambah Pasien Rawat Jalan</a>
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-12">
                    <table id="projectdashboard" class="table table-striped table-bordered nowrap tb" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No RM</th>
                                <th>Nama Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>Keluarga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                                foreach ($pasien as $data) {
                                    echo '<tr>
                                            <td>'.++$no.'</td>
                                            <td>'.$data->no_rm.'</td>
                                            <td>'.$data->nama_pasien.'</td>
                                            <td>'.$data->jenis_kelamin.'</td>
                                            <td>'.$data->nama_keluarga.'</td>
                                            <td>
                                                <a href="'.base_url().'index.php/admin/cetak_id/'.$data->no_rm.'" class="btn btn-fill btn-info"><i class="fa fa-print"></i> Cetak ID</a>
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
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
            <a href="<?php echo base_url();?>index.php/admin/pendaftaran_pasien_rawat" class="btn btn-success btn-sm" style="margin-bottom: 20px"><i class="fa fa-plus"></i> Tambah Pasien Rawat Jalan</a>
            <div class="row">
                <div class="col-md-12">
                    <table id="projectdashboard" class="table table-striped table-bordered nowrap tb" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Rawat Jalan</th>
                                <th>No RM</th>
                                <th>Nama Pasien</th>
                                <th>Masuk Tanggal</th>
                                <th>Dokter</th>
                                <th>Aksi</th>
                                </tr>
                        </thead>
                        <tbody>
                             <?php
                            $no = 0;
                                foreach ($rawat as $data) {
                                    echo '<tr>
                                            <td>'.++$no.'</td>
                                            <td>'.$data->no_rj.'</td>
                                            <td>'.$data->no_rm.'</td>
                                            <td>'.$data->nama_pasien.'</td>
                                            <td>'.$data->created.'</td>
                                            <td>'.$data->nama_dokter.'</td>
                                            <td>
                                                <a href="'.base_url().'index.php/admin/cetak_nota/'.$data->no_rj.'" class="btn btn-fill btn-info"><i class="fa fa-print"></i> Cetak Nota</a>
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
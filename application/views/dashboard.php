        <div class="container-fluid">
            <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-pulse"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Rawat Jalan</p>
                                            <?php echo $this->db->count_all_results('tb_rawat_jalan');?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i> Updated now
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Pasien</p>
                                            <?php echo $this->db->count_all_results('tb_pasien');?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> Last day
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Pembayaran</p>
                                            <?php echo $this->db->count_all_results('tb_pembayaran');?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-timer"></i> In the last hour
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Data Rawat Jalan</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
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
                </div>
            </div>
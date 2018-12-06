        <div class="container-fluid">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-feedback has-search">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            <input name="search_data" class="form-control search-input" id="search_data" placeholder="Search Produk" type="text" onkeyup="ajaxSearch();">
                            <div id="suggestions">
                                <div id="autoSuggestionsList">
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <form method="post" action="<?php echo base_url();?>index.php/admin/tambah_pasien_rawat">
                            <div class="form-group">
                                <label>Pasien</label>
                                    <select class="form-control border-input" name="id_pasien" required="">
                                        <option value="">Pilih Pasien</option>
                                        <?php
                                            $query = $this->db->query('SELECT * FROM tb_pasien ORDER BY no_rm DESC')->result();
                                            if(!empty($query)){
                                                foreach ($query as $data) {
                                                    echo '<option value="'.$data->no_rm.'">'.$data->nama_pasien.'</option>';
                                                }
                                            }else{
                                                echo '<option value=""> </option>';
                                            }
                                        ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Pembayaran</label>
                                    <select class="form-control border-input" name="pembayaran" required="">
                                        <option value="">Pilih Pembayaran</option>
                                        <option value="Umum">Umum</option>
                                        <option value="BPJS">BPJS</option>
                                    </select>
                            </div>
                            <div class="form-group" id="asuransi">
                                <label>No. Asuransi</label>
                                   <input type="text" name="no_asuransi" class="form-control border-input">
                            </div>
                            <div class="form-group">
                                <label>Penanggung Jawab</label>
                                    <select class="form-control border-input" name="penanggung_jawab">
                                        <option value="">Pilih Penanggung Jawab</option>
                                        <option value="Pemkot">Pemkot</option>
                                        <option value="Kecamatan">Kecamatan</option>
                                    </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Kadaluarsa</label>
                                   <input type="text" name="kadaluarsa" class="form-control border-input tgl" required="">
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                    <select class="form-control border-input" name="kelas" required="">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option>I</option>
                                        <option>II</option>
                                        <option>III</option>
                                    </select>
                            </div>
                           
                            <div class="form-group">
                                <label>Unit</label>
                                    <select class="form-control border-input" name="unit" required="">
                                        <option value="">Pilih Unit</option>
                                        <option>Napza</option>
                                        <option>Anak</option>
                                        <option>Gigi</option>
                                    </select>
                                </div>
                            <div class="form-group">
                                        <label>Cara Masuk</label>
                                            <select class="form-control border-input" name="cara_masuk" required="">
                                                <option value="">Pilih Cara Masuk</option>
                                                <option>Datang Sendiri</option>
                                                <option>Ambulance</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Dokter</label>
                                        <select class="form-control border-input" name="id_dokter" required="">
                                                <option value="">Pilih Dokter</option>
                                                 <?php
                                                    $query = $this->db->query('SELECT * FROM tb_dokter ORDER BY no_dokter ASC')->result();

                                                    foreach ($query as $data) {
                                                        echo '<option value="'.$data->no_dokter.'">'.$data->nama_dokter.'</div>';
                                                     } 
                                                 ?>   
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tarif</label>
                                            <input type="text" class="form-control border-input" placeholder="Tarif" name="tarif">
                                    </div>
                                </div>
                        <input type="submit" name="submit" class="btn btn-fill btn-info btn-wd" value="Tambah" style="margin:10px;width: 98%"> 
                </form>
            </div>
        </div>

<script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script type="text/javascript">

            $('form select[name=pembayaran]').change(function(){
            if ($('form select option:selected').val() == 'BPJS'){
                $('#asuransi').show();
            }else{
                $('#asuransi').hide();
            }
        });
        </script>
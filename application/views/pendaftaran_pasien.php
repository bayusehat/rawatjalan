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
                <form method="post" action="<?php echo base_url();?>index.php/admin/tambah_pasien">
                    <div class="form-group">
                                <label>Nama Pasien</label>
                                    <input type="text" class="form-control border-input form-control-sm" placeholder="Nama Pasien" name="nama_pasien" required="">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                    <input type="text" class="form-control border-input form-control-sm" placeholder="Alamat" name="alamat_pasien" required="">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                    <select class="form-control border-input form-control-sm" name="jenis_kelamin" required="">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option>Laki - laki</option>
                                        <option>Perempuan</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                    <input type="text" class="form-control border-input form-control-sm" placeholder="Tempat Lahir" name="tempat_lahir" required="">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                    <input type="text" class="form-control border-input tgl form-control-sm" placeholder="Tanggal Lahir" name="tanggal_lahir" required="">
                            </div>
                            <div class="form-group">
                                <label>No. Hp</label>
                                    <input type="text" class="form-control border-input form-control-sm" placeholder="Nomor HP" name="no_hp" required="">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                    <select class="form-control border-input form-control-sm" name="status" required="">
                                        <option value="">Pilih Status</option>
                                        <option>Dilayani</option>
                                        <option>Tidak Dilayani</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                        <label>Nama Keluarga</label>
                                            <input type="text" class="form-control border-input form-control-sm" placeholder="Username" name="nama_keluarga" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Hubungan</label>
                                            <select class="form-control border-input form-control-sm" name="hubungan" required="">
                                                <option value="">Pilih Hubungan</option>
                                                <option>Suami</option>
                                                <option>Istri</option>
                                                <option>Kakak</option>
                                                <option>Adik</option>
                                                <option>Anak</option>
                                            </select>
                                    </div>
                                </div>
                    <input type="submit" name="submit" class="btn btn-fill btn-info btn-wd" value="Simpan" style="margin:10px;width: 98%"> 
                </form>
            </div>
        </div>
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
                            <input name="search_data" class="form-control search-input" id="search_data" placeholder="Search Pasien / Rawat Jalan" type="text" onkeyup="ajaxSearch();">
                            <div id="suggestions">
                                <div id="autoSuggestionsList">
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <form method="post" action="<?php echo base_url();?>index.php/admin/tambah_pembayaran">
                    <div class="col-md-9">
                        <div class="scroll">
                                <table class="table table-striped table-bordered" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>No RJ</th>
                                            <th>No RM</th>
                                            <th>Nama Pasien</th>
                                            <th>jumlah</th>
                                            <th>Biaya</th>
                                            <th>Subtotal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="isi">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jenis Pembayaran</label>
                                    <input type="text" name="jenis_pembayaran"  class="form-control border-input">
                            </div>
                             <div class="form-group">
                                <label>Keterangan</label>
                                    <input type="text" name="keterangan"  class="form-control border-input">
                            </div>
                            <div class="form-group">
                                <label>Total</label>
                                    <input type="text" name="total" id="total" class="form-control border-input">
                            </div>
                            <div class="form-group">
                                <label>Bayar</label>
                                    <input type="text" name="bayar" id="bayar" class="form-control border-input">
                            </div>
                            <div class="form-group">
                                <label>Kembali</label>
                                    <input type="text" name="kembali" id="kembali" class="form-control border-input">
                            </div>
                        </div>
                    <input type="submit" name="submit" class="btn btn-fill btn-info btn-wd" value="Simpan" style="margin:10px;width: 98%"> 
                </form>
            </div>
        </div>
    <script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript">
        var i = 0;
        function add_rawat(e) {
            var rj    = $(e).data("rj");
            var rm  = $(e).data("rm");
            var pasien  = $(e).data("pasien");
            var tarif = $(e).data("tarif");
            // var stok_barang  = $(this).data("stokbarang");
            var quantity     = $('#'+rj).val();
            var upt = +$('#'+rj).val() + 1;

            var subtotal     = quantity * tarif;

            if ($("#isi tr td input[value='"+rj+"']").length == 0){
                    $("#isi").append('<tr>'+
                                    '<td><input type="text" name="no_rj['+i+']" value="'+rj+'" class="form-barang"> </td>'+
                                    '<td><input type="text" name="no_rm['+i+']" value="'+rm+'" class="form-barang" required readonly></td>'+
                                    '<td><input type="text" name="nama_pasien['+i+']" value="'+pasien+'" class="form-barang" required></td>'+
                                    '<td><input type="number" name="jumlah['+i+']" value="'+quantity+'" class="form-barang qty" id="'+rj+'" onkeyup="update_qty();" required></td>'+
                                    '<td><input type="text" name="tarif['+i+']" value="'+tarif+'" class="form-barang price" required></td>'+
                                    '<td><input type="text" name="subtotal['+i+']" value="'+subtotal+'" class="form-barang subtotal" required></td>'+
                                    '<td><button type="button" class="btn btn-danger btn-sm del" onclick="hapus_row(this);"><i class="fa fa-trash"></i></button> </td>'+
                                '</tr>');
                                    i++; 
                                total();
                                $('tbody#isi tr:last td:first input').focus();
                                $("#suggestions").hide();
                                $("#search_data").val("");

                }else{
                    total();
                    $("#suggestions").hide();
                    $("#search_data").val("");
                }
        }

        function ajaxSearch(){
                var input_data = $('#search_data').val();

                if (input_data.length === 0)
                {
                    $('#suggestions').hide();
                }
                else
                {

                    var post_data = {
                        'search_data': input_data,
                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                    };

                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('admin/get_autocomplete');?>",
                        data: post_data,
                        success: function (data) {
                            // return success
                            if (data.length > 0) {
                                $('#suggestions').show();
                                $('#autoSuggestionsList').addClass('auto_list');
                                $('#autoSuggestionsList').html(data);
                            }
                        }
                    });

                }
            }

            function hapus_row(e) {
                $(e).parent().parent().remove();
                total();
            }
            function update_qty() {
                total();
                update_amounts();
                $('.qty').keyup(function() {
                    update_amounts();
                    total();
                });
            }

            function total() {
            var sum = 0;

            $(".subtotal").each(function() {
                var value = $(this).val();
                
                if(!isNaN(value) && value.length != 0) {
                    sum += parseFloat(value);
                }
            });

            $("#total").val(sum);
            }

            function update_amounts()
            {
                var sum = 0;
                $('#myTable > tbody  > tr').each(function() {
                    var qty = $(this).find('.qty').val();
                    var price = $(this).find('.price').val();
                    var amount = (qty*price)
                    sum+=amount;
                    $(this).find('.subtotal').val(amount);
                });
              
            }

            function kembali() {
                var bayar = $("#bayar").val();
                var total = $("#total").val();
                var kembali = bayar-total;

                $("#kembali").val(kembali);
            }

            $('#bayar').keyup(function() {
                    update_amounts();
                    total();
                    kembali();
                });
    </script>
<div class="card">
    <div class="card-header">
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#modalTambah">Tambah Data</button>
    </div>
    <div class="card-body">
                
                <?php 
                    if ($this->session->flashdata('warning')) {
                        echo '<div class="alert alert-warning">';
                        echo $this->session->flashdata('warning');
                        echo '</div>';
                    }

                    if ($this->session->flashdata('success')) {
                        echo '`<div class="alert alert-success">';
                        echo $this->session->flashdata('success');
                        echo '</div>';
                    }
                ?>
        <div class="table-responsive">
            <table id="list_transaksi" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Jumlah</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                        <th>Waktu Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no=1; foreach ($transaksi as $tra):?>
                    <tr>
                        <td width="50" class="text-center"><?= $no++?></td>
                        <td width="50" class="text-center"><?= $tra->jumlah?> <?= $tra->singkatan?></td>
                        <td><?= $this->req->rupiah($tra->nominal)?></td>
                        <td><?= $tra->keterangan?></td>
                        <td class="text-center" width="170"><?= $tra->tanggal?> - <?= $tra->jam?></td>
                        <td class="text-center">
                            <!-- <button class="btn btn-xs btn-warning" id='delete' data-id='<?= $tra->id?>' title='Hapus Data'><i class="fas fa-edit"></i></button> -->
                            <button class="btn btn-xs btn-danger" onclick="hapusTransaksi(<?= $tra->id?>)" id='edit' data-id='<?= $tra->id?>' title='Edit Data'><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>

            </table>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="modalTambah">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah satuan Tamu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAddtransaksi">
                    <div class="modal-body">
                        <label for="">Label yang memililiki tanda <span style="color:red">*</span> Tidak boleh kosong</label>
                        <br><br><br>

                        <div class="form-group">
                            <label>Satuan <span style="color:red">*</span> </label></label>
                            <select name="id_satuan" class="form-control" id="">
                                <?php foreach ($satuan as $sat):?>
                                    <option value="<?= $sat->id?>"><?= $sat->singkatan?> -  <?= $sat->nama_satuan?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Jumlah<span style="color:red">*</span> </label>
                            <input type="text" placeholder="Jumlah Barang Masuk dalam Satuan" name="jumlah" class="form-control" id="jumlah" required>
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Nominal Uang Keluar<span style="color:red">*</span> </label>
                            <input type="text" placeholder="Rp." id="rupiah" name="nominal" class="form-control rupiah" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Keterangan </label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label>Tanggal Transaksi </label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" >
                        </div>


                        

                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah satuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEditsatuan">
                    <div class="modal-body">

                        <label for="">Label yang memililiki tanda <span style="color:red">*</span> Tidak boleh kosong</label>
                        <br><br><br>

                        <input type="hidden" name="id" id="idData">

                       <div class="form-group">
                            <label>Satuan <span style="color:red">*</span> </label></label>
                            <select name="id_satuan" class="form-control" id="id_satuan1">
                                <?php foreach ($satuan as $sat):?>
                                    <option value="<?= $sat->id?>"><?= $sat->singkatan?> -  <?= $sat->nama_satuan?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Jumlah<span style="color:red">*</span> </label>
                            <input type="text" id="rupiah1" placeholder="Jumlah Barang Masuk dalam Satuan" name="jumlah" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Keterangan </label>
                            <input type="text" name="keterangan" id="keterangan1" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label>Tanggal Transaksi </label>
                            <input type="date" name="tanggal" id="tanggal1" class="form-control" >
                        </div>
                        


                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--  -->

    <script>
        document.getElementById("tanggal").valueAsDate = new Date()
    </script>
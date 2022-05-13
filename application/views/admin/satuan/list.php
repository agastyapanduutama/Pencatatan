<div class="card">
    <div class="card-header">
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#modalTambah">Tambah Data</button>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table id="list_satuan" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Singkatan</th>
                        <th>Nama satuan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
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
                <form id="formAddsatuan">
                    <div class="modal-body">
                        <label for="">Label yang memililiki tanda <span style="color:red">*</span> Tidak boleh kosong</label>
                        <br><br><br>

                        <div class="form-group">
                            <label>singkatan <span style="color:red">*</span> </label></label>
                            <input type="text" placeholder="KG" required name="singkatan" id="singkatan" class="form-control" >
                        </div>
                        
                        <div class="form-group">
                            <label>Nama satuan<span style="color:red">*</span> </label>
                            <input type="text" placeholder="Kilogram" name="nama_satuan" id="nama_satuan" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Keterangan </label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control" >
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
                            <label>singkatan </label>
                            <input type="text" placeholder="KG" required name="singkatan" id="singkatan1" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label>Nama satuan<span style="color:red">*</span> </label>
                            <input type="text" placeholder="Kilogram" name="nama_satuan" id="nama_satuan1" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Keterangan </label>
                            <input type="text" name="keterangan" id="keterangan1" class="form-control" >
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
$('#list_transaksi').on('click', '#delete', function() {
    let id = $(this).data('id');
    confirmSweet("Data akan terhapus secara permanen !")
        .then(result => {
            if (result) {
                $.ajax({
                    url: baseUrl + 'admin/transaksi/keluar/delete/' + id,
                    type: "GET",
                    success: function(result) {
                        response = JSON.parse(result)
                        if (response.status == 'ok') {
                            table.ajax.reload(null, false)
                            msgSweetSuccess(response.msg)
                                // msgSweetSuccess(response.msg)
                        } else {
                            msgSweetWarning(response.msg)
                                // msgSweetError(response.msg)
                        }
                    },
                    error: function(error) {
                        errorCode(error)
                    }
                })
            }
        })
})

$("#formAddtransaksi").submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: baseUrl + "admin/transaksi/keluar/insert",
        type: "post",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function() {
            // disableButton()
        },
        complete: function() {
            enableButton()
        },
        success: function(result) {
            location.reload();
            let response = JSON.parse(result)
            if (response.status == "fail") {
                msgSweetError(response.msg)
            } else {
                table.ajax.reload(null, false)
                msgSweetSuccess(response.msg)
                clearInput($("input"))
            }
        },
        error: function(event) {
            errorCode(event)
        }
    });
})

$("#formEdittransaksi").submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: baseUrl + "admin/transaksi/keluar/update",
        type: "post",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function() {
            // disableButton()
        },
        complete: function() {
            enableButton()
        },
        success: function(result) {
            let response = JSON.parse(result)
            if (response.status == "fail") {
                // msgSweetError(response.msg)
                clearInput($("input"))
                $("#modalEdit").modal('hide')
            } else {
                table.ajax.reload(null, false)
                msgSweetSuccess(response.msg)
                clearInput($("input"))
                $("#modalEdit").modal('hide')

            }
        },
        error: function(event) {
            errorCode(event)
        }
    });
})

function editTransaksi(id) {
    $.ajax({
        url: baseUrl + 'admin/transaksi/keluar/get/' + id,
        type: "GET",
        success: function(result) {
            response = JSON.parse(result)
            $("#idData").val(response.id)
            $("#rupiah").val(response.jumlah)
            $("#keterangan1").val(response.keterangan)
            $("#modalEdit").modal('show')

        },
        error: function(error) {
            errorCode(error)
        }
    })
}

function hapusTransaksi(id) {
    confirmSweet("Data akan terhapus secara permanen !")
        .then(result => {
            if (result) {
                $.ajax({
                    url: baseUrl + 'admin/transaksi/keluar/delete/' + id,
                    type: "GET",
                    success: function(result) {
                        response = JSON.parse(result)
                        location.reload()
                        if (response.status == 'ok') {
                            table.ajax.reload(null, false)
                            msgSweetSuccess(response.msg)
                                // msgSweetSuccess(response.msg)
                        } else {
                            msgSweetWarning(response.msg)
                                // msgSweetError(response.msg)
                        }
                    },
                    error: function(error) {
                        errorCode(error)
                    }
                })
            }
        })
}
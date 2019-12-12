function ValidateSize(inputFile, inputText, formElem, target, radio = null) {
    let total = 0;
    let totalText = 0;
    if (typeof inputText != 'undefined') {
        totalText = $(inputText).length;
        let choiceTrue = 0;
        let lanjut = 1;
        $.each($(inputText), function (index, value) {
            if ($(this).is(':checked')) {
                choiceTrue+=1;
            }
            if (value.value == '') {lanjut = 0;}
        });
        if (lanjut != 1 || (radio != null && choiceTrue < 1)) {
            $(target).html('<p class="alert alert-danger">Harap cek kembali field input yang wajib diisi!</p>');
            totalText--;
            return false;
        }
    }

    if (inputFile != 'null') {
        total = $(inputFile).length;
        let lanjut2 = 1;
        $.each($(inputFile), function (index, value) {
            if (window.FileReader && window.File && window.FileList && window.Blob) {
                // File API Supported
                if (value.files[0]) {
                    let fileSize = value.files[0].size / 1024 / 1024; // file size dalam MB;
                    if (fileSize > 5) {
                        swal("Oh Tidak!", "Ukuran file tidak boleh lebih dari 5 Megabytes", "warning");
                        total--;
                        lanjut2 = 0;
                    }
                } else {
                    $(target).html('<p class="alert alert-danger">Harap cek kembali file yang wajib diupload!</p>');
                    total--;
                    lanjut2 = 0;
                }
            } else {
                // Not Supported File API
                swal("Warning!", "File API not supported on this browser", "warning");
                // $(formElem).submit();
            }
        });
        if (lanjut2 != 1) {
            return false;
        }
    }
    if (  (total == $(inputFile).length) || (totalText == $(inputText).length) ) {
        $(target).html('');
        swal({
            title: "Apakah Anda Yakin?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Data Berhasil Diinput!", {
                    icon: "success",
                });

                $(formElem).submit();
            } else {
                
            }
        });
    }
}


// Approve Bid Price 
function apprvPrice() {
    swal({
            title: "Apakah Anda Yakin?",
            text: "Pastikan data sudah benar",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willUpload) => {
            if (willUpload) {
                swal("Berhasil Menyetujui Penawaran Harga", {
                    icon: "success",
                });
                
                $('#apprvPriceSubmit').submit();
                
            } else {
                
            }
        });
}


// Decline Bid Price 
function dclinePrice() {
    swal({
            title: "Tolak Penawaran Harga?",
            text: "Pernawaran harga yang sebelumnya akan dihapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willUpload) => {
            if (willUpload) {
                swal("Berhasil menolak penawaran harga", {
                    icon: "success",
                });
                
                
                
            } else {
                
            }
        });
}


//Pembuatan Draft Sertifikasi

//Approve Draft Sert 
function apprvSert() {
    swal({
            title: "Apakah Anda Yakin?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willUpload) => {
            if (willUpload) {
                swal("Berhasil approve Draft Sertifikasi", {
                    icon: "success",
                });
                
                $('#apprvSertForm').submit();
                
            } else {
                
            }
        });
}

//Req Sert Jadi 
function reqSertJadi() {
    swal({
            title: "Apakah Anda Yakin?",
            text: "Anda tidak dapat mengulang proses ini",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willUpload) => {
            if (willUpload) {
                swal("Berhasil!", {
                    icon: "success",
                });
                
                $('#reqSertJadiForm').submit();
                
            } else {
                
            }
        });
}



var nomor = $('.bodyContent').length;
var nomr11 = $('.bodyContent11').length;
// pengisian manual Spesifikasi pembelian/jaminan mutu bahan
$(document).ready(function () {
    $('#tambahBahan').on('click', function () {
        let clone = $('.bodyContent').first().clone();
        clone.find('.jenisbahan').val('');
        clone.find('.spek').val('');
        clone.find('.namaPemasok').val('');
        $('#tableBody').append(clone);
        nomor++;
    });

    // pengisian manual Peralatan/Instrumen pengujian, gauge, atau perkakas
    $('#tambahBahan11').on('click', function () {
        let clone = $('.bodyContent11').first().clone();
        clone.find('.namaAlat').val('');
        clone.find('.namaPembuat').val('');
        clone.find('.acuan').val('');
        clone.find('.sistemP').val('');
        clone.find('.sert').val('');
        $('#tableBody11').append(clone);
        nomr11++;
    });
});

function slideOpt(slideContent, opt, slideContent2, fileRegis = false) {
    let disabledd = [null, null];
    let clss = '';
    if (opt == 'ya') {
        $(slideContent).slideDown();
        disabledd[0] = false;
        if (slideContent2 != false) {
            $(slideContent2).slideUp();
            disabledd[1] = true;
        }
        if (fileRegis) {
            clss = 'custom-file-input fileR fileregis';
        }
    } else {
        $(slideContent).slideUp();
        disabledd[0] = true;
        if (slideContent2 != false) {
            $(slideContent2).slideDown();
            disabledd[1] = false;
        }
        if (fileRegis) {
            clss = 'custom-file-input fileR';
        }
    }
    $.each($(slideContent).find('.inpt'), function (index, value) {
        $(this).prop('disabled', disabledd[0]);
    });
    $.each($(slideContent2).find('.inpt'), function (index, value) {
        $(this).prop('disabled', disabledd[1]);
    });
    if (fileRegis != null) {
        $.each($(slideContent).find('.fileR'), function (index, value) {
            $(this).prop('disabled', disabledd[0]);
            $(this).prop('class', clss);
        });
    }
}

// hapus row Spesifikasi pembelian/jaminan mutu bahan
$(document).on('click', '.hapusContent', function () {
    var elem = $('.bodyContent').first();
    if (nomor > 1) {
        $(this).parent().parent().remove();
        nomor--;
    } else {
        elem.find('.jenisbahan').val('');
        elem.find('.spek').val('');
        elem.find('.namaPemasok').val('');
    }
});

// hapus row Peralatan/Instrumen pengujian, gauge, atau perkakas
$(document).on('click', '.hapusContent11', function () {
    var elem11 = $('.bodyContent11').first();
    if (nomr11 > 1) {
        $(this).parent().parent().remove();
        nomr11--;
    } else {
        elem11.find('.namaAlat').val('');
        elem11.find('.namaPembuat').val('');
        elem11.find('.acuan').val('');
        elem11.find('.sistemP').val('');
        elem11.find('.sert').val('');
    }
});

function inputToggle(lampiran, manual, input1, input2) {
    $(lampiran).toggle();
    $(manual).toggle();
    let val = [];
    if ($(lampiran).is(':visible')) {
        val[0] = false;
        val[1] = true;
    } else {
        val[0] = true;
        val[1] = false;
    }
    $(lampiran).find('input[name=' + input1 + ']').prop('disabled', val[0]);
    $.each($(input2), function (index, value) {
        $(this).prop('disabled', val[1]);
    });
}

var radioCount = [parseInt($('input[name=material]:checked').val()), parseInt($('input[name=prosesOperasi]:checked').val()), parseInt($('input[name=produkAkhir]:checked').val())];
var active = false;
var disabled = true;
// for (var j = 0; j < radioCount.length; j++) {
//     if (radioCount[j] == 1) {
//         active = true;
//     }
// }
// if (active) {
//     disabled = false;
//     $('.kuis_126').slideDown();
// } else {
//     disabled = true;
//     $('.kuis_126').slideUp();
// }

function slideOpt2(radio, opsi) {
    if (opsi == 'ya') {
        radioCount[parseInt(radio)] = 1;
    } else {
        radioCount[parseInt(radio)] = 0;
        active = false;
    }
    for (var i = 0; i < radioCount.length; i++) {
        if (radioCount[i] === 1) {
            active = true;
        }
    }
    if (active) {
        disabled = false;
        $('.kuis_126').slideDown();
    } else {
        disabled = true;
        $('.kuis_126').slideUp();
    }
    $.each($('.kuis_126').find('.inpt'), function (index, value) {
        $(this).prop('disabled', disabled);
    });
}

function SertWarn() {
    // swal("Peringatan!", "<b>Tidak bisa membuat sertifikasi produk baru, Terdapat sertifikasi produk yang sedang berjalan</b>", "warning");

    swal({
        html: true,
        title: "Peringatan!",
        text: "Tidak bisa membuat sertifikasi produk baru, terdapat sertifikasi produk yang sedang berjalan",
        icon: "warning",
    });
}

function formDateRange(inputFile, inputText, formElem, target) {
    var form = $(formElem);
    var date1 = Date.parse(form.find('input[name=tgl1]').val());
    var date2 = Date.parse(form.find('input[name=tgl2]').val());
    if (parseInt(date1) > parseInt(date2)) {
        $(target).html('<p class="alert alert-danger">Range tanggal tidak valid!</p>');
    } else {
        ValidateSize(inputFile, inputText, formElem, target);
    }
}
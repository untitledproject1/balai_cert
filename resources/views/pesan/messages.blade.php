@extends('layouts.main')

@section('card-header', 'Pesan')

@section('content')

<style>
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    .lengit {
        display: none;

    }

    .hilang {
        font-size: 40px;
        padding: auto;
        margin: auto;
        text-align: center;
    }

</style>

<div class="row no-gutters">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
               
                <div class="wrap_content_messages"> 
<!--
                    <div class="mb-3">
                        <button type="button" class="add_messages" data-toggle="modal" data-target="#addMessages"><i class="fas fa-plus"></i>&nbsp; Kirim Pesan</button>
                    </div>
-->
                    <input id="search_produk_msg" class="form-control mb-3" type="text" name="" placeholder="Search..">

                    {{-- <a href="#message" class="tablinks" onclick="openMessage(event, 'message')"> --}}
                    
<!--
                    <div class="btn-group dropright">
                      <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Keramik
                      </button>
                      <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Apply SA</a>
                      </div>
                    </div>
-->

                    <ul id="list_produk_msg" class="list-group tablinks dropright">
                        @foreach($produk as $data)
                        {{-- <li class="list-group-item" onclick="listActive(this)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> --}}
                        <li class="list-group-item" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $data->produk }} <i class="fas fa-angle-right float-right"></i>
                            <div class="dropdown-menu">
                                @foreach($tahap_sert as $key => $tahap)
                                    @if($tahap->kode_tahap !== 24 && $tahap->kode_tahap !== 10)
                                    <a class="dropdown-item message_show" href="#" 
                                        data-title="{{ $tahap->tahapan }}" 
                                        data-kode_tahap="{{ $tahap->kode_tahap-1 }}"
                                        data-produk_kode_tahap="{{ $data->kode_tahap }}" 
                                        data-produk_id="{{ $data->id }}"
                                        data-request_sert="{{ $data->request_sert }}"
                                        data-role_name="{{ $role }}"
                                    >{{ $tahap->tahapan }}</a>
                                    <div class="dropdown-divider"></div>
                                    @endif
                                @endforeach
                                {{-- <a id="message" class="dropdown-item" href="#">Apply SA</a>
                                <div class="dropdown-divider"></div>
                                <a id="message" class="dropdown-item" href="#">Pembuatan MOU</a>
                                <div class="dropdown-divider"></div>
                                <a id="message" class="dropdown-item" href="#">Sign MOU</a>
                                <div class="dropdown-divider"></div>
                                <a id="message" class="dropdown-item" href="#">Pembuatan Penawaran Harga</a>
                                <div class="dropdown-divider"></div>
                                <a id="message" class="dropdown-item" href="#">Pembuatan Invoice dan Upload Kode Biling</a>
                                <div class="dropdown-divider"></div>
                                <a id="message" class="dropdown-item" href="#">Pembuatan Dokumen Laporan Hasil Sertifikasi</a> --}}
                            </div>
                        </li>
                        @endforeach
                        
                        {{-- <li id="message2" class="list-group-item" onclick="listActive(this)">Ubin</li>
                        <li id="message3" class="list-group-item" onclick="listActive(this)">Kloset</li> --}}
                    </ul>

                    {{-- </a> --}}
                </div>

               <!-- Modal -->
                <div class="modal fade" id="addMessages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Kirim Pesan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body msg_modal_body">
                                <form id="message_send" method="POST" action="">
                                    <div class="form-group">
                                        <label>Kepada</label>
                                        <div class="row kepada"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tahap Sertifikasi</label>
                                        {{-- <input class="form-control" type="text" value="{{ \AppHelper::instance()->getMessageProp($kode_tahap, $tahap_sert)[1] }}" readonly> --}}
                                        <div class="row tahap_sert"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Isi Pesan</label>
                                        <textarea class="form-control pesan" rows="5" placeholder="Isi pesan.."></textarea>
                                        <small class="form-text text-muted">wajib diisi</small>
                                    </div>
                                    <div class="validMsgSend"></div>
                                    <div class="mt-3">
                                        <button type="reset" class="reset_btn">Reset</button>
                                        <button type="button" id="submit_msg" class="submit_btn ml-2">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ==================== --> 

            </div>

            <div class="col-lg-9">
                <div class="wrap_content_messages position-relative">
                    <div class="col-lg-7 wrap_content_messages_detail hilang">
                        <img style="width: 350px;" src="{{ asset('images/messages.png') }}" alt="">
                        <h5 class="mt-4 text-none">Klik menu di bagian kiri untuk melihat pesan</h5>
                    </div>
                    <div class="messages_main tabcontent lengit">
                        <div class="row">
                            <div class="col-lg-7 text-left">
                                <nav class="header sticky-top">
                                    <h6 id="msg_title"></h6>
                                </nav>
                            </div>
                            <div class="col-lg-4 text-right msg_modal">
                                <div class="mr-2" style="float: right;">
                                    <button type="button" id="msg_modal_btn" class="modal_btn btn_reply" data-toggle="modal" data-target="#addMessages"><i class="fas fa-reply"></i> &nbsp; Balas</button>
                                </div>
                                <div class="btn_reload"></div>
                            </div>
                        </div>
                        <hr class="full_width_hr">
                        <div id="msg_content"></div>
                        {{-- <div class="mt-3">
                            <div>
                                <div class="row">
                                    <div class="col-lg-8 name_msg">
                                        <span class="name mr-2">Lucas</span> 
                                        <span class="badge_pemasaran">Seksi Pemasaran</span>
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <img src="{{ asset('images/icon/clock.svg') }}" alt=""> <span class="date">22 Desember 2019</span>
                                    </div>
                                </div>
                                <p class="isi">
                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
                                </p>
                            </div>
                        </div>
                        <hr> --}}
                        {{-- <div class="mt-3">
                            <div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <span class="name mr-2">Anda</span> 
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <img src="{{ asset('images/icon/clock.svg') }}" alt=""> <span class="date">25 Desember 2019</span>
                                    </div>
                                </div>
                                <p class="isi">
                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
                                </p>
                            </div>
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    //Header
    $(window).scroll(function() {
        $('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
    });

    function sendNotification(user_token, datas, id_penerima) {
      $.post('/notifications', {
        'user_token': user_token,
        'datas': datas,
        'id_penerima': id_penerima
      }).done(function(dt) {
        console.log('Notification Pushed');
      }).fail(function(err) {
        return ;
      })
    }

    var modal_url = '';

    // ---- send message func ----
    function send_msg_ajax(url, message) {
        $.post('{{ url('/send_ajax_msg') }}', {
            url: url,
            message: message
        }).done(function(data) {
            // console.log(data);
            
            if (data.err) {
                swal(data.err, {
                    icon: "error",
                }); 
            } else {
                var msg = "";
                msg+= "<div class='mt-3'><div class='row'><div class='col-lg-8 name_msg'>";
                if (data.data.ket_pesan == 'client') {
                    msg+= "<span class='name mr-2' style='color: rgba(52,152,219,1.0);'>Anda</span>";
                } else {
                    msg+= "<span class='name mr-2'>"+data.msg_prop.name+"</span>";
                }
                if (data.data.ket_pesan == 'admin') {
                    msg+= "<span class='badge_pemasaran'>"+data.msg_prop.role_name+"</span>";
                }
                msg+= "</div><div class='col-lg-4 text-right'><img src='{{ asset('images/icon/clock.svg') }}' alt=''> <span class='date'>"+data.data.created_at+"</span></div></div><span class='isi pl-2' style='font-size:15px;display:block;'>"+data.data.pesan+"</span>";
                msg+= "</div>";
                msg+= "<hr>";
                $('#msg_content').prepend(msg);

                swal("Pesan berhasil terkirim", {
                    icon: "success",
                });
            }
            $('#addMessages').modal('hide');

            // send notification
            sendNotification(data.notif_data.user_token, data.notif_data.datas, data.notif_data.id_penerima);

        }).fail(function(err) {
            console.log(err.responseJSON);
        });
    }

    // ---- get message func ----
    function get_msg_ajax(kode_tahap, produk_id, request_sert, role_name, produk_kode_tahap) {
        $.post('{{ url('/get_messages_tahap') }}', {
            kode_tahap: kode_tahap,
            produk_id: produk_id
        }).done(function(data) {
            // console.log(data);
            var msg = '';
            if (parseInt(produk_kode_tahap) < parseInt(kode_tahap)) {
                msg = 'Pesan belum ada!';
                $('.msg_modal').hide();     // hide akses modal pesan jika tahap sertifikasi sudah lewat
            } else if (data.data.length == 0) {
                msg = 'Pesan belum ada!';
                $('.msg_modal').hide();     // hide akses modal pesan jika pesan kosong
            } else {
                for (var m = 0; m < data.data.length; m++) {
                    msg+= "<div class='mt-3'><div class='row'><div class='col-lg-8 name_msg'>";
                    if (data.data[m].ket_pesan == 'client') {
                        msg+= "<span class='name mr-2' style='color: rgba(52,152,219,1.0);'>Anda</span>";
                    } else {
                        msg+= "<span class='name mr-2'>"+data.data[m].admin+"</span>";
                    }
                    if (data.data[m].ket_pesan == 'admin') {
                        msg+= "<span class='badge_pemasaran'>"+data.data[m].role_name+"</span>";
                    }
                    msg+= "</div><div class='col-lg-4 text-right'><img src='{{ asset('images/icon/clock.svg') }}' alt=''> <span class='date'>"+data.data[m].waktu_terkirim+"</span></div></div><span class='isi pl-2' style='font-size:15px;display:block;'>"+data.data[m].pesan+"</span></div>";
                    if (m !== data.data.length - 1) {
                        msg+= "<hr>";
                    }
                }
                $('.msg_modal').show();


                // ---- set modal balas pesan ----

                    // - seleksi penerima pesan
                $.post('{{ url('set_prop_msg') }}', {
                    request_sert: request_sert, 
                    role: role_name,
                    kode_tahap: kode_tahap,
                    tahap_sert: '{{ json_encode($tahap_sert) }}',
                    user: '{{ isset($user) ? json_encode($user) : null }}',
                    produk_id: produk_id
                }).done(function(data) {
                    $('.msg_modal_body').find('.kepada').html(data.penerima);
                    $('.msg_modal_body').find('.tahap_sert').html(data.tahap);
                    // $('.msg_modal_body').find('#message_send').prop('action', data.form_url);

                    modal_url = data.form_url;

                }).fail(function(err) {
                    console.log(err.responseJSON);
                });
            }
            $('#msg_content').html(msg);

        }).fail(function(err) {
            console.log(err.responseJSON);
        });
    }

    function btn_reload(kode_tahap, produk_id, request_sert, role_name, produk_kode_tahap) {
        $('#btn_reload').on('click', function() {
            $('.preloader').show();
            
            // call get message func
            get_msg_ajax(kode_tahap, produk_id, request_sert, role_name, produk_kode_tahap);

            setTimeout(function() {
                $('.preloader').fadeOut();
            }, 600);
        });
    }
    
    // ---- set prop message ------
    function set_prop_msg() {
        $('.message_show').on('click', function() {
            // $(this).parent().parent().addClass('list-group-active');
            $('.messages_main').show();
            $('.hilang').hide();

            // change message title
            $('.messages_main').find('#msg_title').html($(this).data('title'));
            $('.messages_main').find('.btn_reload').html("<button id='btn_reload' class='btn btn-secondary' style='font-size:14px;'><i class='fas fa-redo'></i> &nbsp;&nbsp;Muat ulang</button>");

            // ---- get message ajax ----
            var kode_tahap = $(this).data('kode_tahap');
            var produk_id = $(this).data('produk_id');
            var request_sert = $(this).data('request_sert');
            var role_name = $(this).data('role_name');
            var produk_kode_tahap = $(this).data('produk_kode_tahap');

            // call get message func
            get_msg_ajax(kode_tahap, produk_id, request_sert, role_name, produk_kode_tahap);

            // call btn_reload func
            btn_reload(kode_tahap, produk_id, request_sert, role_name, produk_kode_tahap);
        });
    }

    var submit_msg_btn = $('#submit_msg');

    $(document).ready(function() {
        $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        // call set_prop_msg func
        set_prop_msg();

        // ---- action kirim pesan
        submit_msg_btn.on('click', function() {
            if ($('.msg_modal_body').find('.pesan').val() == '') {
                $('.msg_modal_body').find('.validMsgSend').html("<p class='alert alert-danger'>Harap cek kembali field input yang wajib diisi!</p>");
            } else {
                $('.msg_modal_body').find('.validMsgSend').html("");
                send_msg_ajax(modal_url, $('.msg_modal_body').find('.pesan').val());
            }
        });

        // ---- search product ------
        $('#search_produk_msg').keyup(function() {
            $.get('{{ url('/search_produk') }}', {
                user_id: '{{ $userAuth->id }}',
                produk: $(this).val(),
                admin_id: null
            }).done(function(data) {
                var list = '';
                if (data.data.length == 0) {
                    list = 'Produk tidak ditemukan!';
                } else {
                    for (var i = 0; i < data.data.length; i++) {
                        
                        list+= "<li class='list-group-item' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>"+data.data[i].produk+" <i class='fas fa-angle-right float-right'></i> <div class='dropdown-menu'>";

                        for (var t = 0; t < data.tahap.length; t++) {
                            var kdTahap = parseInt(data.tahap[t].kode_tahap)-1;
                            if (data.tahap[t].kode_tahap != 10 && data.tahap[t].kode_tahap != 24) {
                                list+= "<a class='dropdown-item message_show' href='#' data-title='"+data.tahap[t].tahapan+"' data-kode_tahap='"+kdTahap+"' data-produk_kode_tahap='"+data.data[i].kode_tahap+"' data-produk_id='"+data.data[i].id+"' data-request_sert='"+data.data[i].request_sert+"' data-role_name='{{ $role }}'>"+data.tahap[t].tahapan+"</a> <div class='dropdown-divider'></div>";
                            }
                            if (t == data.tahap.length - 1) {
                                list+= "</div>";
                            }
                        }

                        if (i == data.data.length - 1) {
                            list+= "</li>";
                        }
                    }
                }
                $('#list_produk_msg').html(list);
                
                // call set_prop_msg func
                set_prop_msg();

            }).fail(function(err) {
                console.log(err.responseJSON);
            });
        })
    })

</script>
@endsection
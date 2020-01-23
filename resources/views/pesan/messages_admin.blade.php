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
            <div class="col-lg-12">
                <div class="wrap_content"> 
                    <div class="row">
                        <div class="col-lg-1">
                            <a class="btn btn-light" href="{{ url('/messages_client') }}" title="Kembali"><i class="fa fa-arrow-left"></i></a>
                        </div>
                        <div class="col-lg-11" style="line-height: 2.5;">
                            <h5>Pesan Jabatan</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
               
                <div class="wrap_content_messages"> 
                    <input id="search_admin_msg" style="font-size: 14px;" class="form-control mb-3" type="text" name="" placeholder="Cari jabatan..">

                    <ul id="list_produk_msg" class="list-group tablinks dropright">
                        @foreach($user as $data)
                            @if($data->id !== $userAuth->id)
                                <li class="list-group-item" data-id_pengirim="{{ $userAuth->id }}" data-id_penerima="{{ $data->id }}" data-penerima="{{ $data->name }}" data-role_penerima="{{ $data->role_name }}"> {{ $data->role_name }} </li>
                            @endif
                        @endforeach
                    </ul>

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
                        <h5 class="mt-4 text-none">Klik List di bagian kiri untuk melihat pesan</h5>
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
                                    <button type="button" id="msg_modal_btn" class="modal_btn btn_reply" data-toggle="modal" data-target="#addMessages"><i class="fas fa-reply"></i> &nbsp; Kirim Pesan</button>
                                </div>
                                <div class="btn_reload"></div>
                            </div>
                        </div>
                        <hr class="full_width_hr">
                        <div id="msg_content"></div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var userAuth_id = '{{ $userAuth->id }}';

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

    // ajax send message
    function send_msg_ajax(url, message) {
        $.post(url, {
            message: message,
            formUrl: url
        }).done(function(data) {

            // console.log(data);
            var msg_content = $('#msg_content').html();
            if (data.err) {
                swal(data.err, {
                    icon: "error",
                });
            } else {
                var msg = "";
                msg += "<div class='mt-3'><div class='row'><div class='col-lg-8 name_msg'>";
                if (data.msg_prop.id_pengirim == userAuth_id) {
                    msg += "<span class='name mr-2' style='color: rgba(52,152,219,1.0);'>Anda</span>";
                } else {
                    msg += "<span class='name mr-2'>"+data.msg_prop.pengirim+"</span><span class='badge_pemasaran'>"+data.msg_prop.role_pengirim+"</span>";
                }
                msg += "</div><div class='col-lg-4 text-right'><img src='{{ asset('images/icon/clock.svg') }}' alt=''> <span class='date'>" + data.msg.created_at + "</span></div></div><span class='isi pl-2' style='font-size:15px;display:block;'>" + data.msg.pesan + "</span></div>";

                if (msg_content == 'Tidak ada pesan') {
                    $('#msg_content').html(msg);
                } else {
                    msg += "<hr>";
                    $('#msg_content').prepend(msg);
                }

                swal("Pesan berhasil terkirim", {
                    icon: "success",
                });
            }
            $('#addMessages').modal('hide');

            // send notification
            sendNotification(data.notif_data.user_token, data.notif_data.datas, data.notif_data.id_penerima);
            
        }).fail(function(err) {
            console.log(err);
        });
    }

    // btn reload
    function btn_reload(id_penerima, id_pengirim, penerima, role_penerima) {
        $('#btn_reload').on('click', function() {
            $('.preloader').show();

            // call get message func
            get_msg(id_penerima, id_pengirim, penerima, role_penerima);

            setTimeout(function() {
                $('.preloader').fadeOut();
            }, 600);
        });
    }

    // get messages
    function get_msg(id_penerima, id_pengirim, penerima, role_penerima) {
        $.post('{{ url('/get_msg_admin') }}', {
            id_penerima: id_penerima
        }).done(function(data) {
            // console.log(data.pesan);
            var msg = '';
            if (data.pesan.length == 0) {
                msg = 'Tidak ada pesan';
                $('.msg_modal').hide(); // hide akses modal pesan jika pesan kosong
            } else {
                for (var p = 0; p < data.pesan.length; p++) {
                    msg += "<div class='mt-3'><div class='row'><div class='col-lg-8 name_msg'>";
                    if (data.pesan[p].id_pengirim == id_pengirim) {
                        msg += "<span class='name mr-2' style='color: rgba(52,152,219,1.0);'>Anda</span>";
                    } else {
                        msg += "<span class='name mr-2'>"+data.pesan[p].pengirim+"</span><span class='badge_pemasaran'>"+data.pesan[p].role_pengirim+"</span>";
                    }
                    msg += "</div><div class='col-lg-4 text-right'><img src='{{ asset('images/icon/clock.svg') }}' alt=''> <span class='date'>" + data.pesan[p].waktu_terkirim + "</span></div></div><span class='isi pl-2' style='font-size:15px;display:block;'>" + data.pesan[p].pesan + "</span></div>";
                    if (p !== data.pesan.length - 1) {
                        msg += "<hr>";
                    }
                }
            }
            $('.msg_modal').show();
            $('#msg_content').html(msg);

            // set modal kirim pesan
            $('.kepada').html("<div class='col-lg-6'><b>"+penerima+"</b></div> <div class='col-lg-6'><label class='badge badge-secondary'>"+role_penerima+"</label></div>");

            // set url modal kirim pesan
            modal_url = '{{ url('/send_ajax_msgAdmin') }}'+'/'+id_pengirim+'/'+id_penerima;

        }).fail(function(err) {
            console.log(err.responseJSON);
        });
    }

    // show messages
    function show_msg() {
        $('.list-group-item').on('click', function() {
            
            $('.messages_main').show();
            $('.hilang').hide();

            var id_penerima = $(this).data('id_penerima');
            var id_pengirim = $(this).data('id_pengirim');
            var penerima = $(this).data('penerima');
            var role_penerima = $(this).data('role_penerima');
            
            // change message title
            $('.messages_main').find('#msg_title').html("<div style='font-size: 15px;'><span class='name mr-2'>"+penerima+"</span><br><br><span class='badge_pemasaran'>"+role_penerima+"</span></div>");
            $('.messages_main').find('.btn_reload').html("<button id='btn_reload' class='btn btn-secondary' style='font-size:14px;'><i class='fas fa-redo'></i> &nbsp;&nbsp;Muat ulang</button>");

            // call get_msg func
            get_msg(id_penerima, id_pengirim, penerima, role_penerima);

            // call btn_reload func
            btn_reload(id_penerima, id_pengirim, penerima, role_penerima);
        });
    }

    var submit_msg_btn = $('#submit_msg');
    var modal_url = '';
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // call show_msg func
        show_msg();

        // ---- action kirim pesan
        submit_msg_btn.on('click', function() {
            if ($('.msg_modal_body').find('.pesan').val() == '') {
                $('.msg_modal_body').find('.validMsgSend').html("<p class='alert alert-danger'>Harap cek kembali field input yang wajib diisi!</p>");
            } else {
                $('.msg_modal_body').find('.validMsgSend').html("");
                send_msg_ajax(modal_url, $('.msg_modal_body').find('.pesan').val());
            }
        });

        // search admin
        $('#search_admin_msg').keyup(function() {
            $.get('{{ url('/messages_admin') }}', {
                ajax: true,
                role_name: $(this).val(),
                admin_id: '{{ $userAuth->id }}'
            }).done(function(data) {

                var list = '';
                if (data.data.length == 0) {
                    list = 'User tidak ditemukan!';
                } else {
                    for (var i = 0; i < data.data.length; i++) {
                        list += "<li class='list-group-item' data-id_pengirim='{{ $userAuth->id }}' data-id_penerima='"+data.data[i].id+"' data-penerima='"+data.data[i].name+"' data-role_penerima='"+data.data[i].role_name+"'>"+data.data[i].role_name+"</li>";
                    }
                }
                $('#list_produk_msg').html(list);

                // call show_msg func
                show_msg();

            }).fail(function(err) {
                console.log(err.responseJSON);
            });
        });

    });
</script>
@endsection

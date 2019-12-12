@extends('layouts.main')

@section('card-header', 'Pesan')

@section('content')
<script>
    // function openMessage(evt, cityName) {
    // var i, tabcontent, tablinks, hilang;
    // tabcontent = document.getElementsByClassName("tabcontent");
    // for (i = 0; i < tabcontent.length; i++) {
    //   tabcontent[i].style.display = "none";
    // }
    // hilang = document.getElementsByClassName("hilang");
    // for (i = 0; i < hilang.length; i++) {
    //   hilang[i].style.display = "none";
    // }

    // tablinks = document.getElementsByClassName("tablinks");
    // for (i = 0; i < tablinks.length; i++) {
    //   tablinks[i].className = tablinks[i].className.replace(" active", "");
    // }
    //   document.getElementById(cityName).style.display = "block";
    //   evt.currentTarget.className += "active";
    // }
    //  function hide(id)
    // {
    //   if (is_hide == true) {
    //     document.getElementById(id).style.display = 'block';
    //     is_hide = false;
    //   }
    //   else {
    //     document.getElementById(id).style.display = 'none';
    //     is_hide = true;
    //   }
    // }

</script>

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

                    <input class="form-control mb-3" type="text" name="" placeholder="Search..">

                    {{-- <a href="#message" class="tablinks" onclick="openMessage(event, 'message')"> --}}

                    <ul class="list-group tablinks">
                        <li id="message" class="list-group-item" onclick="listActive(this)">Apply SA</li>
                        <li id="message2" class="list-group-item" onclick="listActive(this)">Pembuatan MOU</li>
                        <li id="message3" class="list-group-item" onclick="listActive(this)">Sign MOU</li>
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
                            <div class="modal-body">
                                <form action="">
                                    <div class="form-group">
                                        <label>Kepada</label>
                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" required>
                                            <option selected>Choose...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Isi Pesan</label>
                                        <textarea class="form-control" id="" rows="3" placeholder="Isi pesan.."></textarea>
                                    </div>
                                    <div class="mt-3">
                                        <button type="reset" class="reset_btn">Reset</button>
                                        <button type="button" class="submit_btn ml-2">Kirim</button>
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
                    <div id="hilang" class="col-lg-7 wrap_content_messages_detail hilang">
                        <img style="width: 350px;" src="{{ asset('images/messages.png') }}" alt="">
                        <h5 class="mt-4 text-none">Klik menu di bagian kiri untuk melihat pesan</h5>
                    </div>
                    <div class="messages_main tabcontent lengit" id="pesan">
                        <nav class="header sticky-top">
                            <h4>Pesan dari tahap sertifikasi Apply SA</h4>
                        </nav>
                        <hr>
                        <div class="mt-3">
                            <p>Alyssa <span class="pemasaran">Pemasaran</span></p>
                            <div class="mx-3">
                                <div class="sender">
                                    <p>Ini adalah isi pesan dari pengirim</p>
                                </div>
                                <div class="sender">
                                    <p>Ini adalah isi pesan dari pengirim <br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique maiores optio autem mollitia labore atque possimus est esse, sit, facere consectetur vero a, fugit omnis, exercitationem minima aliquid. Molestias, soluta.</p>
                                </div>
                                <div class="sender">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique maiores optio autem mollitia labore atque possimus est esse, sit, facere consectetur vero a, fugit omnis, exercitationem minima aliquid. Molestias, soluta.</p>
                                </div>
                                <p class="small_txt text-right mt-2">15/11 12:30</p>
                            </div>
                        </div>

                        <div class="mt-3">
                            <p><b>Anda</b></p>
                            <div class="mt-2 mx-3">
                                <div class="receiver">
                                    <p>Ini adalah Pesan dari penerima <br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore sint rem magnam voluptas recusandae maxime vel, eos explicabo earum sunt omnis ex accusamus non, debitis illum obcaecati necessitatibus suscipit distinctio.</p>
                                </div>
                                <div class="receiver">
                                    <p>Ini adalah Pesan dari penerima</p>
                                </div>
                                <div class="receiver">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt sint quod id dolor totam inventore ut voluptatum quo beatae, enim, natus sequi hic blanditiis reiciendis tenetur minus optio dolore eum.</p>
                                </div>
                                <p class="small_txt text-right mt-2">15/11 14:30</p>
                            </div>
                        </div>
                    </div>
                    <div class="messages_main tabcontent lengit" id="pesan2">
                        <nav class="header sticky-top">
                            <h4>Pesan dari tahap Pembuatan MOU</h4>
                        </nav>
                        <hr>
                        <div class="mt-3">
                            <p>Pemasaran</p>
                            <div class="sender">
                                <p>Ini adalah isi pesan dari pengirim</p>
                            </div>
                            <div class="sender">
                                <p>Ini adalah isi pesan dari pengirim <br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique maiores optio autem mollitia labore atque possimus est esse, sit, facere consectetur vero a, fugit omnis, exercitationem minima aliquid. Molestias, soluta.</p>
                            </div>
                            <div class="sender">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique maiores optio autem mollitia labore atque possimus est esse, sit, facere consectetur vero a, fugit omnis, exercitationem minima aliquid. Molestias, soluta.</p>
                            </div>
                            <p class="small_txt text-right mt-2">15/11 12:30</p>
                        </div>

                        <div class="mt-3">
                            <p><b>Anda</b></p>
                            <div class="receiver">
                                <p>Ini adalah Pesan dari penerima <br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore sint rem magnam voluptas recusandae maxime vel, eos explicabo earum sunt omnis ex accusamus non, debitis illum obcaecati necessitatibus suscipit distinctio.</p>
                            </div>
                            <div class="receiver">
                                <p>Ini adalah Pesan dari penerima</p>
                            </div>
                            <div class="receiver">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt sint quod id dolor totam inventore ut voluptatum quo beatae, enim, natus sequi hic blanditiis reiciendis tenetur minus optio dolore eum.</p>
                            </div>
                            <p class="small_txt text-right mt-2">15/11 14:30</p>
                        </div>
                    </div>
                    <div class="messages_main tabcontent lengit" id="pesan3">
                        <nav class="header sticky-top">
                            <h4>Pesan dari tahap sertifikasi Sign MOU</h4>
                        </nav>
                        <hr>
                        <div class="mt-3">
                            <p>Pemasaran</p>
                            <div class="sender">
                                <p>Ini adalah isi pesan dari pengirim</p>
                            </div>
                            <div class="sender">
                                <p>Ini adalah isi pesan dari pengirim <br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique maiores optio autem mollitia labore atque possimus est esse, sit, facere consectetur vero a, fugit omnis, exercitationem minima aliquid. Molestias, soluta.</p>
                            </div>
                            <div class="sender">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique maiores optio autem mollitia labore atque possimus est esse, sit, facere consectetur vero a, fugit omnis, exercitationem minima aliquid. Molestias, soluta.</p>
                            </div>
                            <p class="small_txt text-right mt-2">15/11 12:30</p>
                        </div>

                        <div class="mt-3">
                            <p><b>Anda</b></p>
                            <div class="receiver">
                                <p>Ini adalah Pesan dari penerima <br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore sint rem magnam voluptas recusandae maxime vel, eos explicabo earum sunt omnis ex accusamus non, debitis illum obcaecati necessitatibus suscipit distinctio.</p>
                            </div>
                            <div class="receiver">
                                <p>Ini adalah Pesan dari penerima</p>
                            </div>
                            <div class="receiver">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt sint quod id dolor totam inventore ut voluptatum quo beatae, enim, natus sequi hic blanditiis reiciendis tenetur minus optio dolore eum.</p>
                            </div>
                            <p class="small_txt text-right mt-2">15/11 14:30</p>
                        </div>
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

    $(document).ready(function() {
        $('#message').click(function() {
            $('#pesan').show();
            $('#pesan2').hide();
            $('#pesan3').hide();
            $('#hilang').hide();

        })

        $('#message2').click(function() {
            $('#pesan2').show();
            $('#pesan').hide();
            $('#pesan3').hide();
            $('#hilang').hide();
        })

        $('#message3').click(function() {
            $('#pesan3').show();
            $('#pesan').hide();
            $('#pesan2').hide();
            $('#hilang').hide();
        })
    })

    function listActive(elem) {
        var li = document.getElementsByClassName('list-group-item')
        for (i = 0; i < li.length; i++) {
            li[i].classList.remove('list-group-active')
        }
        elem.classList.add('list-group-active');
    }

</script>
@endsection

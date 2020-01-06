<button type="button" class="add_messages_floating" data-toggle="modal" data-target="#modalTambahPesan">
    <img style="width: 30px;" src="{{ asset('images/icon/help.svg') }}" alt=""> &nbsp; Kirim Pesan
</button>

<!-- Modal -->
<div class="modal fade" id="modalTambahPesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Kirim Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="message_send" method="POST" action="
                @if($role != 'client')
                    @if(!is_null($produk) && !is_null($produk->request_sert))
                    {{ url('/message_send/'.$idProduk.'/'.AppHelper::instance()->getMessageParam($kode_tahap, $tahap_sert, $produk->request_sert)['receiver_id'].'/'.$user->id) }}
                    @else
                    {{ url('/message_send/'.$idProduk.'/'.AppHelper::instance()->getMessageParam($kode_tahap, $tahap_sert, null)['receiver_id'].'/'.$user->id) }}
                    @endif
                @else
                    @if(!is_null($produk) && !is_null($produk->request_sert))
                    {{ url('/message_send/'.$idProduk.'/'.AppHelper::instance()->getMessageParam($kode_tahap, $tahap_sert, $produk->request_sert)['receiver_id']) }}
                    @else
                    {{ url('/message_send/'.$idProduk.'/'.AppHelper::instance()->getMessageParam($kode_tahap, $tahap_sert, null)['receiver_id']) }}
                    @endif
                @endif
                ">
                    @csrf
                    <div class="form-group">
                        <label for="">Kepada</label>
                        <div class="row">
                        @if($role == 'client')
                            @if(!is_null($produk) && !is_null($produk->request_sert))
                                <div class="col-lg-6"><b>{{ \AppHelper::instance()->getMessageProp($kode_tahap, $tahap_sert, $produk->request_sert, $role)[2] }}</b></div>
                                <div class="col-lg-6">
                                    <label class="badge badge-secondary">{{ \AppHelper::instance()->getMessageProp($kode_tahap, $tahap_sert, $produk->request_sert, $role)[0] }}</label>
                                </div>
                            @else
                                <div class="col-lg-6"><b>{{ \AppHelper::instance()->getMessageProp($kode_tahap, $tahap_sert, null, $role)[2] }}</b></div>
                                <div class="col-lg-6">
                                    <label class="badge badge-secondary">{{ \AppHelper::instance()->getMessageProp($kode_tahap, $tahap_sert, null, $role)[0] }}</label>
                                </div>
                            @endif
                        @else
                            <div class="col-lg-6"><b>{{ $user->name }}</b></div>
                            <div class="col-lg-6">
                                <label class="badge badge-secondary">{{ $user->nama_perusahaan }}</label>
                            </div>
                        @endif
                        </div>
                        {{-- <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option value="1">Pemasaran</option>
                            <option value="2">Kerjasama</option>
                            <option value="3">Sertifikasi</option>
                        </select> --}}
                        {{-- <input class="form-control" type="text" value="Rudi H" readonly> --}}
                    </div>
                    {{-- <div class="form-group">
                        <label for="">Produk</label>
                        <input class="form-control" type="text" value="{{ $produk->produk }}" readonly>
                    </div> --}}
                    <div class="form-group">
                        <label for="">Tahap Sertifikasi</label><br>
                        {{-- <input class="form-control" type="text" value="{{ \AppHelper::instance()->getMessageProp($kode_tahap, $tahap_sert)[1] }}" readonly> --}}
                        <b>{{ \AppHelper::instance()->getMessageProp($kode_tahap, $tahap_sert, null)[1] }}</b>
                    </div>
                    <div class="form-group">
                        <label for="">Isi Pesan</label>
                        <textarea class="form-control pesan" name="pesan" cols="30" rows="3" placeholder="Isi pesan.."></textarea>
                        <small class="form-text text-muted">wajib diisi</small>
                    </div>
                    <div class="validMsgSend"></div>
                    <div class="modal-footer">
                        <button type="reset" class="reset_btn">Reset</button>
                        <button type="button" class="submit_btn ml-3" onclick="ValidateSize('', '.pesan', '#message_send', '.validMsgSend')">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

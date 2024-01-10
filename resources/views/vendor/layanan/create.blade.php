@extends('app')

@section('header', 'Tambah Vendor')

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('layanan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" class="form-control" name="harga">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Jenis Layanan</label>
                                    <select class="form-control" name="jenis_layanan">
                                        <option value="foto_video">Fotografi & Videografi</option>
                                        <option value="katering">Katering</option>
                                        <option value="dekorasi">Dekorasi</option>
                                        <option value="rias">Rias Pengantin & Tatanan Rambut</option>
                                        <option value="busana">Busana Pengantin</option>
                                        <option value="undangan">Undangan & Desain Grafis</option>
                                        <option value="kord_pernikahan">Koordinator Pernikahan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">kontak</label>
                                    <input type="text" class="form-control" name="kontak">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Latidude & Longitude</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="input-lat" placeholder="Latitude"
                                            name="latitude">
                                        <input type="text" class="form-control" id="input-lng" placeholder="Longitude"
                                            name="longitude">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Gambar Utama / Thumbnail</label>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <img class="preview mb-3 text-center" src="{{ asset('assets/img/noimage.jpg') }}" />
                                </div>
                            </div>
                            <div class="mb-4">
                                <input required name="gambar" class="form-control" id="uploadThumbnail" type="file" data-preview=".preview" accept="image/png, image/jpeg"  width="100%">
                              </div>
                              <div class="mb-3">
                                <h5>Panduan unggah gambar</h5>
                                <ol>
                                  <li>Resolusi gambar yang di unggah, <b>1280 x 720</b></li>
                                  <li>Ukuran gambar tidak lebih dari <b>1 Mb</b></li>
                                </ol>
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Lengkap / Letak</label>
                            <textarea name="letak" id="" cols="30" rows="10" class="form-control" style="height: 100px"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea name="keterangan" id="" cols="30" rows="10" class="form-control" style="height: 100px"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="card-body row" id="fotoSliderBody">
                                <div class="col-md-12 wrapper-foto-slider">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img class="sliderPreview" src="{{ asset('assets/img/noimage.jpg') }}"
                                                width="100%">
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="row">
                                                <div class="col-12 mb-2">
                                                    <input required class="form-control" name="galleries_foto[]"
                                                        id="uploadThumbnail" type="file" data-preview=".sliderPreview"
                                                        accept="image/png, image/jpeg">
                                                    <little><sup>*</sup> wajib</little>

                                                </div>
                                                <div class="col-12 mb-2">
                                                    <textarea name="caption_galleries_foto[]" required maxlength="100" class="form-control" id="captionFoto" rows="2"
                                                        placeholder="masukkan caption disini"></textarea>
                                                    <little><sup>*</sup> maksimsal 100 karakter</little>
                                                </div>
                                                {{-- <div class="col-12 mb-2">
                                          <textarea name="caption_slider_foto_english[]" maxlength="100" class="form-control" id="captionFotoEn" rows="2" placeholder="insert caption here"></textarea>
                                          <little><sup>*</sup>english caption, max 100 character</little>
                                        </div> --}}
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <button type="button" class="btn btn-danger btn-hapus-foto" disabled="">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-info" id="tambahFoto">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var i = 1;
        var x = 1;
        $("#tambahFoto").click(function() {
            i++;
            if (x < 100) {
                x++;
                document.querySelector('#fotoSliderBody').insertAdjacentHTML(
                    'beforeend',
                    `<div class="col-md-12 wrapper-foto-slider" data-id="` + i + `">
              <div class="row">
                <div class="col-sm-4">
                  <img src="{{ asset('assets/img/noimage.jpg') }}" width="100%" class="sliderPreview` + i +
                    `" name="preview-slider` + i +
                    `">
                </div>
                <div class="col-sm-7">
                  <div class="row">
                    <div class="col-12 mb-2">
                      <input required class="form-control" name="galleries_foto[]" id="uploadThumbnail" type="file" data-preview=".sliderPreview` +
                    i +
                    `" accept="image/png, image/jpeg">
                      <little><sup>*</sup> wajib</little>

                    </div>
                    <div class="col-12 mb-2">
                      <textarea name="caption_galleries_foto[]" required maxlength="100" class="form-control" id="captionFoto" rows="2" placeholder="masukkan caption disini" name="captionFoto` +
                    i + `"></textarea>
                      <little><sup>*</sup> maksimsal 100 karakter</little>
                    </div>

                  </div>
                </div>
                <div class="col-sm-1">
                  <button class="btn btn-danger btn-hapus-foto" data-id="` + i + `">
                    <i class="fa fa-trash-alt"></i>
                  </button>
                </div>
              </div>
            </div>`
                )

                sliderPreview();
            } else {
                alert("Sudah melebihi batas")
            }
            console.log(x);
        });

        $('#fotoSliderBody').on('click', '.btn-hapus-foto', function(e) {
            x--;
            console.log(x);
            let id = $(this).data('id');
            // alert(id);
            $('.wrapper-foto-slider[data-id="' + id + '"]').remove();
        });

        $(function() {
            $("input[data-preview]").change(function() {
                var input = $(this);
                var oFReader = new FileReader();
                oFReader.readAsDataURL(this.files[0]);
                oFReader.onload = function(oFREvent) {
                    $(input.data('preview')).attr('src', oFREvent.target.result);
                };
            });
        })

        function sliderPreview() {
            if (x > 1) {
                $('#fotoSliderBody').find('.wrapper-foto-slider').each(function(i, v) {
                    let id = $(this).data('id');
                    // $('.sliderPreview' + id).attr('src', "{{ asset('assets/admin/img/noimage.jpg') }}");
                    $("input[data-preview='.sliderPreview" + id + "']").change(function() {
                        var input = $(this);
                        var oFReader = new FileReader();
                        oFReader.readAsDataURL(this.files[0]);
                        oFReader.onload = function(oFREvent) {
                            $(input.data('preview')).attr('src', oFREvent.target.result);
                        };
                    });
                });
            }
        }
    </script>
@endpush

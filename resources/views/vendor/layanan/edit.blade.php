@extends('app')

@section('header', 'Detail Vendor')

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <a href="#" class="btn btn-success"><i class="fas fa-map-marker-alt"></i> Lihat Peta</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('layanan.update', $vendor) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{$vendor->nama}}">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" class="form-control" name="harga" value="{{$vendor->getRawOriginal('harga')}}">
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
                                    <input type="text" class="form-control" name="kontak" value="{{$vendor->kontak}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Latitude & Longitude</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="input-lat" placeholder="Latitude" name="latitude" value="{{$vendor->latitude}}">
                                        <input type="text" class="form-control" id="input-lng" placeholder="Longitude" name="longitude" value="{{$vendor->longitude}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Gambar Utama / Thumbnail</label>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <img class="preview mb-3 text-center" src="{{ asset('storage/images/vendor/thumbnail/'. $vendor->gambar) }}" width="100%"/>
                                </div>
                            </div>
                            <div class="mb-4">
                                <input name="gambar" class="form-control" id="uploadThumbnail" type="file" data-preview=".preview" accept="image/png, image/jpeg">
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
                            <textarea name="letak" id="" cols="30" rows="10" class="form-control" style="height: 100px">{{$vendor->letak}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea name="keterangan" id="" cols="30" rows="10" class="form-control" style="height: 100px">{{$vendor->keterangan}}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="card-body row" id="fotoSliderBody" data-x="{{count(unserialize($vendor->galeri_foto))}}">
                                @php
                        for( $i = 0; $i < count(unserialize($vendor->galeri_foto)); $i++ ) : @endphp
                            @if( $i != 0 )
                                <div class="col-md-12 wrapper-foto-slider" data-id="{{ $i + 1 }}">
                                    <div class="row">
                                    <div class="col-sm-4">
                                        <img class="sliderPreview" src="{{ asset('storage/images/vendor/galeri/' . unserialize($vendor->galeri_foto)[$i] ) }}" width="100%">
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="row">
                                        <div class="col-12 mb-2">
                                            <input value="{{ asset('storage/images/vendor/galeri/' . unserialize($vendor->galeri_foto)[$i]) }}" class="form-control" name="galleries_foto[]" id="uploadThumbnail" type="file" data-preview=".sliderPreview" accept="image/png, image/jpeg">
                                        </div>
                                        <div class="col-12 mb-2">
                                            <textarea name="caption_galleries_foto[]" required maxlength="100" class="form-control" id="captionFoto" rows="2" placeholder="masukkan caption disini">{{ unserialize($vendor->caption_galeri)[$i] }}</textarea>
                                            <little><sup>*</sup> maksimsal 100 karakter</little>
                                        </div>
                                        {{-- <div class="col-12 mb-2">
                                            <textarea name="caption_slider_foto_english[]" maxlength="100" class="form-control" id="captionFotoEn" rows="2" placeholder="insert caption here">{{ is_null($vendor->caption_slider_foto_english) ? '' : unserialize($vendor->caption_slider_foto_english)[$i] }}</textarea>
                                            <little><sup>*</sup>english caption, max 100 character</little>
                                        </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="button" class="btn btn-danger btn-hapus-foto" {{ $i == 0 ? 'disabled' : '' }} data-id="{{ $i+1 }}">
                                        <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-12 wrapper-foto-slider">
                                    <div class="row">
                                        <div class="col-sm-4">
                                        <img class="sliderPreview" src="{{ asset('storage/images/vendor/galeri/' . unserialize($vendor->galeri_foto)[$i] ) }}" width="100%">
                                        </div>
                                        <div class="col-sm-7">
                                        <div class="row">
                                            <div class="col-12 mb-2">
                                            <input class="form-control" name="galleries_foto[]" id="uploadThumbnail" type="file" data-preview=".sliderPreview" accept="image/png, image/jpeg">
                                            </div>
                                            <div class="col-12 mb-2">
                                            <textarea name="caption_galleries_foto[]" required maxlength="100" class="form-control" id="captionFoto" rows="2" placeholder="masukkan caption disini">{{ unserialize($vendor->caption_galeri)[$i] }}</textarea>
                                            <little><sup>*</sup> maksimsal 100 karakter</little>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-sm-1">
                                        <button type="button" class="btn btn-danger btn-hapus-foto" {{ $i == 0 ? 'disabled' : '' }} data-id="{{ $i+1 }}">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @php
                        endfor;
                        @endphp
                        </div>
                            <button type="button" class="btn btn-primary" id="tambahFoto">
                                <i class="fa fa-plus"></i> Tambah Foto
                            </button>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // var i = 1;
        // var x = 1;
        var lastChildSlide = $('#fotoSliderBody').children().last();
        var i = lastChildSlide.data('id');
        var x = $('#fotoSliderBody').data('x');
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
                      <input required class="form-control" name="galleries_foto[]" id="uploadThumbnail" type="file" data-preview=".sliderPreview` + i + `" accept="image/png, image/jpeg">
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

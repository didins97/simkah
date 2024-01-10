@extends('app')

@section('header', 'PELAYANAN PERNIKAHAN')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-body">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" data-layanan="foto_video">Fotografi & Videografi <span
                                    class="badge badge-primary">{{$vendor->where('jenis_layanan', 'foto_video')->count()}}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-layanan="katering">Katering <span class="badge badge-primary">{{$vendor->where('jenis_layanan', 'katering')->count()}}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-layanan="busana">Busana<span
                                    class="badge badge-primary">{{$vendor->where('jenis_layanan', 'busana')->count()}}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-layanan="rias">Rias dan Tatanan Rambut <span
                                    class="badge badge-primary">{{$vendor->where('jenis_layanan', 'rias')->count()}}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-layanan="undangan">Undangan dan Desain Grafis <span
                                    class="badge badge-primary">{{$vendor->where('jenis_layanan', 'undangan')->count()}}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-layanan="kord_pernikahan">Koordinator Pernikahan <span
                                    class="badge badge-primary">{{$vendor->where('jenis_layanan', 'kord_pernikahan')->count()}}</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        @foreach ($vendor as $item)
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article article-style-b" data-id="{{$item->id}}">
                    <div class="article-header">
                        <div class="article-image" data-background="{{ asset('storage/images/vendor/thumbnail/' . $item->gambar) }}"
                            style="background-image: url(&quot;{{ asset('storage/images/vendor/thumbnail/' . $item->gambar) }}&quot;);">
                        </div>
                        {{-- <div class="article-badge">
                            <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i> Trending</div>
                        </div> --}}
                    </div>
                    <div class="article-details">
                        <div class="article-title">
                            <h2><a href="#">{{$item->nama}}</a></h2>
                        </div>
                        <p>{{ strlen($item->keterangan) > 100 ? substr($item->keterangan, 0, 100) . '...' : $item->keterangan }}</p>
                        <div class="article-cta">
                            <a href="{{ route('user.layanan.detail', $item->id) }}">Lihat Detail <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
    {{-- <div class="float-right">
        {{ $vendor->links('pagination::bootstrap-4') }}
    </div> --}}
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.nav-link:first').addClass('active');
        $('.nav-link').click(function() {
            var layanan = $(this).data('layanan')
            $('.nav-link').removeClass('active');
            $(this).addClass('active');

            $.ajax({
                    type: 'GET',
                    url: '/user/layanan',
                    data: {
                        layanan: layanan
                    },
                    success: function(data) {
                        $('.article').hide();;

                        $.each(data, function(index, vendor) {
                            $('.article[data-id="' + vendor.id + '"]').show();
                        });
                    }
                });
        });
    });
    </script>
@endpush

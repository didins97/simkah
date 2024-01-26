@extends('app')

@section('header', 'Detail Pengguna')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="card author-box">
                    <div class="card-body">
                        <div class="author-box-left">
                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                class="rounded-circle author-box-picture">
                            <div class="clearfix"></div>
                            {{-- <a href="#" class="btn btn-primary mt-3 follow-btn"
                                data-follow-action="alert('follow clicked');"
                                data-unfollow-action="alert('unfollow clicked');">Follow</a> --}}
                            {{-- <div class="profile-widget-items mt-2">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">{{$user->level != 'admin' && $user->level == 'user' ? 'Total Pernikahan' : 'Total Layanan'}}</div>
                                    <div class="profile-widget-item-value">187</div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="author-box-details">
                            <div class="author-box-name">
                                <a href="#">{{ $user->nama_lengkap }}</a>
                            </div>
                            <div class="author-box-job">{{ $user->level }}</div>
                            <div class="author-box-description">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Nama Depan</label>
                                            <input type="text" class="form-control" name="nama_depan"
                                                value="{{ $user->nama_depan }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Nama Belakang</label>
                                            <input type="text" class="form-control" name="nama_belakang"
                                                value="{{ $user->nama_belakang }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label>Nomor WhatsApp</label>
                                    <input type="text" class="form-control" name="nohp" value="{{ $user->nohp }}">
                                </div>
                            </div>
                            <div class="w-100 d-sm-none"></div>
                            <div class="float-right mt-sm-0 mt-3">
                                <button type="submit" class="btn btn-primary">Update <i
                                        class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

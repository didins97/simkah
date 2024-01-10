@extends('app')

@section('header', 'DASHBOARD')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <form action="{{ route('user.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
            <div class="card author-box">
                <div class="card-body">
                    <div class="author-box-left">
                        <img alt="image" src="{{ asset('assets') }}/img/avatar/avatar-1.png"
                            class="rounded-circle author-box-picture">
                        <div class="clearfix"></div>
                    </div>
                    <div class="author-box-details">
                        <div class="author-box-name">
                            <a href="#">Hasan Basri</a>
                        </div>
                        <div class="author-box-job"><b>Total Pernikahan Terdaftar : </b> {{$countPendaftaranNikah}}</div>
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

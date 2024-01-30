
@extends('app')

@section('header', 'Pendaftaran Nikah')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col-12 col-lg-12 offset-lg-12">
                    @include('user.pernikahan.wizzard')
                </div>
            </div>
            <form action="{{ route('user.pernikahan.step-two.store') }}" class="wizard-content mt-2" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="panel panel-primary setup-content" id="step-2">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">Desa/Kelurahan/Wali Nagari</label>
                            <input maxlength="100" type="text" required="required" name="deskel"
                                class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat Lokasi Akad</label>
                            <textarea class="form-control" name="alamat" style="height: 100px" required></textarea>
                        </div>
                        <div class="text-left">
                            <button class="btn btn-primary prevBtn pull-right" data-step="6"
                                type="button">Back</button>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary nextBtn pull-right" type="submit" data-step="2">Next</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/custom/validation.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush



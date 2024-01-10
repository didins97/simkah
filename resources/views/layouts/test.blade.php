<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simkah</title>

    <!-- Favicons -->
    <link href="{{ asset('FE/assets') }}/img/logokemenag.png" rel="icon">
    <link href="{{ asset('FE/assets') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <style>
        /*
    *
    * ==========================================
    * CUSTOM UTIL CLASSES
    * ==========================================
    *
    */

        .border-md {
            border-width: 2px;
        }

        .btn-facebook {
            background: #405D9D;
            border: none;
        }

        .btn-facebook:hover,
        .btn-facebook:focus {
            background: #314879;
        }

        .btn-twitter {
            background: #42AEEC;
            border: none;
        }

        .btn-twitter:hover,
        .btn-twitter:focus {
            background: #1799e4;
        }

        .btn-primary,
        .btn-primary.disabled {
            box-shadow: 0 2px 6px #acb5f6;
            background-color: #6777ef;
            border-color: #6777ef;
        }

        .btn-primary:focus,
        .btn-primary.disabled:focus {
            background-color: #394eea !important;
        }

        .btn-primary:focus:active,
        .btn-primary.disabled:focus:active {
            background-color: #394eea !important;
        }

        .btn-primary:active,
        .btn-primary:hover,
        .btn-primary.disabled:active,
        .btn-primary.disabled:hover {
            background-color: #394eea !important;
        }



        /*
    *
    * ==========================================
    * FOR DEMO PURPOSES
    * ==========================================
    *
    */

        body {
            min-height: 100vh;
        }

        .form-control:not(select) {
            padding: 1.5rem 0.5rem;
        }

        select.form-control {
            height: 52px;
            padding-left: 0.5rem;
        }

        .form-control::placeholder {
            color: #ccc;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .form-control:focus {
            box-shadow: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row py-5 mt-4 align-items-center">
            <!-- For Demo Purpose -->
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                <img src="{{ asset('assets/img/image.jpg') }}" alt="" class="img-fluid mb-3 d-none d-md-block">
                <h1>Sistem Informasi Manajemen Nikah</h1>
                <p class="font-italic text-muted mb-0">Kami Menawarkan Solusi Modern untuk Membantu Pernikahan Anda</p>
            </div>

            <!-- Registeration Form -->
            <div class="col-md-7 col-lg-6 ml-auto">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('assets') }}/modules/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#inputJob').change(function(e) {
                if ($('#role').val() === 'vendor') {
                    $("#inputNik").remove();
                    $('#inputJob').after(
                        `<div class="input-group col-lg-12 mb-4" id="inputPerusahan">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-phone-square text-muted"></i>
                                </span>
                            </div>
                            <input id="Perusahaan" type="text" name="nama_perusahan" placeholder="Nama Perusahan"
                                class="form-control bg-white border-md border-left-0 pl-3" required>
                        </div>`
                    );
                } else {
                    $("#inputPerusahan").remove();
                    $('#inputJob').after(
                        `<div class="input-group col-lg-12 mb-4" id="inputNik">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-phone-square text-muted"></i>
                                </span>
                            </div>
                            <input id="Nik" type="text" name="nik" placeholder="Nomor Induk Kependudukan"
                                class="form-control bg-white border-md border-left-0 pl-3" required>
                        </div>`
                    );
                }

            });
        });
    </script>

</body>

</html>

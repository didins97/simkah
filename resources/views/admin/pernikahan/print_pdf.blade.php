{{-- <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'> --}}
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        height: 100%;
    }

    body {
        min-height: 100%;
        background: #eee;
        font-family: "Lato", sans-serif;
        font-weight: 400;
        color: #222;
        font-size: 14px;
        line-height: 26px;
        padding-bottom: 50px;
    }

    .container {
        max-width: 700px;
        background: #fff;
        margin: 0px auto 0px;
        box-shadow: 1px 1px 2px #dad7d7;
        border-radius: 3px;
        padding: 40px;
        margin-top: 50px;
    }

    .header {
        margin-bottom: 30px;
    }

    .header .full-name {
        font-size: 40px;
        text-transform: uppercase;
        margin-bottom: 5px;
    }

    .header .first-name {
        font-weight: 700;
    }

    .header .last-name {
        font-weight: 300;
    }

    .header .contact-info {
        margin-bottom: 20px;
    }

    .header .email,
    .header .phone {
        color: #999;
        font-weight: 300;
    }

    .header .separator {
        height: 10px;
        display: inline-block;
        border-left: 2px solid #999;
        margin: 0px 10px;
    }

    .header .position {
        font-weight: bold;
        display: inline-block;
        margin-right: 10px;
        text-decoration: underline;
    }

    .details {
        line-height: 20px;
    }

    .details .section {
        margin-bottom: 40px;
    }

    .details .section:last-of-type {
        margin-bottom: 0px;
    }

    .details .section__title {
        letter-spacing: 2px;
        color: #54afe4;
        font-weight: bold;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .details .section__list-item {
        margin-bottom: 40px;
    }

    .details .section__list-item:last-of-type {
        margin-bottom: 0;
    }

    .details .left,
    .details .right {
        vertical-align: top;
        display: inline-block;
    }

    .details .left {
        width: 60%;
    }

    .details .right {
        text-align: right;
        width: 39%;
    }

    .details .name {
        font-weight: bold;
    }

    details a {
        text-decoration: none;
        color: #000;
        font-style: italic;
    }

    details a:hover {
        text-decoration: underline;
        color: #000;
    }

    details .skills {}

    details .skills__item {
        margin-bottom: 10px;
    }

    details .skills__item .right {
        input {
            display: none;
        }

        label {
            display: inline-block;
            width: 20px;
            height: 20px;
            background: #c3def3;
            border-radius: 20px;
            margin-right: 3px;
        }

        input:checked+label {
            background: #79a9ce;
        }
    }

    .header {
        margin-bottom: 30px;
    }

    .header .full-name {
        font-size: 40px;
        text-transform: uppercase;
        margin-bottom: 5px;
    }
</style>
<div class="container">
    <div class="header">
        <div class="full-name">
            <span class="first-name">Pendaftaran Nikah</span>
        </div>
        <div class="contact-info">
            <span class="email">Email: </span>
            <span class="email-val">kuakabmorotai@gmail.com</span>
            <span class="separator"></span>
            <span class="phone">website: </span>
            <span class="phone-val">simkahv.com</span>
        </div>
    </div>
    <div class="details">
        <div class="section">
            <div class="section__title">Pernikahan</div>
            <div class="section__list-item">
                <div class="left">
                    <div class="name">Kode Pendaftar</div>
                    <div class="addr">Kecamatan</div>
                    <div class="duration">Tanggal Nikah</div>
                    <div class="duration">Desa/Kelurahan</div>
                </div>
                <div class="right">
                    <div class="name">{{$pernikahan->kode_pendaftar}}</div>
                    <div class="addr">{{$pernikahan->kecamatan->nama}}</div>
                    <div class="duration">{{ \Carbon\Carbon::parse($pernikahan->tanggal_nikah)->format('d F Y') }}</div>
                    <div class="duration">Muhajirin</div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="section__title">Calon Pengantin</div>
            <div class="section__list">
                <div class="section__list-item">
                    <div class="left">
                        <div class="addr">Nama Suami</div>
                        <div class="addr">NIK Suami</div>
                        <div class="addr">Nama Istri</div>
                        <div class="addr">Nik Istri</div>
                    </div>
                    <div class="right">
                        <div class="desc">{{$pernikahan->calpenPria->nama}}</div>
                        <div class="desc">{{$pernikahan->calpenPria->nama_ayah}}</div>
                        <div class="desc">{{$pernikahan->calpenWanita->nama}}</div>
                        <div class="desc">{{$pernikahan->calpenWanita->nama_ayah}}</div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="section">
            <div class="section__title">Projects</div>
            <div class="section__list">
                <div class="section__list-item">
                    <div class="name">DSP</div>
                    <div class="text">I am a front-end developer with more than 3 years of experience writing html,
                        css, and js. I'm motivated, result-focused and seeking a successful team-oriented company with
                        opportunity to grow.</div>
                </div>

                <div class="section__list-item">
                    <div class="name">DSP</div>
                    <div class="text">I am a front-end developer with more than 3 years of experience writing html,
                        css, and js. I'm motivated, result-focused and seeking a successful team-oriented company with
                        opportunity to grow. <a href="/login">link</a>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="section">
            <div class="section__title">Persyaratan Dokumen Suami</div>
            <ul>
                <li>Surat Keterangan Untuk Nikah (Didapat dari Kelurahan)</li>
                <li>Persetujuan Calon Mempelai</li>
                <li>FotoKopi Akta Kelahiran</li>
                <li>FotoKopi KTP</li>
                <li>FotoKopi Kartu Keluarga</li>
                <li> Paspoto 2x3 4 Lembar</li>
                <li> Paspoto 4x6 4 Lembar</li>
                <li> Surat Izin Orang Tua</li>
                @foreach ($pernikahan->dokumen as $dokumen)
                    @if ($dokumen->pivot->status_calpen_pria == 1)
                        <li>{{ $dokumen->nama }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="section">
            <div class="section__title">Persyaratan Dokumen Istri</div>
            <ul>
                <li>Surat Keterangan Untuk Nikah (Didapat dari Kelurahan)</li>
                <li>Persetujuan Calon Mempelai</li>
                <li>FotoKopi Akta Kelahiran</li>
                <li>FotoKopi KTP</li>
                <li>FotoKopi Kartu Keluarga</li>
                <li> Paspoto 2x3 4 Lembar</li>
                <li> Paspoto 4x6 4 Lembar</li>
                <li> Surat Izin Orang Tua</li>
                @foreach ($pernikahan->dokumen as $dokumen)
                    @if ($dokumen->pivot->status_calpen_wanita == 1)
                        <li>{{ $dokumen->nama }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="section">
            <div class="section__title">
                Interests
            </div>
            <div class="section__list">
                <div class="section__list-item">
                    Football, programming.
                </div>
            </div>
        </div>
    </div>
</div>

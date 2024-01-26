@extends('app')

@section('header', 'Pendaftaran Nikah')

@section('content')
    @if ($pernikahanCount > 0)
    <div class="alert alert-primary">
        Lihat Pernikahan Yang Sudah Terdaftar <a href="{{ route('user.pernikahan.index') }}"><b>Disini</b></a>
      </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col-12 col-lg-12 offset-lg-12">
                    <div class="wizard-steps">
                        <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                                <i class="far fa-calendar"></i>
                            </div>
                            <div class="wizard-step-label">
                                Jadwal
                            </div>
                        </div>
                        <div class="wizard-step">
                            <div class="wizard-step-icon">
                                <i class="fas fa-box-open"></i>
                            </div>
                            <div class="wizard-step-label">
                                Lokasi
                            </div>
                        </div>
                        <div class="wizard-step">
                            <div class="wizard-step-icon">
                                <i class="fas fa-male"></i>
                            </div>
                            <div class="wizard-step-label">
                                Calon Suami
                            </div>
                        </div>
                        <div class="wizard-step">
                            <div class="wizard-step-icon">
                                <i class="fas fa-female"></i>
                            </div>
                            <div class="wizard-step-label">
                                Calon Istri
                            </div>
                        </div>
                        <div class="wizard-step">
                            <div class="wizard-step-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <div class="wizard-step-label">
                                Wali Nikah
                            </div>
                        </div>
                        <div class="wizard-step">
                            <div class="wizard-step-icon">
                                <i class="fas fa-file"></i>
                            </div>
                            <div class="wizard-step-label">
                                Data Dokumen
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form class="wizard-content mt-2" enctype="multipart/form-data">
                @include('user.pernikahan.steps.jadwal')
                @include('user.pernikahan.steps.lokasi')
                @include('user.pernikahan.steps.calon_suami')
                @include('user.pernikahan.steps.calon_istri')
                @include('user.pernikahan.steps.wali_nikah')
                @include('user.pernikahan.steps.dokumen')
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/custom/validation.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            var currentStep = 1;

            // Hide all steps except the first one
            $('.setup-content').hide();
            $('#step-' + currentStep).show();
            updateWizardSteps(currentStep);

            // Next button click event
            $('.nextBtn').click(function() {
                var inputElements = $(
                    `#step-${currentStep} .form-control, #step-${currentStep} .form-check-input`)
                var formData = {};
                var validationErrors = [];

                formData['currentStep'] = currentStep

                // add data ini formData
                inputElements.each(function() {
                    var inputName = $(this).attr("name")
                    var inputValue = $(this).val()

                    if ($(this).is(":checkbox")) {
                        inputValue = $(this).is(":checked") ? 1 :
                            0; // Ubah ke 1 jika dicentang, 0 jika tidak
                    } else {
                        inputValue = $(this).val();
                    }

                    formData[inputName] = inputValue
                })

                // console.log(formData);

                $.ajax({
                    type: 'POST',
                    url: '/user/pendaftaran-nikah',
                    data: {
                        formData,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(data) {
                        var nextStep = currentStep + 1;
                        $('#step-' + currentStep).hide();
                        $('#step-' + nextStep).show();
                        currentStep = nextStep;
                        updateWizardSteps(currentStep);

                        console.log(data);

                        if (currentStep === 6) {
                            const validationRules = {
                                "1": {
                                    "nikah_di": {
                                        value: (value) => value === 'di_luar',
                                        elementsToCheck: ["surat_rekom_nikah_i",
                                            "surat_rekom_nikah_s"
                                        ],
                                    },
                                },
                                "3": {
                                    "status_s": {
                                        value: (value) => value === 'ch',
                                        elementsToCheck: ["surat_akta_cerai_s"],
                                    },
                                    "status_s": {
                                        value: (value) => value === 'cm' || value === 'ch',
                                        elementsToCheck: (value) => {
                                            if (value === 'ch') {
                                                return ["surat_akta_cerai_s"];
                                            } else if (value === 'cm') {
                                                return ["surat_akta_kematian_s"];
                                            } else {
                                                return [];
                                            }
                                        },
                                    },
                                    "umur_s": {
                                        value: (value) => value < 19,
                                        elementsToCheck: ["surat_dispen_dibawah_umur_s"],
                                    },
                                    "peker_s": {
                                        value: (value) => value === 'Polisi' || value ===
                                            'Tentara',
                                        elementsToCheck: ["surat_izin_komandan_s"],
                                    },
                                    "wn_s": {
                                        value: (value) => value === 'wna',
                                        elementsToCheck: ["surat_izin_kedutaan_wna_s"],
                                    },
                                },
                                "4": {
                                    "status_i": {
                                        value: (value) => value === 'ch' || value === 'cm',
                                        elementsToCheck: (value) => {
                                            if (value === 'ch') {
                                                return ["surat_akta_cerai_i"];
                                            } else if (value === 'cm') {
                                                return ["surat_akta_kematian_i"];
                                            } else {
                                                return [];
                                            }
                                        },
                                    },
                                    "umur_i": {
                                        value: (value) => value < 19,
                                        elementsToCheck: ["surat_dispen_dibawah_umur_i"],
                                    },
                                    "peker_i": {
                                        value: (value) => value === 'Polisi' || value ===
                                            'Tentara',
                                        elementsToCheck: ["surat_izin_komandan_i"],
                                    },
                                    "wn_i": {
                                        value: (value) => value === 'wna',
                                        elementsToCheck: ["surat_izin_kedutaan_wna_i"],
                                    },
                                },
                            };

                            for (const key in validationRules) {
                                const fields = validationRules[key];
                                for (const field in fields) {
                                    const {
                                        value,
                                        elementsToCheck
                                    } = fields[field];
                                    const fieldValue = data[key][field];

                                    if (value(fieldValue)) {
                                        const elementsToCheckForValue = Array.isArray(
                                                elementsToCheck) ? elementsToCheck :
                                            elementsToCheck(fieldValue);
                                        elementsToCheckForValue.forEach(fieldName => {
                                            $(`input[name="${fieldName}"]`).prop(
                                                'checked', true);
                                        });
                                    }
                                }
                            }
                        }

                        if (currentStep === 7) {
                            fetch('/clear-cache', {
                                    method: 'GET'
                                })
                                .then(response => response.json())
                                .then(data => {
                                    Swal.fire({
                                        title: "Sukses!",
                                        text: "Data berhasil divalidasi.",
                                        icon: "success",
                                        timer: 2000, // Tampilkan pesan selama 2 detik
                                        showConfirmButton: false, // Sembunyikan tombol OK
                                        onClose: () => {
                                            window.location.replace('http://127.0.0.1:8000/user/pendaftaran-nikah');
                                        }
                                    });
                                })
                                .catch(error => {
                                    console.error('Gagal menghapus cache: ' + error);
                                });
                        }

                        const stepData = data[currentStep];
                        for (const key in stepData) {
                            const value = stepData[key];
                            const element = $(`[name="${key}"]`)
                            if (element.length > 0) {
                                if (element.is(':checkbox')) {
                                    element.prop('checked', Boolean(value));
                                } else if (element.is('textarea')) {
                                    element.val(value);
                                } else if (element.is('select')) {
                                    element.val(value);
                                } else if (element.is('input[type="file"]')) {

                                } else {
                                    element.val(value);
                                }
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);

                        if (xhr.status === 422) {
                            // Menguraikan respons JSON yang berisi pesan-pesan validasi
                            var response = JSON.parse(xhr.responseText);
                            console.log(response.errors);

                            // Iterate melalui pesan-pesan validasi
                            $.each(response.errors, function(key, value) {
                                // Menampilkan pesan error langsung di bawah input yang sesuai
                                var inputName = key.replace('formData.', '');
                                var inputElement = $(`input[name="${inputName}"]`);

                                console.log(inputElement);

                                inputElement.addClass("is-invalid");
                                inputElement.parent().find(".invalid-feedback")
                                    .remove();
                                inputElement.after(
                                    `<div class="invalid-feedback">${value[0]}</div>`
                                );
                            });
                        }
                    }
                });
            });

            // Previous button click event
            $('.prevBtn').click(function() {
                var prevStep = currentStep - 1;
                $('#step-' + currentStep).hide();
                $('#step-' + prevStep).show();
                currentStep = prevStep;
                updateWizardSteps(currentStep);
            });

            function updateWizardSteps(step) {
                $('.wizard-step').removeClass('wizard-step-active');
                $('.wizard-step').eq(step - 1).addClass('wizard-step-active');
            }

            var typingTimer; // Timer untuk menunggu sebelum mengirim permintaan AJAX
            var doneTypingInterval = 1000; // Waktu penundaan (misalnya, 1 detik)

            $("#kordinatLokasi").on('input', function() {
                clearTimeout(typingTimer); // Hapus timer yang ada, jika ada

                // Set timer baru untuk menunggu sebelum mengirim permintaan AJAX
                typingTimer = setTimeout(function() {
                    var selectOption = $("#kordinatLokasi").val();

                    $.ajax({
                        type: "GET",
                        url: "/api/search-location",
                        data: {
                            selectOption,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log(response);
                            var suggestionBox = $("#suggestionBox");
                            suggestionBox.empty(); // Kosongkan suggestionBox

                            response.forEach(function(result) {
                                var suggestionItem = $(
                                    '<div class="suggestion-item">' + result
                                    .place_name + '</div>');
                                suggestionItem.click(function() {
                                    $("#kordinatLokasi").val(result
                                        .place_name);
                                    suggestionBox.empty();
                                    // $("#latitude").val(result.center[0]);
                                    // $("#longitude").val(result.center[1]);

                                    // console.log(result.center[0]);
                                    // console.log($("#latitude").val());

                                    $('input[name="latitude"]').val(
                                        result.center[0]);
                                    $('input[name="longitude"]').val(
                                        result.center[1]);
                                });

                                suggestionBox.append(suggestionItem);
                            });
                        }
                    });
                }, doneTypingInterval);
            });

            $('.input-doc').click(function(e) {
                e.preventDefault();
            });

        });
    </script>
@endpush

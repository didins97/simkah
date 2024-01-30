$(document).ready(function () {

    handleStatus(('#status_ayah'), $('#ayah .ayah'), "nama_ayah")
    handleStatus(('#status_ibu'), $('#ibu .ibu'), "nama_ibu")
    // handleStatusWali(('#status_wali'))
    // handleStatus($(this), $("#ayah .ayah"), "nama_ayah");
    // handleStatus($(this), $("#ibu .ibu"), "nama_ibu");
    // handleWargaNegara($(this), ['#negsal_wali', '#passpor_wali'], '#nik_nip_wali')
    // handleWargaNegara($(this), ['#negsal_ayah', '#passpor_ayah'], '#nik_ayah');
    // handleWargaNegara($(this), ['#negsal_ibu', '#passpor_ibu'], '#nik_ibu');

    $("#status_ayah").change(function () {
        handleStatus($(this), $("#ayah .ayah"), "nama_ayah");
    });

    $("#status_ibu").change(function () {
        handleStatus($(this), $("#ibu .ibu"), "nama_ibu");
    });

    $("#wn_wali").change(function () {
        handleWargaNegara($(this), ['#negsal_wali', '#passpor_wali'], '#nik_nip_wali')
    })

    $("#warga_negara").change(function () {
        handleWargaNegara($(this), ['#negara_asal', '#passpor'], '#nik');
    })

    $("#wn_ayah").change(function () {
        handleWargaNegara($(this), ['#negsal_ayah', '#passpor_ayah'], '#nik_ayah');
    })

    $("#wn_ibu").change(function () {
        handleWargaNegara($(this), ['#negsal_ibu', '#passpor_ibu'], '#nik_ibu');
    })

    $("#status_wali").change(function () {
        handleStatusWali($(this));
    })

    function handleWargaNegara(wargaNegaraElem, inputToDisabled, inputToEneble) {
        var value = wargaNegaraElem.val();

        if (value == "wni") {
            disableInputs(inputToDisabled);
            enableInput(inputToEneble)
        } else if (value == "wna") {
            disableInput(inputToEneble);
            enableInputs(inputToDisabled);
        } else {
            enableInputs([...inputsToDisable, inputToEnable]);
        }
    }

    function handleStatus(statusElem, containerElem, excludedInputName) {
        $(statusElem).is(":checked") ? disableInput(containerElem.not("[name='" + excludedInputName + "']")) : enableInput(containerElem);
    }

    function handleStatusWali(statusElem) {
        var value = statusElem.val();
        if (value == 'hakim') {
            $('.input-wali').not("[name='nama_wali'], [name='alasan_wali_hakim']").prop('disabled', true);
        } else {
            $('.input-wali').prop('disabled', false);
            $('#alasan_wali_hakim').prop('disabled', true)
        }

        console.log(value);
    }

    function disableInputs(inputs) {
        $(inputs.join(', ')).prop('disabled', true);
    }

    function enableInputs(inputs) {
        $(inputs.join(', ')).prop('disabled', false);
    }

    function disableInput(input) {
        $(input).prop('disabled', true);
    }

    function enableInput(input) {
        $(input).prop('disabled', false);
    }

    // if ($('#status_wali').val() = 'nasab') {
    //     $('.input-wali').prop('disabled', false);
    //     $('#alasan_wali_hakim').prop('disabled', true)
    // } else {
    //     $("#ayah .ayah").not("[name='nama_ayah']").prop("disabled", true);
    // }

    // tanggal lahir
    $('#tgl_lahir').change(function (e) {
        var dateOfBirth = new Date($(this).val());
        var newDate = new Date();
        var age = newDate.getFullYear() - dateOfBirth.getFullYear();

        if (dateOfBirth.getMonth() > dateOfBirth.getMonth() || (dateOfBirth.getMonth() ===
            dateOfBirth.getMonth() && dateOfBirth.getDate() > dateOfBirth.getDate())) {
            age--;
        }

        $('#umur').val(age)
    });

    $("#nikahDi").change(function (e) {
        var selectOption = $(this).val();
        switch (selectOption) {
            case "diluar":
                $('#kordinatLokasi').prop('disabled', false);
                break;
            case "dikua":
                $('#kordinatLokasi').prop('disabled', true)
                break;
        }
    });
});

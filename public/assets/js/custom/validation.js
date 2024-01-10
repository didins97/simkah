$(document).ready(function () {
    // change warga negara
    $('#waSuami').change(function (e) {
        var selectOption = $(this).val();
        switch (selectOption) {
            case "wni":
                $('#naSuami, #paspor').prop('disabled', true);
                $('#nik').prop('disabled', false);
                break;
            case "wna":
                $('#naSuami, #paspor').prop('disabled', false);
                $('#nik').prop('disabled', true);
                break;
            default:
                $('#naSuami, #paspor, #nik').prop('disabled', false);
                break;
        }
    });

    $('#wnAyahSuami').change(function (e) {
        var selectOption = $(this).val();
        switch (selectOption) {
            case "wni":
                $('#naAyahSuami, #pasporAyahSuami').prop('disabled', true);
                $('#nikAyahSuami').prop('disabled', false);
                break;
            case "wna":
                $('#naAyahSuami, #pasporAyahSuami').prop('disabled', false);
                $('#nikAyahSuami').prop('disabled', true);
                break;
            default:
                $('#naAyahSuami, #pasporAyahSuami, #nikAyahSuami').prop('disabled', false);
                break;
        }
    });

    $('#wnIbuSuami').change(function (e) {
        var selectOption = $(this).val();
        switch (selectOption) {
            case "wni":
                $('#naIbuSuami, #pasporIbuSuami').prop('disabled', true);
                $('#nikIbuSuami').prop('disabled', false);
                break;
            case "wna":
                $('#naIbuSuami, #pasporIbuSuami').prop('disabled', false);
                $('#nikIbuSuami').prop('disabled', true);
                break;
            default:
                $('#naIbuSuami, #pasporIbuSuami, #nikIbuSuami').prop('disabled', false);
                break;
        }
    });

    $('#wnIstri').change(function (e) {
        var selectOption = $(this).val();
        switch (selectOption) {
            case "wni":
                $('#naIstri, #pasporIstri').prop('disabled', true);
                $('#nikIstri').prop('disabled', false);
                break;
            case "wna":
                $('#naIstri, #pasporIstri').prop('disabled', false);
                $('#nikIstri').prop('disabled', true);
                break;
            default:
                $('#naIstri, #pasporIstri, #nikIstri').prop('disabled', false);
                break;
        }
    });

    $('#wnAyahIstri').change(function (e) {
        var selectOption = $(this).val();
        switch (selectOption) {
            case "wni":
                $('#naAyahIstri, #pasporAyahIstri').prop('disabled', true);
                $('#nikAyahIstri').prop('disabled', false);
                break;
            case "wna":
                $('#naAyahIstri, #pasporAyahIstri').prop('disabled', false);
                $('#nikAyahIstri').prop('disabled', true);
                break;
            default:
                $('#naAyahIstri, #pasporAyahIstri, #nikAyahIstri').prop('disabled', false);
                break;
        }
    });

    $('#wnIbuIstri').change(function (e) {
        var selectOption = $(this).val();
        switch (selectOption) {
            case "wni":
                $('#naIbuIstri, #pasporIbuIstri').prop('disabled', true);
                $('#nikIbuIstri').prop('disabled', false);
                break;
            case "wna":
                $('#naIbuIstri, #pasporIbuIstri').prop('disabled', false);
                $('#nikIbuIstri').prop('disabled', true);
                break;
            default:
                $('#naIbuIstri, #pasporIbuIstri, #nikIbuIstri').prop('disabled', false);
                break;
        }
    });

    $('#wnWali').change(function (e) {
        var selectOption = $(this).val();
        switch (selectOption) {
            case "wni":
                $('#naWali, #pasporWali').prop('disabled', true);
                $('#nikWali').prop('disabled', false);
                break;
            case "wna":
                $('#naWali, #pasporWali').prop('disabled', false);
                $('#nikWali').prop('disabled', true);
                break;
            default:
                $('#naWali, #pasporWali, #nikWali').prop('disabled', false);
                break;
        }
    });

    // tanggal lahir
    $('#tanggal_lahir_suami').change(function (e) {
        var dateOfBirth = new Date($(this).val());
        var newDate = new Date();
        var age = newDate.getFullYear() - dateOfBirth.getFullYear();

        if (dateOfBirth.getMonth() > dateOfBirth.getMonth() || (dateOfBirth.getMonth() ===
            dateOfBirth.getMonth() && dateOfBirth.getDate() > dateOfBirth.getDate())) {
            age--;
        }

        $('#umur_suami').val(age)
    });

    $('#tanggal_lahir_istri').change(function (e) {
        var dateOfBirth = new Date($(this).val());
        var newDate = new Date();
        var age = newDate.getFullYear() - dateOfBirth.getFullYear();

        if (dateOfBirth.getMonth() > dateOfBirth.getMonth() || (dateOfBirth.getMonth() ===
            dateOfBirth.getMonth() && dateOfBirth.getDate() > dateOfBirth.getDate())) {
            age--;
        }

        $('#umur_istri').val(age)
    });

    $("#statusAyahS").change(function () {
        if ($(this).is(":checked")) {
            // Jika dicentang, maka aktifkan input nama dan nonaktifkan input lainnya
            $("#asuami .ayah-suami").not("[name='nama_ayah_s']").prop("disabled", true);
        } else {
            // Jika tidak dicentang, maka aktifkan semua input
            $("#asuami .ayah-suami").prop("disabled", false);
        }
    });

    $("#statusIbuS").change(function () {
        if ($(this).is(":checked")) {
            // Jika dicentang, maka aktifkan input nama dan nonaktifkan input lainnya
            $("#isuami .ibu-suami").not("[name='nama_ibu_s']").prop("disabled", true);
        } else {
            // Jika tidak dicentang, maka aktifkan semua input
            $("#isuami .ibu-suami").prop("disabled", false);
        }
    });

    $("#statusAyahI").change(function (e) {
        if ($(this).is(":checked")) {
            // Jika dicentang, maka aktifkan input nama dan nonaktifkan input lainnya
            $("#aistri .ayah-istri").not("[name='nama_ayah_i']").prop("disabled", true);
        } else {
            // Jika tidak dicentang, maka aktifkan semua input
            $("#aistri .ayah-istri").prop("disabled", false);
        }
    });

    $("#statusIbuI").change(function (e) {
        if ($(this).is(":checked")) {
            // Jika dicentang, maka aktifkan input nama dan nonaktifkan input lainnya
            $("#iistri .ibu-istri").not("[name='nama_ibu_i']").prop("disabled", true);
        } else {
            // Jika tidak dicentang, maka aktifkan semua input
            $("#iistri .ibu-istri").prop("disabled", false);
        }
    });

    $("#statusWali").change(function (e) {
        var selectOption = $(this).val();
        switch (selectOption) {
            case "hakim":
                $('.input-wali').not("[name='nama_w'], [name='alasan_w_hakim']").prop('disabled', true);
                break;
            case "nasab":
                $('.input-wali').prop('disabled', false);
                $('#sebabAlasanHakim').prop('disabled', true)
                break;
        }
    });

    $("#nikahDi").change(function (e) {
        var selectOption = $(this).val();
        switch (selectOption) {
            case "di_luar":
                $('#kordinatLokasi').prop('disabled', false);
                break;
            case "di_kua":
                $('#kordinatLokasi').prop('disabled', true)
                break;
        }
    });

});

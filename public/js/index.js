$(document).ready(function () {
    const optionConfigValidate = {
        debug: false,
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            note: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Không được để trống",
            },
            email: {
                required: "Không được để trống",
                email: "Vui lòng nhập đúng định dạng email",
            },
            note: {
                required: "Không được để trống",
            },
        },
        errorElement: 'span',
        errorClass: 'form-input-error',
        submitHandler: function (form) {
            let formData = new FormData(form);

            formData.append('form_session_id', form.dataset.form_session_id);

            $.ajax({
                url: form.action,
                data: formData,
                method: 'POST',
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $('.loading-wrapper-bg').addClass('show'); // Hiển thị loading nếu cần
                },
                success: function (data) {
                    $('.loading-wrapper-bg').removeClass('show'); // Hiển thị loading nếu cần

                    $("#contactForm")[0].reset();

                    $("#contactForm").validate().resetForm();

                    alert('Gửi thành công');
                },
                error: function (error) {
                    $('.loading-wrapper-bg').removeClass('show'); // Hiển thị loading nếu cần

                    if (error.status === 422) {
                        const listError = error.responseJSON.errors;

                        showErrorResponse(listError);
                    }

                    if (error.status == 302 && error.responseJSON && error.responseJSON.link_redirect) {
                        location.href = error.responseJSON.link_redirect
                        return
                    }

                    if (error.status == 400 && error.responseJSON && error.responseJSON.message) {
                        alert('Không thành công')

                        return
                    }

                    alert('Không thành công')
                }
            });
        }
    };

    const showErrorResponse = (listError) => {

        var errors = {};

        for (var key in listError) {
            if (listError.hasOwnProperty(key)) {
                if (Array.isArray(listError[key])) {
                    errors[key] = listError[key][0];
                }
            }
        }

        $("#contactForm").validate().showErrors(errors);
    }

    $('#contactForm').validate(optionConfigValidate);
});
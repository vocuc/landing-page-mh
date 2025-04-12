$(document).ready(function () {
    const optionConfigValidate = {
        debug: false,
        rules: {
            user_name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            phone: {
                required: true,
            },
        },
        messages: {
            user_name: {
                required: "Không được để trống",
            },
            email: {
                required: "Không được để trống",
                email: "Vui lòng nhập đúng định dạng email",
            },
            phone: {
                required: "Vui lòng nhập thời gian bắt đầu",
            },
        },
        errorElement: 'span',
        errorClass: 'form-input-error',
        submitHandler: function (form) {
            console.log(423423);
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

                    $('#modalContactPay1').modal('hide');
                    console.log(data);

                    setQrPay2(data.link_qr_code)

                    setOriginalPrice(data.price);

                    setDiscountPrice(data.discount_price);

                    setFinalPrice(data.final_price);

                    setIDCode(data.id)

                    setEmailStep3(data.email)

                    // $("#formPay1")[0].reset();

                    $("#payment-code .text").text(data.content);

                    $("#formPay1").validate().resetForm();

                    $('#modalContactPay2').modal('show');
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

                    if (error.status == 429) {
                        alert('Bạn gửi quá nhiều yêu cầu')

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

        $("#formPay1").validate().showErrors(errors);
    }

    $('#formPay1').validate(optionConfigValidate);

    function setQrPay2(qrLink) {
        $('#modalContactPay2 .payment-info .qr img').attr('src', qrLink);
    }

    function setFinalPrice(price) {
        $('#modalContactPay2 .payment-info #final-price').text(price.toLocaleString('de-DE'));
    }

    function setOriginalPrice(price) {
        $('#modalContactPay2 .payment-item #original-price').text(price.toLocaleString('de-DE'));
    }

    function setDiscountPrice(price) {
        $('#modalContactPay2 .payment-item #discount-price').text(price.toLocaleString('de-DE'));
    }

    function setIDCode(id) {
        $('#code-id').val(id);
    }

    function maskEmail(email) {
        const atIndex = email.indexOf('@');

        if (atIndex >= 3) {
            return '***' + email.slice(3);
        }

        return '*'.repeat(atIndex) + email.slice(atIndex);
    }

    function setEmailStep3(email) {
        $('#modalContactPay3 #email-send-code').text(maskEmail(email));
    }

    const optionConfigValidate2 = {
        debug: false,
        rules: {
            code: {
                required: true,
            }
        },
        messages: {
            code: {
                required: "Không được để trống",
            }
        },
        errorElement: 'span',
        errorClass: 'form-input-error',
        submitHandler: function (form) {
            console.log(4234334);
            let formData = new FormData(form);

            if ($('#modalContactPay3 .btn-custom .spinner-border').css('display') == 'none') {
                $.ajax({
                    url: form.action,
                    data: formData,
                    method: 'POST',
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('#modalContactPay3 .btn-custom .spinner-border').show();

                        $('#modalContactPay3 .btn-custom .btn-type-1__icon').hide();
                    },
                    success: function (data) {
                        $('#modalContactPay3 .btn-custom .spinner-border').hide();

                        $('#modalContactPay3 .btn-custom .btn-type-1__icon').show();

                        $('#modalContactPay3').modal('hide');

                        location.href = data.link_redirect

                        $('#formPay3').modal('hide');

                        $("#formPay3")[0].reset();

                        $("#formPay3").validate().resetForm();
                    },
                    error: function (error) {
                        $('#modalContactPay3 .btn-custom .spinner-border').hide();

                        $('#modalContactPay3 .btn-custom .btn-type-1__icon').show();
                        if (error.status === 404) {
                            const listError = {
                                code: ['Mã code không hợp lệ']
                            };

                            showErrorResponse3(listError);

                            return;
                        }

                        if (error.status === 422) {
                            const listError = error.responseJSON.errors;

                            showErrorResponse3(listError);
                        }

                        if (error.status == 302 && error.responseJSON && error.responseJSON.link_redirect) {
                            location.href = error.responseJSON.link_redirect
                            return
                        }

                        if (error.status == 400 && error.responseJSON && error.responseJSON.message) {
                            alert('Không thành công')

                            return
                        }

                        if (error.status == 429) {
                            alert('Bạn gửi quá nhiều yêu cầu')

                            return
                        }

                        alert('Không thành công')
                    }
                });
            }

        }
    };

    const showErrorResponse3 = (listError) => {
        var errors = {};

        for (var key in listError) {
            if (listError.hasOwnProperty(key)) {
                if (Array.isArray(listError[key])) {
                    errors[key] = listError[key][0];
                }
            }
        }

        $("#formPay3").validate().showErrors(errors);
    }

    $('#formPay3').validate(optionConfigValidate2);

    $('#button-open-step3').click(function () {
        $('#modalContactPay2').modal('hide');

        $('#modalContactPay3').modal('show');
    })


    const optionConfigValidate3 = {
        debug: false,
        rules: {
            code: {
                required: true,
            }
        },
        messages: {
            code: {
                required: "Không được để trống",
            }
        },
        errorElement: 'span',
        errorClass: 'form-input-error',
        submitHandler: function (form) {
            console.log(423424234);
            let formData = new FormData(form);
            console.log(423424);
            if ($('#modalContactPay3 .btn-custom .spinner-border').css('display') == 'none') {
                $.ajax({
                    url: form.action,
                    data: formData,
                    method: 'POST',
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('#modalContactPay4 .btn-custom .spinner-border').show();

                        $('#modalContactPay4 .btn-custom .btn-type-1__icon').hide();
                    },
                    success: function (data) {
                        console.log(112);
                        $('#modalContactPay4 .btn-custom .spinner-border').hide();

                        $('#modalContactPay4 .btn-custom .btn-type-1__icon').show();

                        $('#modalContactPay4').modal('hide');

                        location.href = data.link_redirect;

                        $('#formPay4').modal('hide');

                        $("#formPay4")[0].reset();

                        $("#formPay4").validate().resetForm();
                    },
                    error: function (error) {
                        console.log(111);
                        $('#modalContactPay4 .btn-custom .spinner-border').hide();

                        $('#modalContactPay4 .btn-custom .btn-type-1__icon').show();
                        if (error.status === 404) {
                            const listError = {
                                code: ['Mã code không hợp lệ']
                            };

                            showErrorResponse4(listError);

                            return;
                        }

                        if (error.status === 422) {
                            const listError = error.responseJSON.errors;

                            showErrorResponse4(listError);
                        }

                        if (error.status == 302 && error.responseJSON && error.responseJSON.link_redirect) {
                            location.href = error.responseJSON.link_redirect
                            return
                        }

                        if (error.status == 400 && error.responseJSON && error.responseJSON.message) {
                            alert('Không thành công')

                            return
                        }

                        if (error.status == 429) {
                            alert('Bạn gửi quá nhiều yêu cầu')

                            return
                        }

                        alert('Không thành công')
                    }
                });
            }

        }
    };

    const showErrorResponse4 = (listError) => {
        var errors = {};

        for (var key in listError) {
            if (listError.hasOwnProperty(key)) {
                if (Array.isArray(listError[key])) {
                    errors[key] = listError[key][0];
                }
            }
        }
        console.log(34343);
        $("#formPay4").validate().showErrors(errors);
    }

    $('#formPay4').validate(optionConfigValidate3);

    function showNotify(type, title, message, delay = 3000) {
        // Tạo phần tử div chứa Toast
        var toastContainer = document.createElement("div");
        toastContainer.classList.add(
            "toast",
            "position-fixed",
            "top-0",
            "start-50",
            "translate-middle-x",
            "mt-3",
            "text-bg-" + type
        );
        toastContainer.setAttribute("role", "alert");
        toastContainer.setAttribute("aria-live", "assertive");
        toastContainer.setAttribute("aria-atomic", "true");

        toastContainer.style.zIndex = "9999";
        
        // Nội dung của Toast
        toastContainer.innerHTML = `
          <div class="toast-header">
            <strong class="me-auto">${title}</strong>
            <small>vừa xong</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            ${message}
          </div>
        `;

        // Thêm vào body
        document.body.appendChild(toastContainer);

        // Kích hoạt Toast
        var toast = new bootstrap.Toast(toastContainer, { autohide: true, delay: delay });
        toast.show();

        // Xóa Toast sau khi ẩn
        toastContainer.addEventListener("hidden.bs.toast", function () {
            toastContainer.remove();
        });
    }


    function copy(textToCopy) {
        navigator.clipboard.writeText(textToCopy).then(function () {
            showNotify('success', 'Thông báo', 'Đã sao chép thành công');
        }).catch(function (error) {
            console.error("Không thể sao chép văn bản: ", error);
        });
    }

    $('.copy-btn').click(function (e) {
        e.preventDefault();

        copy($(this).parents('.payment-item').find('.value .text').text());

    });
});
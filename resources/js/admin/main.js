import successIcon from "../../images/success.png";
import errorIcon from "../../images/error.png";
import defaultIcon from "../../images/info.png";
/*Setup ajax*/
$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':  $('meta[name="csrf-token"]').attr('content')
    }
})
function toast(type = undefined, data) {
    const url = window.location.origin
    const toastElement = $('#toast');
    const toastBody = $(".toast-body");
    const toastIcon = $(".toast-header img");
    const toast = new bootstrap.Toast(toastElement);
    switch (type) {
        case 'success':
            toastIcon.attr('src', successIcon)
            toastBody.append(`<p class="fw-bolder">${data}</p>`)
            break;
        case 'error':
            toastIcon.attr('src', errorIcon)
            toastBody.append(`<p  class="fw-bolder">${data}</p>`)
            break;
        default:
            toastIcon.attr('src', defaultIcon)
                break
    }

    toast.show()
}
function checkAllCheckbox(isChecked, elementInput) {
    if (isChecked) {
        elementInput.each(function () {
            $(this).prop('checked', true)
        })
    } else {
        elementInput.each(function () {
            $(this).prop('checked', false)
        })
    }
}
export {toast, checkAllCheckbox}

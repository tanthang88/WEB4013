function validateFormUpdateCategories(formID, inputForm, errorElement, messageError) {
    var form = formID;
    var input = inputForm;
    var error = errorElement;
    error.hide()
    input.on('keyup', function () {
        let val = input.val()
        if (val.length === 0){
            error.text(messageError)
            error.show()
            form.on('submit', function (event) {
                event.preventDefault()
            })
        } else {
            error.hide()
        }
    })
}
export {validateFormUpdateCategories}


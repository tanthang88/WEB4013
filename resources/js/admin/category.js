import {toast, checkAllCheckbox} from './main';
import {validateFormUpdateCategories} from "./validate"

$(document).ready(function () {
    const modalDelete = new bootstrap.Modal($("#modalCategoryDelete"))
    const modalUpdate = new bootstrap.Modal($("#modalCategoryUpdate"))
    const checkAllBtn = $("#checkAllCategories");
    const inputIdCategory = $('input[name="categoriesId"]')
    const btnDeleteAllCategories = $(".deleteAll")
    const btnAcceptDelete = $("#acceptDelete")
    const btnTrash = $(".btnTrash")
    const btnUpdate = $(".btnUpdate")
    const btnAcceptUpdate = $(".btnAcceptUpdate")
    const valAllCategories = []
    let valOneCategory = undefined;
    /*Variable Form Update*/
    const inputFormUpdate = $('input[name="nameCategoriesUpdate"]')
    const errorForm = $(".nameCategories__error")
    /*Validation Function*/
    validateFormUpdateCategories($("#updateCategoryForm"),inputFormUpdate, errorForm,"Vui lòng nhập tên danh mục!")

    checkAllBtn.change(function () {
        let checked = $(this).is(':checked');
        checkAllCheckbox(checked, inputIdCategory)
    })
    btnDeleteAllCategories.click(function () {
        $('input[name="categoriesId"]:checked').each(function (index) {
            valAllCategories[index] = $(this).val()
        })
    })
    btnTrash.click(function () {
        valOneCategory = $(this).data('id')
    })
    btnAcceptDelete.click(function (event) {
        event.preventDefault()
        modalDelete.hide()
        if (valOneCategory || undefined) {
            $.ajax({
                type: 'POST',
                url: '/admin/categories/delete',
                data: {id: valOneCategory},
                processData: true,
                dataType: 'json',
                async:false,
                success: function (data) {
                    if (data.error) {
                        toast('error', data.error)
                    }
                    if (data.message) {
                        toast('success', data.message)
                        let categoryElement = $('tr.category')
                        categoryElement.each(function () {
                            if ($(this).data('id-category') === valOneCategory) {
                                $(this).hide()
                            }
                        })
                    }
                },
                error: function (data) {
                    console.log(data)
                    const error =  data.responseJSON.errors
                    for(const prop in error){
                        console.log(`${prop}: ${error[prop]}`);
                        toast('error', `${error[prop]}`)
                    }
                }

            })
        }
        if (valAllCategories.length >= 1) {
            $.ajax({
                type: 'POST',
                url: '/admin/categories/delete',
                data: {id: valAllCategories},
                processData: true,
                dataType: 'json',
                async:false,
                success: function (data) {
                    let categoryElement = $('tr.category')
                    categoryElement.each(function (index) {
                        valAllCategories[index] = Number(valAllCategories[index])
                        if ($(this).data('id-category') === valAllCategories[index]) {
                            $(this).hide()
                        }
                    })
                    toast('success', data.message)
                },
                error: function (data) {
                    const error =  data.responseJSON.errors
                    for(const prop in error){
                        console.log(`${prop}: ${error[prop]}`);
                        toast('error', `${error[prop]}`)
                    }
                }
            })
        }
    })
    btnUpdate.click(function () {
        let valueNameCategories = $('input[name="categoriesName"]');
        let formTitle = $(".categories__title")
        let formCategoriesID = $('input[name="idCategoriesUpdate"]')
        let dataID = $(this).data('id')
        valueNameCategories.each(function () {
            if ($(this).data('id-categories') === dataID) {
                formTitle.text($(this).val())
                inputFormUpdate.attr('value', $(this).val())
                formCategoriesID.attr('value', dataID)
            }
        })
        /*Accept Update*/
        btnAcceptUpdate.click(function (e) {
            e.preventDefault()
            modalUpdate.hide()
            if (inputFormUpdate.val().length > 0){
                $.ajax({
                    type: 'POST',
                    url: '/admin/categories/update',
                    data: {
                        name: inputFormUpdate.val(),
                        id: formCategoriesID.val()
                    },
                    processData: true,
                    dataType: 'json',
                    async:false,
                    success: function (data) {
                        if (data.success){
                            toast("success", data.success)
                        }
                        setTimeout(function () {
                            location.reload()
                        },2000)
                    },
                    error: function (data) {
                        const error =  data.responseJSON.errors
                        for(const prop in error){
                            toast('error', `${error[prop]}`)
                        }
                    }
                })
            } else {
                errorForm.show()
            }
        })
    })
})


import {checkAllCheckbox, toast} from "./main";
import {validateFormUpdateCategories} from "./validate";

$(document).ready(function () {
    let subCategoryElement = $('tr.subCategories__item')
    const btnUpdate = $(".btnUpdate")
    let valAllSubCategories = []
    let valOneSubCategories = undefined;
    const modalDelete = new bootstrap.Modal($("#modalSubCategoryDelete"))
    const modalUpdate = new bootstrap.Modal($("#modalSubCategoryUpdate"))
    // const options = $('.subCategories__options')
    /*Variable form update*/
    const inputFormUpdate = $('input[name="nameSubCategories"]')
    const errorFormUpdate = $(".nameSubCategories__error")
    validateFormUpdateCategories($("#updateSubCategories"),inputFormUpdate, errorFormUpdate, "Vui lòng nhập tên chuyên mục!")
    /*Check all check box*/
    $(".subCategories__inputCheckAll").change(function () {
        checkAllCheckbox($(this).is(':checked'), $('input[name="subCategoriesId"]'))
    })
    $(".subCategories__btnDeleteAll").click(function () {
        $('input[name="subCategoriesId"]:checked').each(function (index) {
            valAllSubCategories[index] = $(this).val()
        })
    })
    $(".btnTrash").click(function () {
        valOneSubCategories = $(this).data('id')
    })
    $("#acceptDelete").on('click', function (e) {
        e.preventDefault()
        modalDelete.hide()
        if (valOneSubCategories || undefined) {
            $.ajax({
                type: 'POST',
                url: '/admin/sub-categories/delete',
                data: {id: valOneSubCategories},
                async: false,
                success(data) {
                    if (data.message) {
                        toast('success', data.message)
                        subCategoryElement.each(function () {
                            if ($(this).data('id-subcategories') === valOneSubCategories) {
                                $(this).hide()
                            }
                        })
                    }
                },
                error(data) {
                    const error = data.responseJSON.errors
                    for (const prop in error) {
                        console.log(`${prop}: ${error[prop]}`);
                        toast('error', `${error[prop]}`)
                    }
                }
            })
        }
        if (valAllSubCategories.length > 0) {
            $.ajax({
                type: 'POST',
                url: '/admin/sub-categories/delete',
                data: {id: valAllSubCategories},
                async: false,
                success(data) {
                    subCategoryElement.each(function (index) {
                        valAllSubCategories[index] = Number(valAllSubCategories[index])
                        if ($(this).data('id-subcategories') === valAllSubCategories[index]) {
                            $(this).hide()
                        }
                    })
                    toast('success', data.message)
                },
                error(data) {
                    console.log(data)
                    const error = data.responseJSON.errors
                    for (const prop in error) {
                        console.log(`${prop}: ${error[prop]}`);
                        toast('error', `${error[prop]}`)
                    }
                }
            })
        }
    })

    btnUpdate.on("click",function (e) {
        e.preventDefault()
        let idCategories = $(this).data('id-categories')
        let valInputSubCategories = $('input[name="subCategoriesName"]')
        let formTitle = $(".subCategories__title")
        let inputFormIDUpdate = $('input[name="idSubCategories"]')
        let dataID = $(this).data('id')
        /*Get data categories*/
        $.ajax({
            type:'POST',
            url:'/admin/sub-categories/categories',
            data:{
                id : idCategories
            },
            success(data){
                let selectElement = $('select[name="categories"]')
                let dataAllCategories = data.data;
                let dataCategories = data.categories[0]
                var renderOptionSelected = ''
                dataAllCategories.map((item)=>{
                    item.id === dataCategories.id ? renderOptionSelected += `<option class="subCategories__options" value="${item.id}" selected>${item.name}</option>` : renderOptionSelected += `<option class="subCategories__options" value="${item.id}">${item.name}</option>`

                })
                selectElement.html(renderOptionSelected)
            },
            error: function (data) {
                const error =  data.responseJSON.errors
                for(const prop in error){
                    toast('error', `${error[prop]}`)
                }
            }
        })


        /*Set data to form*/
        valInputSubCategories.each(function () {
            if ($(this).data('id-sub-categories') === dataID) {
                formTitle.text($(this).val())
                inputFormUpdate.attr('value', $(this).val())
                inputFormIDUpdate.attr('value', dataID)
            }
        })

        $(".btnAcceptUpdate").on("click" ,function (e) {
            e.preventDefault()
            if (inputFormUpdate.val().length > 0){
                modalUpdate.hide()
                $.ajax({
                    type: 'POST',
                    url: '/admin/sub-categories/update',
                    data: {
                        categories: $('select option:selected').val(),
                        name: inputFormUpdate.val(),
                        id: inputFormIDUpdate.val()
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
                errorFormUpdate.show()
            }
        })
    })
})

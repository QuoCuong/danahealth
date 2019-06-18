$(document).ready(function() {
    var timeout = null
    var suggest = {}
    var orderMedicines = []

    $('#sidebar-toggler').click()

    $('#add-medicine').on('click', function(e) {
        $('#add-medicine-input').toggle().focus()
    })

    $('#add-medicine-input').on('input', function(e) {
        clearTimeout(timeout)
        if (this.value.length > 2) {
            that = this
            timeout = setTimeout(function(e) {
                $.ajax({
                    type: "get",
                    url: `/api/medicines/search?q=${that.value}`,
                    success: function (response) {
                        suggest = response
                        var items = []
                        response.map((medicine, i) => {
                            items.push(
                                `<li key="${i}">
                                    <img src="/${medicine.image_path}" alt="">
                                    <a>
                                        ${medicine.name}
                                        <small class="text-grey inline-block">
                                            <span>Thương hiệu: ${medicine.supplier_name} | </span>
                                            <span>Sản xuất tại: ${medicine.country}</span>
                                        </small>
                                    </a>
                                </li>`
                            )
                        })
                        $('#suggest-medicine').html(items)
                    }
                });
                showSuggestMedicine()
            }, 500)
        } else {
            hideSuggestMedicine()
        }
    })
    .focusin(function(e) {
        if (this.value.length > 2) {
            showSuggestMedicine()
        } else {
            hideSuggestMedicine()
        }
    })
    .focusout(function(e) {
        setTimeout(function(e) {
            hideSuggestMedicine()
        }, 100)
    })

    $('#suggest-medicine').on('click', 'li', function(e) {
        const key = $(this).attr('key')
        addMedicine(key)

        clearAddMedicineInput()
        hideAddMedicineInput()
        updateTotalConfirm()
    })

    const addMedicine = (key) => {
        var medicine = suggest[key]
        medicine.quantity = 1
        medicine.subtotal = medicine.price
        orderMedicines.push(medicine)
        const index = orderMedicines.length - 1

        $('tbody').append(`
            <tr key=${index}>
                <td>${orderMedicines.length}</td>
                <td>${medicine.name}</td>
                <td>${medicine.unit}</td>
                <td class="price"><input type="number" name="orderDetails[${index}][quantity]" min="1" max="20" value="1"></td>
                <td class="text-right">${numberFormat(medicine.price)}</td>
                <td class="subtotal text-right">${numberFormat(medicine.price)}</td>
                <td class="subtotal text-right">
                    <input type="hidden" name="orderDetails[${index}][id]" value="${medicine.id}" />
                    <button type="button" class="mb-1 btn btn-sm btn-pill btn-danger" id="remove-medicine">
                        <i class="mdi mdi-playlist-remove"></i>
                        Xóa
                    </button>
                </td>
            </tr>
        `)
    }

    $('table').on('click', '#remove-medicine', function(e) {
        const key = $(this).closest('tr').attr('key')
        removeMedicine(key)
        updateTotalConfirm()
    })

    const removeMedicine = (key) => {
        orderMedicines.splice(key, 1)
        $(`tbody tr[key=${key}]`).remove()
    }

    $('tbody').on('change', '.price > input', function(e) {
        const key = $(this).closest('tr').attr('key')
        const medicine = orderMedicines[key]

        orderMedicines[key].quantity = parseInt(this.value)
        orderMedicines[key].subtotal = medicine.price * medicine.quantity
        var elSubtotal = $(this).parent().parent().find('.subtotal').get(0)
        elSubtotal.innerHTML = numberFormat(medicine.subtotal)

        updateTotalConfirm()
    })

    const showSuggestMedicine = () => {
        $('#suggest-medicine').show()
    }

    const hideSuggestMedicine = () => {
        $('#suggest-medicine').hide()
    }

    const clearAddMedicineInput = () => {
        $('#add-medicine-input').val('')
    }

    const hideAddMedicineInput = () => {
        $('#add-medicine-input').hide()
    }

    const updateTotalConfirm = () => {
        if (orderMedicines.length) {
            var total = 0
            orderMedicines.map((medicine, i) => {
                total += parseInt(medicine.subtotal)
            })
            $('.total').text(numberFormat(total))
            showTotalConfirm()
        } else {
            hideTotalConfirm()
        }
    }

    const showTotalConfirm = () => {
        $('#total-confirm').show()
    }

    const hideTotalConfirm = () => {
        $('#total-confirm').hide()
    }
})

const select = document.querySelector('#payment')
const date = document.querySelector('input[type=date]')
select.addEventListener('change', function() {
    if (select.value == 'Opłacone') {
        date.closest('.form-row').hidden = false
    } else {
        date.closest('.form-row').hidden = true
    }
})
if (select.value == 'Opłacone') {
    date.closest('.form-row').hidden = false
}
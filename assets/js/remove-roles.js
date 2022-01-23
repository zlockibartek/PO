const roles = document.querySelector('select[name=new_role]').querySelectorAll('option')

roles.forEach(element => {
    if (element.value != 'client' && element.value != 'employee' && element.value != 'manager') {
        element.hidden = true
    }
})
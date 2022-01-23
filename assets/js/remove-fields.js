const tables = document.querySelectorAll('.form-table')
const headers = document.querySelectorAll('h2')
const roles = document.querySelector('select[name=role]').querySelectorAll('option')

roles.forEach(element => {
    if (element.value != 'client' && element.value != 'employee' && element.value != 'manager') {
        element.hidden = true
    }
})

headers[0].hidden = true
headers[3].hidden = true
tables[0].hidden = true
tables[2].querySelectorAll('tr')[1].hidden = true
tables[3].hidden = true
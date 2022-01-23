const tables = document.querySelectorAll('.form-table')
const headers = document.querySelectorAll('h2')
const roles = document.querySelector('select[name=role]').querySelectorAll('option')
const submit = document.querySelector('input[name=submit]')
let a = document.createElement('a')
a.setAttribute('class', 'btn btn-primary')
a.innerText = 'Powrót'
a.setAttribute('href', 'http://po.apache:8081/wp-admin/users.php')
submit.parentElement.insertBefore(a, submit)
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
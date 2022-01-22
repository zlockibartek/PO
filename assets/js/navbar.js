let login = document.querySelector('.navigation-link')
let cart = document.querySelector('.header-counter')
let header = document.querySelector('#header')

if (header) {
    header.style.marginRight = "30px"
    header.style.fontWeight = "bold"

}
if (NAVBAR.user != 0 && !NAVBAR.main) {
    let text = header.innerText
    let a = login.querySelectorAll('a')
    a[1].style.color = "black"
    a[0].style.color = "black"
    header.innerText = ''
    a = document.createElement('a')
    a.style.color = "black"
    a.href = NAVBAR.url
    a.innerText = text
    header.appendChild(a)
}

if (NAVBAR.user == 0) {
    let a = login.querySelectorAll('a')

    a[0].hidden = false
    a[1].innerText = "Zaloguj"
    a[1].href = "http://multi.localhost/wp-admin/"
}
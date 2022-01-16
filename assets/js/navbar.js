let login = document.querySelector('.navigation-link')

if (NAVBAR.user != 0) {
    let a = login.querySelector('a')
    a.innerText = "Mój profil"
}
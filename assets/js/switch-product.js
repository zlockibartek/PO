const coffee = document.querySelector('#coffeeButton')
const tea = document.querySelector('#teaButton')
const teaDiv = document.querySelector('#teaDiv')
const coffeeDiv = document.querySelector('#coffeeDiv')

coffee.addEventListener('click', function() {
    teaDiv.hidden = true
    coffeeDiv.hidden = false
})
tea.addEventListener('click', function() {
    teaDiv.hidden = false
    coffeeDiv.hidden = true
})
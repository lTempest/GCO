const burger = document.getElementById('burger')
const burger_menu = document.getElementById('burger_menu')

burger.addEventListener('click', function(){
    burger_menu.classList.toggle('blockornot')
})

const burger_logo = document.getElementById('burger_logo')
const footlogo = document.getElementById('footlogo')

burger_logo.addEventListener('mouseover', function(){
    footlogo.classList.toggle('blockornot2')
})

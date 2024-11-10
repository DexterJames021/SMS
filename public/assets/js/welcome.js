let isOpen = document.getElementById('open')
let isClose = document.getElementById('close')
let menu = document.getElementsByClassName('menu')[0]

isOpen.addEventListener('click', function () {

    if (menu.classList.contains('hidden')) {
        menu.classList.remove("hidden")
    } else {
        menu.classList.add("hidden")
    }
})

isClose.addEventListener('click', function () {

    if (menu.classList.contains('hidden')) {
        menu.classList.remove("hidden")
    } else {
        menu.classList.add("hidden")
    }
})


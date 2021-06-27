const navtoggle = document.querySelector('.nav-toggle')
const navlinks = document.querySelectorAll('.nav__link')

navtoggle.addEventListener('click', _ =>{
    document.body.classList.toggle('nav-open')
})

navlinks.forEach(link =>{
    link.addEventListener('click', _=>{
        document.body.classList.remove('nav-open')
    })
})
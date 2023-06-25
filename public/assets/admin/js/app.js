/* admin navbar toggle */
const showSubNav = (params)=>{
    let select = document.querySelector(`.${params}`)
    select.classList.toggle("showActivity")
}

/* admin navbar container */
const showNavContainer = (params)=>{
    let select = document.querySelector(`.${params}`)
    select.classList.toggle("showNavbar")
}
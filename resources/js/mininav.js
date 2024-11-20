let navBtn = document.getElementById("btn__nav__size")
let miniNav = document.getElementById("mini__nav")

navBtn.onclick = () =>{
    if(miniNav.classList.contains("hidden")){
        miniNav.classList.remove("hidden")

        let autoHidden =setInterval(() =>{
            miniNav.classList.add("hidden")
            clearInterval(autoHidden)
        },5000)
    }
    else {
        miniNav.classList.add("hidden")
    }
}
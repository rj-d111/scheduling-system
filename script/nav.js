function adjustNavbar(){
    const title = document.querySelector("#title-logo");
    console.log(title);

    if(window.innerWidth < 768){
        title.classList.add("d-none");
    }else{
        title.classList.remove("d-none");
    }

    const pictureLogo = document.querySelector(".navbar .navbar-brand");
    console.log(pictureLogo);

    if(window.innerWidth < 768){
        pictureLogo.classList.add("ms-auto");
    }else{
        pictureLogo.classList.remove("ms-auto");
    }
}


adjustNavbar();

window.addEventListener("resize", adjustNavbar);

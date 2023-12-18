function adjustTitleFontSize() {
    const titleFont = document.querySelectorAll(".navbar-brand>h4"); // Get the title inside .navbar-brand
  
    // Check screen width
    const screenWidth = window.innerWidth;
  
    for (const img of titleFont) {
      if (screenWidth > 768) {
        // Add "fs-3" class if screen is less than 768px
        img.classList.add("fs-3");
      } else {
        // Remove "fs-3" class if screen is 768px or larger
        img.classList.remove("fs-3");
      }
    }

    const divTitle = document.querySelector(".container-md.d-flex.align-items-center.my-3.mx-auto.text-center");
    const adminLogIn = document.querySelector(".admin-log-in");
    const adminEnd = document.querySelector("#navbar-all .text-end");

    const pathname = window.location.pathname;
    const expectedText = "/admin/login.php";

    if(pathname.includes(expectedText)) {
      adminLogIn.classList.add("d-none");
      adminEnd.classList.add("d-none");
    }
    
    if(screenWidth < 768){
      divTitle.classList.add("d-none");
      //Add admin login
        adminLogIn.classList.remove("d-none");
      
      
    }else{
      divTitle.classList.remove("d-none"); 
           //Add admin login
           adminLogIn.classList.add("d-none");
    }

    //Adjust navbar top and avoid overlap
    const navbarHeight = document.querySelector('#navbar-all').offsetHeight;

    const adjustTop = document.querySelector("#fix-top");
    adjustTop.style.height = navbarHeight + "px";

    const imgWhite = document.querySelector("#logo-white");
    if(screenWidth > 768){
      imgWhite.classList.add("d-none");
    }else{
      imgWhite.classList.remove("d-none");      
    }




  }
   
  // Call the function initially on page load
  adjustTitleFontSize();
  
  // Call the function again on window resize to dynamically adapt
  window.addEventListener("resize", adjustTitleFontSize);


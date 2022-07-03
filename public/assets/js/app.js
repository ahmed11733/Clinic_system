let swiper = new Swiper(".mySwiper", {
    slidesPerView: 2,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
    },
});
new WOW().init();


let input_clinic = document.getElementById("input_clinic"),
    input_docotr = document.getElementById("input_docotr"),
    btn_back = document.getElementById("btn_back"),
    btn_next = document.querySelectorAll(".btn_next");


btn_next.forEach((el) => {
    el.addEventListener("click", () => {
        input_clinic.classList.toggle("d-none");
        input_docotr.classList.toggle("d-none");
    })
})
btn_back.addEventListener("click", () => {
    input_clinic.classList.toggle("d-none");
    input_docotr.classList.toggle("d-none");
})


const image_input = document.querySelectorAll(".image-input");

image_input.forEach((el) => {
    el.addEventListener("change", function () {
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            const uploaded_image = reader.result;
            el.parentElement.style.backgroundImage = `url(${uploaded_image})`;
            el.nextElementSibling.style.display = "none";
        });
        reader.readAsDataURL(this.files[0]);
    })
});



var get_location_btn = document.getElementById("get_location_btn");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
}
function showPosition(position) {
    document.getElementById("lat").setAttribute("value",position.coords.latitude);
    document.getElementById("long").setAttribute("value",position.coords.longitude);
    get_location_btn.textContent = "It was completed";
    document.getElementById("map").setAttribute("src",`https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3428.8846409430103!2d   ${position.coords.longitude}  !3d  ${position.coords.latitude}  !2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1652308954227!5m2!1sar!2seg`)
}
get_location_btn.addEventListener("click",() => getLocation());

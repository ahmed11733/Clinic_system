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

const header = document.querySelectorAll(".animar")


const add_class_on_scroll = (entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            console.log(entry)
            entry.target.classList.add("animate__fadeInUp")


        }
    });
}
const remove_class_on_scroll = () => header.classList.remove("animate__backInUp")

const options = {
    root: null,
    rootMargin: "0px",
    threshold: 0,
};

const observer = new IntersectionObserver(add_class_on_scroll, options);
header.forEach((el) => observer.observe(el))
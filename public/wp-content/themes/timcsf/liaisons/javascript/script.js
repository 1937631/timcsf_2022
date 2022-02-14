function menuBurger() {
    var x = document.getElementById("navigation");
    if (x.classList.contains("ferme")) {
        x.classList.add("ouvert");
        x.classList.remove("ferme");
    } else {
        x.classList.add("ferme");
        x.classList.remove("ouvert");
    }
}
///////Menu hamburger


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

//////Validation côté client


let allValide = false;
let role = false;
let prenom = false;
let nom = false;
let courriel = false;
let objet = false;
let message = false;

if(document.getElementById("prenom") != null){
    document.getElementById("prenom").addEventListener('change', function(){
        prenom = verifierChamp('prenom', /^[A-Z][A-Za-zÀ-ÿ -'-]*$/);
        commencerVerif();
    });
    document.getElementById("nom").addEventListener('change', function(){
        nom = verifierChamp('nom', /^[A-Z][A-Za-zÀ-ÿ -'-]+$/);
    });
    document.getElementById("courriel").addEventListener('change', function(){
        courriel = verifierChamp('courriel', /^[^@]+@[^@]+\.[^@]+$/);
    });
    document.getElementById("objet").addEventListener('change', function(){
        objet = verifierChamp('objet', /(.*[a-z]){3}/);
    });
    document.getElementById("message").addEventListener('change', function(){
        message = verifierChamp('message', /(.*[a-z]){10}/);
    });
}
function commencerVerif(){
    setInterval(verifierChamps, 100);
}

function verifierChamps(){
    if(document.getElementById('employeur').checked || document.getElementById('etudiant').checked){
        document.getElementById('roleMessage').innerHTML = "";
        document.getElementById('employeur').classList.remove('animate__animated');
        document.getElementById('employeur').classList.remove('animate__shakeX');
        document.getElementById('employeur').classList.remove('formulaire__inputErreur');
        document.getElementById('etudiant').classList.remove('animate__animated');
        document.getElementById('etudiant').classList.remove('animate__shakeX');
        document.getElementById('etudiant').classList.remove('formulaire__inputErreur');
        role = true;
    }
    else{
        document.getElementById('roleMessage').innerHTML = "Veuillez sélectionner votre rôle."
        document.getElementById('employeur').classList.add('animate__animated');
        document.getElementById('employeur').classList.add('animate__shakeX');
        document.getElementById('employeur').classList.add('formulaire__inputErreur');
        document.getElementById('etudiant').classList.add('animate__animated');
        document.getElementById('etudiant').classList.add('animate__shakeX');
        document.getElementById('etudiant').classList.add('formulaire__inputErreur');
        role = false;
    }
    allValide = prenom === true && nom === true && courriel === true && objet === true && message === true && role === true;
    if(allValide === true){
        document.getElementById("boutonSubmit").removeAttribute('disabled');

    }
    else{
        document.getElementById("boutonSubmit").setAttribute('disabled', true);

    }
}
function verifierChamp(nomChamp, regex) {
    allValide = false;
    const champ = document.getElementById(nomChamp).value;
    if(regex.test(champ) === true){
        allValide = true;
        document.getElementById(nomChamp + 'Message').innerHTML = "";
        document.getElementById(nomChamp).classList.remove('animate__animated');
        document.getElementById(nomChamp).classList.remove('animate__shakeX');
        document.getElementById(nomChamp).classList.remove('formulaire__inputErreur');
        document.getElementById(nomChamp).classList.add('formulaire__input');
        return true;
    }
    else{
        document.getElementById(nomChamp + 'Message').innerHTML = "Veuillez entrer un " + nomChamp + " valide.";
        document.getElementById(nomChamp).classList.add('animate__animated');
        document.getElementById(nomChamp).classList.add('animate__shakeX');
        document.getElementById(nomChamp).classList.add('formulaire__inputErreur');
        return false;
    }
}



/////Visionneuse projets accueil



let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}
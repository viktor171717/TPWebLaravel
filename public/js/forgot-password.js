// On attend que la page soit chargée pour cibler les éléments
const loginForm = document.querySelector('form'); // On cible le formulaire
const emailInput = document.getElementById('login-id');
const emailInput2 = document.getElementById('login-id2');

const emailError = document.getElementById('email-error');
const emailError2 = document.getElementById('email-error2');

loginForm.addEventListener('submit', (event) => {
    // 1. Empêcher le rechargement de la page
    event.preventDefault();

    // 2. Réinitialiser les messages (on repart à zéro)
    emailError.innerText = "";
    emailError2.innerText = "";


    let isValid = true;

    // 3. Validation de l'Email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(emailInput.value)) {
        emailError.innerText = "Format d'email incorrect (ex: nom@mail.com)";
        isValid = false;
    }
    // 4. Validation du Mot de passe (ex: minimum 6 caractères)
    if (emailInput2.value != emailInput.value){
        emailError2.innerText = "les deux emails doivent êtres identiques";
        isValid = false;
            console.log("", emailInput.value,emailInput2.value);

    }

    // 5. Finalisation
    if (isValid) {
        window.location.href = APP_URLS.board;
        // C'est ici que tu ferais ton appel fetch vers ton serveur
    }
});

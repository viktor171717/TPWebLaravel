// On attend que la page soit chargée pour cibler les éléments
console.log("bruh")

const loginForm = document.querySelector('form'); // On cible le formulaire
const emailInput = document.getElementById('login-id');
const passwordInput = document.getElementById('password');

const emailError = document.getElementById('email-error');
const passwordError = document.getElementById('password-error');
loginForm.addEventListener('submit', (event) => {
    // 1. Empêcher le rechargement de la page

    // 2. Réinitialiser les messages (on repart à zéro)
    emailError.innerText = "";
    passwordError.innerText = "";


    let isValid = true;

    // 3. Validation de l'Email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(emailInput.value)) {
        emailError.innerText = "Format d'email incorrect (ex: nom@mail.com)";
        isValid = false;
    }

    // 4. Validation du Mot de passe (ex: minimum 6 caractères)
    if (passwordInput.value.length < 6) {
        passwordError.innerText = "Le mot de passe doit contenir au moins 6 caractères";
        isValid = false;
    }

    // 5. Finalisation
    if (!isValid) {
        event.preventDefault();
        // C'est ici que tu ferais ton appel fetch vers ton serveur
    }
});

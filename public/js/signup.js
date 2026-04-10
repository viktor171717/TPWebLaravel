document.getElementById('signup-form').addEventListener('submit', function(e) {
    e.preventDefault();

    // Récupération des champs
    const fields = [
        { id: 'signup-lastname', errorId: 'lastname-error', msg: 'Nom requis' },
        { id: 'signup-firstname', errorId: 'firstname-error', msg: 'Prénom requis' },
        { id: 'signup-email', errorId: 'email-error', msg: 'Email invalide', isEmail: true },
        { id: 'password', errorId: 'password-error', msg: '6 caractères minimum', min: 6 }
    ];

    let formIsValid = true;

    fields.forEach(field => {
        const input = document.getElementById(field.id);
        const errorDiv = document.getElementById(field.errorId);
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        let hasError = false;

        // Validation vide
        if (input.value.trim() === "") {
            hasError = true;
        }
        // Validation email
        else if (field.isEmail && !emailRegex.test(input.value)) {
            hasError = true;
        }
        // Validation longueur
        else if (field.min && input.value.length < field.min) {
            hasError = true;
        }

        if (hasError) {
            errorDiv.innerText = field.msg;
            input.style.borderColor = "#ff4d4d";
            formIsValid = false;
        } else {
            errorDiv.innerText = "";
            input.style.borderColor = "#ccc";
        }
    });

    if (formIsValid) {
        window.location.href = APP_URLS.board;
    }
});

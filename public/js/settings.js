const input = document.querySelector("#username-display");
        const info1 = document.querySelector(".validation-div")

console.log(input); // doit afficher l'élément HTML dans la console
input.addEventListener("change", function() {
    const info = document.querySelector(".validation-username");
    console.log("zaeazeaze");
    if (this.value.length < 3) {
        info.classList.remove("hidden");
        info.classList.add("username-fail");
        info.textContent = "Nom d'utilisateur trop court !";
    } else {
        // cache le message si tout va bien
        info.classList.add("hidden");
        info.classList.remove("ticket-fail");
        info.textContent = "";

        info1.classList.remove("hidden");
        info1.classList.add("ticket-success");
        info1.classList.add("ticket-return");
        info1.textContent = "Nom d'utilisateur modifié avec succès !";
        setTimeout(() => { 


        info1.classList.add("hidden");}, 3000);
    }
});

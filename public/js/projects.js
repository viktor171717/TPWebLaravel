const buttons_collab = document.querySelectorAll('.button-add-collab');
const buttons_ticket = document.querySelectorAll('.button-add-ticket');
const buttons_contract = document.querySelectorAll('.button-change-contract');
const form = document.querySelector('.form-collab');
const form_ticket = document.querySelector('.create-ticket');
const form_contract = document.querySelector('.form-contract');
const collabs = document.querySelectorAll('.project-list-start ul');
const tickets = document.querySelectorAll('.project-list-middle ul');
const contracts = document.querySelectorAll('.project-list-end ul');


let currentCollab = null;
let currentTicket = null;
let currentContract = null;

buttons_collab.forEach((btn, index) => {
  btn.addEventListener('click', () => {
    currentCollab = collabs[index];
  });
});
buttons_ticket.forEach((btn, index) => {
  btn.addEventListener('click', () => {
    currentTicket = tickets[index];
  });
});
buttons_contract.forEach((btn, index) => {
  btn.addEventListener('click', () => {
    currentContract = contracts[index];
  });
});

form.addEventListener('submit', function (e) {
  e.preventDefault();

  const input = this.querySelector('input');
const value = input.value.trim();
if (value.length > 6 && value.includes(" ")) {
      const info1 = this.querySelector(".validation-project")

    info1.classList.add("hidden");
    const info = document.querySelector(".validation-div")

    info.classList.remove("hidden");
    info.classList.add("ticket-success");
    info.classList.add("ticket-return");
    info.textContent = "Collaborateur ajouté avec succès !";
    setTimeout(() => { 


    info.classList.add("hidden");}, 3000);
        this.reset();

    window.location.href = '#!';



  }
  else{
    const info = this.querySelector(".validation-project")

    info.classList.remove("hidden");
    info.classList.add("ticket-fail");
      info.textContent = "Echec de l'ajout du collaborateur";

    if(!value.includes(" "))
      info.textContent = "Echec de l'ajout du collaborateur, veuillez entrer le nom et le prénom";
    if(value.length <= 6)
      info.textContent = "Echec de l'ajout du collaborateur, nombre de caractères insuffisant";


  }
});

form_ticket.addEventListener('submit', function (e) {
  e.preventDefault();

  const input = this.querySelector('input');
  const textbox = this.querySelector('textarea').value;
  console.log(textbox.length);
const value = input.value.trim();
tmp = 0;
if (value.length >= 5 && value.length < 50) {
 
    tmp = 1;
        const info = this.querySelector(".validation-ticket-1")
    info.classList.add("hidden");

  }
  else{
    const info = this.querySelector(".validation-ticket-1")

    info.classList.remove("hidden");
    info.classList.add("ticket-fail");
    info.textContent = "Veuillez remplir ce champ correctement";


  }
  if(textbox.length > 10 && textbox.length < 500) {
        const info1 = this.querySelector(".validation-ticket-2")
          info1.classList.add("hidden");

    if(tmp == 1){
      tmp = 0;
         const info = document.querySelector(".validation-div")

    info.classList.remove("hidden");
    info.classList.add("ticket-success");
    info.classList.add("ticket-return");
    info.textContent = "Ticket ajouté avec succès !";
    setTimeout(() => { 


    info.classList.add("hidden");}, 3000);
    this.reset();

      window.location.href = '#!';

    }
  }
  else{
    const info = this.querySelector(".validation-ticket-2")

    info.classList.remove("hidden");
    info.classList.add("ticket-fail");
    info.textContent = "Veuillez remplir ce champ correctement";



  }
});

form_contract.addEventListener('submit', function (e) {
  e.preventDefault();

         const info = document.querySelector(".validation-div")

    info.classList.remove("hidden");
    info.classList.add("ticket-success");
    info.classList.add("ticket-return");
    info.textContent = "Contrat ajouté avec succès !";
    setTimeout(() => { 


    info.classList.add("hidden");}, 3000);
    this.reset();

      window.location.href = '#!';
});


document.querySelector('.form-project').addEventListener("submit", function(e) {
  e.preventDefault();

  const input = this.querySelector('input');
  const textbox = this.querySelector('textarea').value;
  const checkedCount = document.querySelectorAll(
    '.collab-div input[type="checkbox"]:checked'
  ).length;
  const value = input.value.trim();
tmp = 0;
 if (value.length >= 5 && value.length < 50) {
 
    tmp += 1;
        const info = this.querySelector(".validation-project-1")

            info.classList.add("hidden")

  }
  else{
    const info = this.querySelector(".validation-project-1")

    info.classList.remove("hidden");
    info.classList.add("ticket-fail");
    info.textContent = "Veuillez remplir ce champ correctement";


  }
  if(textbox.length > 10 && textbox.length < 500) {
    tmp += 1;
    const info = this.querySelector(".validation-project-2")

        info.classList.add("hidden")
  }
  else{
    const info = this.querySelector(".validation-project-2")

    info.classList.remove("hidden");
    info.classList.add("ticket-fail");
    info.textContent = "Veuillez remplir ce champ correctement";


  }
  if(checkedCount > 0)
  {
        const info1 = this.querySelector(".validation-project-3")
    info1.classList.add("hidden");

        if(tmp == 2){
      tmp = 0;

         const info = document.querySelector(".validation-div")
          
    info.classList.remove("hidden");
    info.classList.add("ticket-success");
    info.classList.add("ticket-return");
    info.textContent = "Projet ajouté avec succès !";
    setTimeout(() => { 


    info.classList.add("hidden");}, 3000);
    this.reset();

      window.location.href = '#!';

    }

  }
  else
  {
    const info = this.querySelector(".validation-project-3")

    info.classList.remove("hidden");
    info.classList.add("ticket-fail");
    info.textContent = "Veuillez sélectionner au moins un collaborateur";

  }
});

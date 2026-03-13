document.querySelector(".form-collab").addEventListener('submit', function (e) {
  e.preventDefault();

  const input = this.querySelector('input');
const value = input.value.trim();
if (value.length > 6 && value.includes(" ")) {
      const info1 = this.querySelector(".validation-detail")

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
    const info = this.querySelector(".validation-detail")

    info.classList.remove("hidden");
    info.classList.add("ticket-fail");
      info.textContent = "Echec de l'ajout du collaborateur";

    if(!value.includes(" "))
      info.textContent = "Echec de l'ajout du collaborateur, veuillez entrer le nom et le prénom";
    if(value.length <= 6)
      info.textContent = "Echec de l'ajout du collaborateur, nombre de caractères insuffisant";


  }
});

const input = document.querySelector(".input-time");

input.addEventListener("input", () => {
    if (input.value < 0) {
        input.value = 0;
    }
    const bar = document.querySelector(".progress-fill");
    const original_time = document.querySelector(".original-time");
    const maxTime = parseFloat(original_time.textContent); 
    let val = input.value/maxTime*100;

    document.querySelector(".time-ratio-info").textContent = val + "% du temps estimé utilisé"


    if (val < 0) val = 0;
    if (val > 100) val = 100;

    bar.style.width = val+"%";

});

document.querySelector(".btn-danger").addEventListener("click", (e) => {
    e.preventDefault();
    window.location.href = "tickets.html";
});

const dateInput = document.querySelector(".date-detail");
const info = document.querySelector(".error-date");

document.querySelector(".ticket-detail").addEventListener('submit', function (e) {
    e.preventDefault();
    const value = dateInput.value;

    const today = new Date();
    today.setHours(0, 0, 0, 0);

    const selectedDate = new Date(value);

    if (selectedDate > today){
    
    const state = document.querySelector(".select-state").value;
    const prio  = document.querySelector(".select-prio").value;
    const type  = document.querySelector(".select-type").value;
    const time  = document.querySelector(".input-time").value;
    const date  = document.querySelector(".date-detail").value;
            window.location.href = "{{ route('tickets') }}";

    }
    // console.log("state:", state);
    // console.log("prio:", prio);
    // console.log("type:", type);
    // console.log("time:", time);
    // console.log("date:", date);

});



dateInput.addEventListener("change", () => {
    const value = dateInput.value;

    const today = new Date();
    today.setHours(0, 0, 0, 0);

    const selectedDate = new Date(value);

    if (selectedDate < today) {
        info.classList.remove("hidden");
        info.classList.add("ticket-fail");
        info.textContent = "La date est inférieure à la date du jour !";
        return;
    }
        info.classList.add("hidden");

    error.textContent = "";
});

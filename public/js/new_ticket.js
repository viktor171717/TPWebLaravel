document.querySelector('form').addEventListener("submit", function(e) {
  e.preventDefault();

  const input = this.querySelector('input');
  const textbox = this.querySelector('textarea').value;
  console.log(textbox.length);
const value = input.value.trim();
tmp = 0;
if (value.length >= 5 && value.length < 50) {
     const info = this.querySelector(".validation-ticket-1")
    info.classList.add("hidden");

    tmp = 1;
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

const table = document.querySelector(".tickets-table");
const headers = table.querySelectorAll("thead th");
let order = 0;

const headerCheckboxes = [];
for(let i = 0; i < headers.length; i++){
    headerCheckboxes[i] = headers[i].querySelectorAll("input");
}

function filtrerLignes() {

    const rows = table.querySelectorAll("tbody tr");
    for(let i = 0; i < rows.length; i++){
        const rowCells = rows[i].querySelectorAll("td");

        let display = 0;

        for(let j = 0; j < headerCheckboxes[2].length; j++){
            if(rowCells[2].textContent === headerCheckboxes[2][j].value && headerCheckboxes[2][j].checked){
                display += 1;
                break;
            }
        }

        if(display === 1){
            for(let j = 0; j < headerCheckboxes[3].length; j++){
                if(rowCells[3].textContent === headerCheckboxes[3][j].value && headerCheckboxes[3][j].checked){
                    display += 1;
                    break;
                }
            }
        }

        if(display === 2){
            for(let j = 0; j < headerCheckboxes[4].length; j++){
                if(rowCells[4].textContent === headerCheckboxes[4][j].value && headerCheckboxes[4][j].checked){
                    display += 1;
                    break;
                }
            }
        }

        if(display !== 3){
            rows[i].style.display = 'none';
        } else {
            rows[i].style.display = '';
        }
    }
}
for(let i = 0; i < headerCheckboxes.length; i++){
    for(let j = 0; j < headerCheckboxes[i].length; j++){
        headerCheckboxes[i][j].addEventListener('change', filtrerLignes);
    }
}

const rows = document.querySelectorAll(".clickable-row").forEach(row => {
    row.addEventListener('click', function() {
        window.location.href = APP_URLS.ticketdetail;
    });
    row.style.cursor = 'pointer';
});
    console.log("paff");

document.querySelector(".ticket-title").addEventListener("click", function() {
    
    order = (order+1)%2;
    console.log(order);
    const tbody = document.querySelector(".tickets-table tbody");
    const rows = table.querySelectorAll("tbody tr");

    for(let i = 0;i<rows.length;i++)
    {

        for(let j = i+1;j<rows.length;j++)
        {
            const rows = table.querySelectorAll("tbody tr");

            const tdi = rows[i].querySelectorAll("td");
            const tdj = rows[j].querySelectorAll("td");
            if(tdi[0].textContent > tdj[0].textContent && order === 1)
            {
                tbody.insertBefore(rows[j], rows[i]);
            }
            if(tdi[0].textContent < tdj[0].textContent && order === 0)
            {
                tbody.insertBefore(rows[j], rows[i]);
            }
        }
    }

});
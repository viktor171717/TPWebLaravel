const newTicketForm = document.getElementById('new-ticket-form');

function addTicket(ticket) {
    const liste = document.querySelector('tbody'); // le tbody de ta table

    const tr = document.createElement('tr');
    tr.classList.add('clickable-row', 'ticket-rows');
    tr.dataset.url = `/tickets/${ticket.id}`;

    tr.innerHTML = `
        <td class="ticket-title">${ticket.title}</td>
        <td class="ticket-description">
            ${ticket.description || '-'}
        </td>
        <td class="ticket-status">${ticket.status}</td>
        <td class="ticket-priority">${ticket.priority ?? '-'}</td>
        <td class="ticket-type">${ticket.type ?? '-'}</td>
        <td class="ticket-estimated-time">${ticket.estimated_time ? (ticket.estimated_time / 60).toFixed(1) + 'h' : '-'}</td>
        <td class="ticket-real-time">${(ticket.real_time / 60).toFixed(1)}h</td>
        <td class="ticket-user-id">Non assigne</td>
    `;

    liste.prepend(tr);
}

if (newTicketForm) {
  newTicketForm.addEventListener('submit', async (event) => {
    event.preventDefault();

    const formData = new FormData(newTicketForm);
    console.log("requeteenvoye !");
    console.log(Object.fromEntries(formData));

    const response = await fetch('/api/tickets', {

        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(Object.fromEntries(formData)),
    });

    if (response.ok) {
        console.log(Object.fromEntries(formData));

        console.log("Ticket créé avec succès !");
        const ticket = await response.json();
        ticketModal.close();        // ferme la modal
        addTicket(ticket); // met à jour la liste
        newTicketForm.reset();         // vide le formulaire
    }

  });
}


// Ticket Modal Handlers


const openTicketModalButton = document.getElementById('open-ticket-modal');
const closeTicketModalButton = document.getElementById('close-ticket-modal');
const ticketModal = document.getElementById('new-ticket-modal');

if (openTicketModalButton && closeTicketModalButton && ticketModal) {
  openTicketModalButton.addEventListener('click', () => {
    ticketModal.showModal();
  });

  closeTicketModalButton.addEventListener('click', () => {
    ticketModal.close();
  });

  ticketModal.addEventListener('click', (event) => {
    if (event.target === ticketModal) {
      ticketModal.close();
    }
  });
}

// Ticket Table Filtering & Sorting
const table = document.querySelector('.tickets-table');

if (table) {
  const headers = table.querySelectorAll('thead th');
  let order = 0;

  const headerCheckboxes = [];
  for (let i = 0; i < headers.length; i++) {
    headerCheckboxes[i] = headers[i].querySelectorAll('input');
  }

  function filtrerLignes() {
    const rows = table.querySelectorAll('tbody tr');

    for (let i = 0; i < rows.length; i++) {
      const rowCells = rows[i].querySelectorAll('td');

      if (rowCells.length < 5) {
        continue;
      }

      let display = 0;
      for (let j = 0; j < headerCheckboxes[2].length; j++) {
        if (rowCells[2].textContent.trim() === headerCheckboxes[2][j].value.toLowerCase() && headerCheckboxes[2][j].checked) {
          display += 1;
          break;
        }
      }


    for (let j = 0; j < headerCheckboxes[3].length; j++) {
        if (rowCells[3].textContent.trim() === headerCheckboxes[3][j].value.toLowerCase() && headerCheckboxes[3][j].checked) {
        display += 1;
        break;
        }
    }

    console.log(headerCheckboxes[4][0].value.toLowerCase());

    for (let j = 0; j < headerCheckboxes[4].length; j++) {
        if (rowCells[4].textContent.trim() === headerCheckboxes[4][j].value.toLowerCase() && headerCheckboxes[4][j].checked) {
        display += 1;
        break;
        }
    }


      rows[i].style.display = display >= 1 ? '' : 'none';
    }
  }

  for (let i = 0; i < headerCheckboxes.length; i++) {
    for (let j = 0; j < headerCheckboxes[i].length; j++) {
      headerCheckboxes[i][j].addEventListener('change', filtrerLignes);
    }
  }

  document.querySelectorAll('.clickable-row').forEach((row) => {
    row.addEventListener('click', function () {
      const detailUrl = row.dataset.url;
      if (detailUrl) {
        window.location.href = detailUrl;
      }
    });
    row.style.cursor = 'pointer';
  });

  const titleHeader = document.querySelector('.ticket-title');
  if (titleHeader) {
    titleHeader.addEventListener('click', function () {
      order = (order + 1) % 2;
      const tbody = document.querySelector('.tickets-table tbody');
      const rows = table.querySelectorAll('tbody tr');

      for (let i = 0; i < rows.length; i++) {
        for (let j = i + 1; j < rows.length; j++) {
          const currentRows = table.querySelectorAll('tbody tr');
          const tdi = currentRows[i].querySelectorAll('td');
          const tdj = currentRows[j].querySelectorAll('td');

          if (tdi.length === 0 || tdj.length === 0) {
            continue;
          }

          if (tdi[0].textContent > tdj[0].textContent && order === 1) {
            tbody.insertBefore(currentRows[j], currentRows[i]);
          }
          if (tdi[0].textContent < tdj[0].textContent && order === 0) {
            tbody.insertBefore(currentRows[j], currentRows[i]);
          }
        }
      }
    });
  }
}

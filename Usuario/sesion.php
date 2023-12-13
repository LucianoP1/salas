<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bienvenido</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: rgb(219, 239, 255);
      margin: 0;
      padding: 0;
    }
    header {
      background-color: rgb(0, 61, 125);
      color: white;
      padding: 20px;
      text-align: center;
    }
    .container {
      width: 80%;
      margin: 20px auto;
    }
    #calendar {
      border-collapse: collapse;
      width: 100%;
    }
    #calendar th,
    #calendar td {
      border: 1px solid rgb(0, 61, 125);
      padding: 8px;
      text-align: center;
    }
    #calendar th {
      background-color: rgb(0, 61, 125);
      color: white;
    }
    #calendar td {
      background-color: rgb(255, 255, 255);
    }
    footer {
      background-color: rgb(0, 61, 125);
      color: white;
      text-align: center;
      padding: 10px 0;
      position: absolute;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>
<body>
  <header>
    <h1>Bienvenido <span id="username">Usuario</span></h1>
  </header>
  
  <div class="container">
    <table id="calendar">
      <caption>Mi Calendario</caption>
      <thead>
        <tr>
          <th>Lun</th>
          <th>Mar</th>
          <th>Mie</th>
          <th>Jue</th>
          <th>Vie</th>
          <th>Sab</th>
          <th>Dom</th>
        </tr>
      </thead>
      <tbody id="calendar-body">
        <!-- Aquí se generará el calendario con JavaScript -->
      </tbody>
    </table>
  </div>

  <footer>
    &copy; 2023 - Mi Página
  </footer>

  <script>
    // Obtener el nombre del usuario (puedes cambiar esto con tu lógica para obtener el nombre)
    const username = prompt('Por favor, introduce tu nombre');
    document.getElementById('username').innerText = username || 'Usuario';

    // Función para generar el calendario
    function generateCalendar() {
      const now = new Date();
      const daysInMonth = new Date(now.getFullYear(), now.getMonth() + 1, 0).getDate();
      const firstDayIndex = new Date(now.getFullYear(), now.getMonth(), 1).getDay();
      const calendarBody = document.getElementById('calendar-body');
      let date = 1;

      for (let i = 0; i < 6; i++) {
        const row = document.createElement('tr');

        for (let j = 0; j < 7; j++) {
          if (i === 0 && j < firstDayIndex) {
            const cell = document.createElement('td');
            row.appendChild(cell);
          } else if (date > daysInMonth) {
            break;
          } else {
            const cell = document.createElement('td');
            cell.innerText = date;
            row.appendChild(cell);
            date++;
          }
        }
        calendarBody.appendChild(row);
      }
    }

    generateCalendar();
  </script>
</body>
</html>

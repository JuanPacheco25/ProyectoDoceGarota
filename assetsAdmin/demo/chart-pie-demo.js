// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily =
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#292b2c";


productosMinimos();
topProductos();
function productosMinimos() {
  const url = base_url + "admin/productosMinimos"; // Definiendo la URL de destino
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();

  // Estableciendo una función de devolución de llamada cuando cambia el estado de la solicitud
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);

      let nombre = [];
      let cantidad =  [];
      for (let i = 0; i < res.length; i++) {
        nombre.push(res[i]['nombre']);
        cantidad.push(res[i]['cantidad']);
      }



      var ctx = document.getElementById("myPieChart2");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: cantidad,
              backgroundColor: ["#EE10DA", "#10E1EE", "#ffc107", "#13E909","#F78928"],
            },
          ],
        },
      });
    }
  };
}




function topProductos() {
  const url = base_url + "admin/topProductos"; // Definiendo la URL de destino
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();

  // Estableciendo una función de devolución de llamada cuando cambia el estado de la solicitud
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);

      let nombre = [];
      let cantidad =  [];
      for (let i = 0; i < res.length; i++) {
        nombre.push(res[i]['producto']);
        cantidad.push(res[i]['total']);
      }



      var ctx = document.getElementById("topProductos");
      var myPieChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              data: cantidad,
              backgroundColor: ["#EE10DA", "#10E1EE", "#ffc107", "#13E909","#F78928"],
            },
          ],
        },
      });
    }
  };
}

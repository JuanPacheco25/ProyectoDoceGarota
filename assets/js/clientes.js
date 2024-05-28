const tableLista = document.querySelector('#tableListaProductos tbody');
const tblPendientes = document.querySelector('#tblPendientes');
const estadoEnviado = document.querySelector("#estadoEnviado");
const estadoProceso = document.querySelector("#estadoProceso");
const estadoCompletado = document.querySelector("#estadoCompletado");
let tblCalificacion;




function getListaProductos() {
  let html = ''
  const url = base_url + 'principal/listaProductos'
  const http = new XMLHttpRequest()
  http.open('POST', url, true)
  http.send(JSON.stringify(listaCarrito))
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText)
      if (res.totalPaypal > 0) {
        res.productos.forEach((producto) => {
          html += `<tr>
                    <td>
                    <img class="img-tabla" src="${producto.imagen
            }" alt="" width="100">
                    
                    </td>
                    <td>${producto.nombre}</td>
                    <td><span class="badge  bg-warning">  ${res.moneda + ' ' + producto.precio
            }</span>
                  </td>
                    <td><span class="badge  bg-primary">  ${producto.cantidad
            }</span></td>
                    <td>${producto.subTotal}</td>
                  
                </tr>`
        })
        tableLista.innerHTML = html
        document.querySelector('#totalProducto').textContent =
          'TOTAL A PAGAR: ' + res.moneda + ' ' + res.total
        initPayPalButton(res.totalPaypal);
      } else {
        tableLista.innerHTML = `
        <tr>
            <td colspan="5" class="tex-center"> CARRITO VACIO </td>
        </tr>`;
      }


    }
  }
}
//cargar datos pendientes con Data TAble
$('#tblPendientes').DataTable({
  dom: 'Bfrtip',
  ajax: {
    url: base_url + 'clientes/listarPendientes',
    dataSrc: ''
  },
  columns: [
    { data: 'id_transaccion' },
    { data: 'monto' },
    { data: 'fecha' },
    { data: 'accion' }
  ],
  language: {
    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json" // Carga las traducciones en español
  },
  buttons: [
    'copy', 'excel', 'pdf', 'print'
  ]
  /*dom,
  buttons--> cuando coloco las variables se chorizea la tabla */

});
//cargar datos pendientes con Data TAble
tblCalificacion = $('#tblProductos').DataTable({
  dom: 'Bfrtip',
  ajax: {
    url: base_url + 'clientes/listarProductos',
    dataSrc: ''
  },
  columns: [
    { data: 'id_producto' },
    { data: 'producto' },
    { data: 'precio' },
    { data: 'cantidad' },
    { data: 'calificacion' }
  ],
  language: {
    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json" // Carga las traducciones en español
  },
  buttons: [
    'copy', 'excel', 'pdf', 'print'
  ]
  /*dom,
  buttons--> cuando coloco las variables se chorizea la tabla */

});

// en vez que de ir botonpaypal va initpaybutton
function initPayPalButton(total) {
  paypal.Buttons({
    style: {
      shape: "rect",
      color: "gold",
      layout: "vertical",
      label: "pay",
    },

    createOrder: function (data, actions) {
      return actions.order.create({
        purchase_units: [
          {
            description: "LA DESCRIPCION DE TU PRODUCTO",
            amount: { currency_code: "USD", value: total },
          },
        ],
      });
    },

    onApprove: function (data, actions) {
      return actions.order.capture().then(function (orderData) {
        registrarPedido(orderData)
      });
    },

    onError: function (err) {
      console.log(err);
    },
  })
    .render("#paypal-button-container");
}

function registrarPedido(datos) {
  const url = base_url + 'clientes/registrarPedido';
  const http = new XMLHttpRequest();
  http.open('POST', url, true);
  http.send(JSON.stringify({
    pedidos: datos,
    productos: listaCarrito
  }));
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      Swal.fire('AVISO', res.msg, res.icono)
      if (res.icono == 'success') {
        localStorage.removeItem('listaCarrito');
        setTimeout(() => {
          Window.location.reload();
        }, 2000);
      }

    }
  }
}



function init() {
  getListaProductos()
}
document.addEventListener('DOMContentLoaded', function () {
  if (localStorage.getItem('listaDeseo') != null) {
    listaDeseo = JSON.parse(localStorage.getItem('listaDeseo'))
  }
  if (localStorage.getItem('listaCarrito') != null) {
    listaCarrito = JSON.parse(localStorage.getItem('listaCarrito'))
  }
  init();
})




function verPedido(idPedido) {
  // Obtén el modal
  var modal = document.getElementById("myModal");

  estadoProceso.classList.remove('services-icon-wap');
  estadoCompletado.classList.remove('services-icon-wap');
  estadoEnviado.classList.remove('services-icon-wap');

  const url = base_url + 'clientes/verPedido/' + idPedido;
  const http = new XMLHttpRequest()
  http.open('GET', url, true)
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText)
      console.log(res);

      let html = '';
      if (res.pedido.proceso == 1) {
        estadoEnviado.classList.add('services-icon-wap');
      } else if(res.pedido.proceso == 2){
        estadoProceso.classList.add('services-icon-wap');
      }else{
        estadoCompletado.classList.add('services-icon-wap');
      }
      res.productos.forEach((row) => {
        html += `<tr>
          <td class="nombre-deseo">${row.producto}</td>
          <td class="precio-art">
            <input data-id="${row.id}" type="hidden" style="max-width:50px;border:none;text-align:center;" readonly class="inputPric" value="${row.precio}">
            <span class="badge bg-warning">${res.moneda + ' ' + row.precio}</span>
          </td>
          <td class="cantidad-p2">
           
            <input data-id="${row.id}" style="max-width:50px;border:none;text-align:center;" readonly class="inputQty" value="${row.cantidad}">

          </td>
          <td>
            <input data-id="${row.id}" style="max-width:50px;border:none;text-align-center;" readonly class="inputSub" value="${(parseFloat(row.precio) * parseFloat(row.cantidad)).toFixed(2)}">
          </td>
        </tr>`;
      })
      document.querySelector('#tablePedidos tbody').innerHTML = html;

      // Mostrar el modal
      modal.style.display = "block";
    }
  }
  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  const p_id = document.querySelector('#id-pedido');

  // Aquí puedes configurar el contenido del modal sin incluir el idPedido
  p_id.innerHTML = ''; // Elimina cualquier contenido anterior
  var h1 = document.createElement('h1');
  h1.textContent = "";
  p_id.appendChild(h1);
  var p = document.createElement('p');
  p.textContent = "";
  p_id.appendChild(p);

  modal.style.display = "block";

  // When the user clicks on <span> (x), close the modal
  span.onclick = function () {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
     
    }
  }
}
function agregarCalificacion(id_producto,cantidad) {
  const url = base_url + 'clientes/agregarCalificacion';
  const http = new XMLHttpRequest();
  http.open('POST', url, true);
  http.send(JSON.stringify({
    id_producto: id_producto,
    cantidad: cantidad
  }));
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      Swal.fire('AVISO', res.msg, res.icono)
      if (res.icono == 'success') {
        tblCalificacion.ajax.reload();
      }

    }
  }
}

//sb-4k243p27785671@personal.example.com
//m[%6Fx%>


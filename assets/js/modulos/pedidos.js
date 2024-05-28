let tblPendientes , tblFinalizados, tblProceso;

const myModal = new bootstrap.Modal(document.getElementById('modalPedidos'))
document.addEventListener("DOMContentLoaded", function(){

    tblPendientes= $('#tblPendientes').DataTable({
    dom: 'Bfrtip',
    ajax: {
      url: base_url + "pedidos/listarPedidos",
      dataSrc: '',
    },
    columns: [
      { data: 'id_transaccion' },
      { data: 'monto' },
      { data: 'estado' },
      { data: 'fecha' },
      { data: 'email' },
      { data: 'nombre' },
      { data: 'apellido' },
      { data: 'direccion' },
      { data: 'accion' }
    ],
    language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json" // Carga las traducciones en español
    },
    buttons: [
      'copy', 'excel', 'pdf', 'print'
    ]

  
  });


  tblProceso= $('#tblProceso').DataTable({
    dom: 'Bfrtip',
    ajax: {
      url: base_url + "pedidos/listarProceso",
      dataSrc: '',
    },
    columns: [
      { data: 'id_transaccion' },
      { data: 'monto' },
      { data: 'estado' },
      { data: 'fecha' },
      { data: 'email' },
      { data: 'nombre' },
      { data: 'apellido' },
      { data: 'direccion' },
      { data: 'accion' }
    ],
    language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json" // Carga las traducciones en español
    },
    buttons: [
      'copy', 'excel', 'pdf', 'print'
    ]

  
  });

  tblFinalizados= $('#tblFinalizados').DataTable({
    dom: 'Bfrtip',
    ajax: {
      url: base_url + "pedidos/listarFinalizados",
      dataSrc: '',
    },
    columns: [
      { data: 'id_transaccion' },
      { data: 'monto' },
      { data: 'estado' },
      { data: 'fecha' },
      { data: 'email' },
      { data: 'nombre' },
      { data: 'apellido' },
      { data: 'direccion' },
      { data: 'accion' }
    ],
    language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json" // Carga las traducciones en español
    },
    buttons: [
      'copy', 'excel', 'pdf', 'print'
    ]

  
  });


});

function cambiarProceso(idPedido, proceso) {
  Swal.fire({
    title: 'Aviso',
    text: "Estas segura de cambiar el estado!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, Cambiar!'
  }).then((result) => {
    if (result.isConfirmed) {

      const url = base_url + "pedidos/update/" + idPedido + "/" + proceso; // Definiendo la URL de destino
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
    
      // Estableciendo una función de devolución de llamada cuando cambia el estado de la solicitud
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
    
          const res = JSON.parse(this.responseText);
          if (res.icono == 'success') {
       
            tblPendientes.ajax.reload();
            tblProceso.ajax.reload();
            tblFinalizados.ajax.reload();
            
          }
      
          Swal.fire({
            title: 'Aviso',
            text: res.msg.toUpperCase(),
            icon: res.icono
          });
       
        }
      };
    }
  });
}
function verPedido(idPedido) {
  const url = base_url + "clientes/verPedido/" + idPedido;
  const http = new XMLHttpRequest();
  http.open('GET', url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      console.log(res);

      let html = '';
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
            <input data-id="${row.id}" style="max-width:50px;border:none;text-align:center;" readonly class="inputSub" value="${(parseFloat(row.precio) * parseFloat(row.cantidad)).toFixed(2)}">
          </td>
        </tr>`;
      });

      document.querySelector('#tblUsuarios tbody').innerHTML = html;
     
      myModal.show();
    }
  };
}




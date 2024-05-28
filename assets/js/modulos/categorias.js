const nuevo=document.querySelector('#nuevo_registro');
const frm = document.querySelector('#frmRegistro');
const titleModal = document.querySelector('#titleModal');
const btnAccion = document.querySelector('#btnAccion');
const myModal = new bootstrap.Modal(document.getElementById('nuevoModal'))
let tblCategorias;
document.addEventListener("DOMContentLoaded", function(){

    tblCategorias= $('#tblCategorias').DataTable({
    dom: 'Bfrtip',
    ajax: {
      url: base_url + "categorias/listar",
      dataSrc: '',
    },
    columns: [
      { data: 'id' },
      { data: 'categoria' },
      { data: 'imagen' },
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

  //levantar modal

nuevo.addEventListener('click', function () {
  document.querySelector('#id').value = '';
  document.querySelector('#imagen_actual').value = '';
  document.querySelector('#imagen').value = '';
  titleModal.textContent = 'NUEVA CATEGORIA';
  btnAccion.textContent = 'Registrar';
  frm.reset();
  
  myModal.show();
})

//submit categorias

frm.addEventListener('submit', function (e) {
  e.preventDefault();
  let data = new FormData(this); // Obteniendo los datos del formulario
  const url = base_url + "categorias/registrar"; // Definiendo la URL de destino
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(data);

  // Estableciendo una función de devolución de llamada cuando cambia el estado de la solicitud
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);

      const res = JSON.parse(this.responseText);
      if (res.icono == 'success') {
        myModal.hide();
        tblCategorias.ajax.reload();
        document.querySelector('#id').value = '';
        
      }
  
      Swal.fire({
        title: 'Aviso',
        text: res.msg.toUpperCase(),
        icon: res.icono
      })
   
    }
  }
})
});

function eliminarCat(idCat) {
  Swal.fire({
    title: 'Aviso',
    text: "Estas segura de eliminar el registro!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, Eliminar!'
  }).then((result) => {
    if (result.isConfirmed) {

      const url = base_url + "categorias/delete/" + idCat; // Definiendo la URL de destino
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
    
      // Estableciendo una función de devolución de llamada cuando cambia el estado de la solicitud
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
    
          const res = JSON.parse(this.responseText);
          if (res.icono == 'success') {
       
            tblCategorias.ajax.reload();
            
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

function editCat(idCat) {
  const url = base_url + "categorias/edit/" + idCat; // Definiendo la URL de destino
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();

  // Estableciendo una función de devolución de llamada cuando cambia el estado de la solicitud
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);

      const res = JSON.parse(this.responseText);
      document.querySelector('#id').value = res.id;
      document.querySelector('#categoria').value = res.categoria;
      document.querySelector('#imagen_actual').value = res.imagen;
      btnAccion.textContent = 'Actiualizar';
      titleModal.textContent = 'MODIFICAR CATEGORIA';
      myModal.show();
   
    }
  }
}


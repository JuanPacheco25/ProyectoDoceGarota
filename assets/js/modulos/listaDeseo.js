const tableLista = document.querySelector('#tableListaDeseo tbody')
document.addEventListener('DOMContentLoaded', function () {
  getListaDeseo()

})
function getListaDeseo() {
  const url = base_url + 'principal/listaProductos'
  const http = new XMLHttpRequest()
  http.open('POST', url, true)
  http.send(JSON.stringify(listaDeseo))
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText)
      let html = ''
      res.productos.forEach((producto) => {
        html += `<tr>
                <td>
                <img class="img-tabla" src="${
                  base_url + producto.imagen
                }" alt="" >
                
                </td>
                <td class="nombre-deseo">${producto.nombre}</td>
                <td><span class="precio-art">  ${
                  res.moneda + ' ' + producto.precio
                }</span>
              </td>
                <td><span class="cantidad-p">  ${producto.cantidad}</span></td>
                
                <td class="btn-deseo"> 
                <button class=" btnEliminarDeseo" type="button" prod="${
                  producto.id
                }"><i class="bi bi-trash"></i></button>
                <button class="btnAddCart" type="button" prod="${
                  producto.id
                }"><i class="bi bi-bag-plus"></i></button>
                </td>

            </tr>`
      })
      tableLista.innerHTML = html
      btnEliminarDeseo()
      btnAgregarProducto()
    }
  }
}
function btnEliminarDeseo() {
  let listaEliminar = document.querySelectorAll('.btnEliminarDeseo')
  for (let i = 0; i < listaEliminar.length; i++) {
    listaEliminar[i].addEventListener('click', function () {
      let idProducto = listaEliminar[i].getAttribute('prod')
      eliminarListaDeseo(idProducto)
    })
  }
}

function eliminarListaDeseo(idProducto) {
  for (let i = 0; i < listaDeseo.length; i++) {
    if (listaDeseo[i]['idProducto'] == idProducto) {
      listaDeseo.splice(i, 1)
    }
  }
  localStorage.setItem('listaDeseo', JSON.stringify(listaDeseo))
  getListaDeseo()
  cantidadDeseo()
  Swal.fire('AVISO', 'PRODUCTO ELIMINADO DE TU LISTA', 'success')
}
// agregar productos desde la lista de deseos
function btnAgregarProducto() {
  let listaAgregar = document.querySelectorAll('.btnAddCart')
  for (let i = 0; i < listaAgregar.length; i++) {
    listaAgregar[i].addEventListener('click', function () {
      let idProducto = listaAgregar[i].getAttribute('prod')
      agregarCarrito(idProducto, 1, true)
    })
  }
}

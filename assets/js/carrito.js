const verCarrito = document.querySelector('#verCarrito')
const tableListaCarrito = document.querySelector('#tableListaCarrito tbody')

//ver carrito
function getListaCarrito() {
  const url = base_url + 'principal/listaProductos'
  const http = new XMLHttpRequest()
  http.open('POST', url, true)
  http.send(JSON.stringify(listaCarrito))
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText)
      console.log(res);
      let html = ''
      res.productos.forEach((producto) => {
        html += `<tr>
                <td>
                <img class="img-tabla" src="${
                  base_url + producto.imagen
                }" alt="" width="100">
                
                </td>
                <td class="nombre-deseo">${producto.nombre}</td>
                <td class="precio-art">
                <input data-id="${
                  producto.id
                }" type="hidden" style="max-width:50px;border:none;text-align:center;" readonly class="inputPric" value="${
          producto.precio
        }">
                <span class="badge  bg-warning">  ${
                  res.moneda + ' ' + producto.precio
                }</span>
                </td>
                <td class="cantidad-p2" ><button data-id="${
                  producto.id
                }" class=" btn-dash minusQtyCart"><i class="bi bi-dash"></i></button><input data-id="${
          producto.id
        }" style="max-width:50px;border:none;text-align:center;" readonly class="inputQty" value="${
          producto.cantidad
        }"></span><button class=" btn-dash plusQtyCart" data-id="${
          producto.id
        }"><i class="bi bi-plus"></i></button></td>
                <td>
                <input data-id="${
                  producto.id
                }" style="max-width:50px;border:none;text-align:center;" readonly class="inputSub" value="${
          producto.subTotal
        }"></td>
                <td>
                <button class="btn-car-delete  btnDeletecart"  type="button" prod="${
                  producto.id
                }"><i class="bi bi-x-circle"></i></button>
                </td>
            </tr>`
      })
      tableListaCarrito.innerHTML = html
      document.querySelector('#totalGeneral').textContent = res.total
      btnEliminarCarrito()
    }
  }
}

function btnEliminarCarrito() {
  let listaEliminar = document.querySelectorAll('.btnDeletecart')
  for (let i = 0; i < listaEliminar.length; i++) {
    listaEliminar[i].addEventListener('click', function () {
      let idProducto = listaEliminar[i].getAttribute('prod')
      eliminarListaCarrito(idProducto)
    })
  }
}

function eliminarListaCarrito(idProducto) {
  for (let i = 0; i < listaCarrito.length; i++) {
    if (listaCarrito[i]['idProducto'] == idProducto) {
      listaCarrito.splice(i, 1)
    }
  }
  localStorage.setItem('listaCarrito', JSON.stringify(listaCarrito))
  getListaCarrito()
  cantidadCarrito()
  Swal.fire('AVISO', 'PRODUCTO ELIMINADO DEL CARRITO', 'success')
}

function updateInListaCarrito(idProducto, cantidad) {
  let listaCarrito = JSON.parse(localStorage.getItem('listaCarrito')) || []

  const index = listaCarrito.findIndex((item) => item.idProducto === idProducto)

  if (index !== -1) {
    listaCarrito[index].cantidad = cantidad
  }
  localStorage.setItem('listaCarrito', JSON.stringify(listaCarrito))
  sumColTotTable()
}

function sumColTotTable() {
  const totales = document.querySelectorAll(`input.inputSub`)
  let TOT = 0
  totales.forEach((element) => {
    TOT += parseFloat(element.value)
  })
  document.querySelector('#totalGeneral').innerText = TOT.toFixed(2)
}

document.addEventListener('DOMContentLoaded', function () {
  //ver carrito en la siguiennte página
  getListaCarrito()
  document.body.addEventListener('click', function (evt) {
    const elementPlusQTY = evt.target.closest('.plusQtyCart')
    const elementminQTY = evt.target.closest('.minusQtyCart')
    if (elementPlusQTY) {
      const id_product = elementPlusQTY.dataset.id
      const productQTY = parseInt(
        document.querySelector(`input.inputQty[data-id="${id_product}"]`).value
      )
      const productPrice = parseFloat(
        document.querySelector(`input.inputPric[data-id="${id_product}"]`).value
      )
      const valueTOT = productQTY + 1
      const valuePricTOT = parseFloat(valueTOT * productPrice).toFixed(2)
      document.querySelector(`input.inputQty[data-id="${id_product}"]`).value =
        valueTOT
      document.querySelector(`input.inputSub[data-id="${id_product}"]`).value =
        valuePricTOT
      updateInListaCarrito(id_product, valueTOT)
    }
    if (elementminQTY) {
      const id_product = elementminQTY.dataset.id
      const productQTY = parseInt(
        document.querySelector(`input.inputQty[data-id="${id_product}"]`).value
      )
      const productPrice = parseFloat(
        document.querySelector(`input.inputPric[data-id="${id_product}"]`).value
      )
      const valueTOT = productQTY - 1
      const valuePricTOT = parseFloat(valueTOT * productPrice).toFixed(2)
      if (valueTOT > 0) {
        document.querySelector(
          `input.inputQty[data-id="${id_product}"]`
        ).value = valueTOT
        document.querySelector(
          `input.inputSub[data-id="${id_product}"]`
        ).value = valuePricTOT
        updateInListaCarrito(id_product, valueTOT)
      } else {
        document.querySelector(
          `input.inputQty[data-id="${id_product}"]`
        ).value = 1
        document.querySelector(
          `input.inputSub[data-id="${id_product}"]`
        ).value = productPrice
        updateInListaCarrito(id_product, 1)
      }
    }
  })
})

// CONSTANTES GLOBALES
// elementos gobales
const $btnDeseo = document.querySelector('#btnCantidadDeseo')
const $btnCarrito = document.querySelector('#btnCantidadCarrito')
const $btnAddDeseo = document.querySelectorAll('.btnAddDeseo')
const $btnAddcarrito = document.querySelectorAll('.btnAddcarrito')

// var swiper = new Swiper('.swiper-container', {
//   navigation: {
//     nextEl: '.swiper-button-next',
//     prevEl: '.swiper-button-prev',
//   },
//   slidesPerView: 1,
//   spaceBetween: 10,

//   pagination: {
//     el: '.swiper-pagination',
//     clickable: true,
//   },

//   breakpoints: {
//     620: {
//       slidesPerView: 1,
//       spaceBetween: 20,
//     },
//     680: {
//       slidesPerView: 2,
//       spaceBetween: 40,
//     },
//     920: {
//       slidesPerView: 3,
//       spaceBetween: 40,
//     },
//     1240: {
//       slidesPerView: 4,
//       spaceBetween: 50,
//     },
//   },
// })

function cantidadDeseo() {
  
  $btnDeseo.textContent = 0
  let listas = JSON.parse(localStorage.getItem('listaDeseo'))
  if (listas != null) {
    $btnDeseo.textContent = listas.length
  }
}

function cantidadCarrito() {
  $btnCarrito.textContent = 0
  let listas = JSON.parse(localStorage.getItem('listaCarrito'))
  if (listas != null) {
    $btnCarrito.textContent = listas.length
  }
}

// Agregar producto a la lista de deseos
function agregarDeseo(idProducto) {
  for (let i = 0; i < listaDeseo.length; i++) {
    if (listaDeseo[i]['idProducto'] == idProducto) {
      Swal.fire('Aviso', 'El producto ya está en tu lista de deseos', 'warning')
      return
    }
  }

  listaDeseo.push({
    idProducto: idProducto,
    cantidad: 1,
  })

  localStorage.setItem('listaDeseo', JSON.stringify(listaDeseo))
  Swal.fire('Aviso', 'Producto agregado a la lista de deseos', 'success')
  cantidadDeseo()
}

// Agregar producto al carrito
function agregarCarrito(idProducto, cantidad, accion = false) {
  if (localStorage.getItem('listaCarrito') == null) {
    listaCarrito = []
  } else {
    listaCarrito = JSON.parse(localStorage.getItem('listaCarrito'))
  }

  for (let i = 0; i < listaCarrito.length; i++) {
    if (accion) {
      eliminarListaDeseo(idProducto)
    }
    if (listaCarrito[i]['idProducto'] == idProducto) {
      Swal.fire('Aviso', 'El producto ya está agregado', 'warning')
      return
    }
  }

  listaCarrito.push({
    idProducto: idProducto,
    cantidad: cantidad,
  })

  localStorage.setItem('listaCarrito', JSON.stringify(listaCarrito))
  Swal.fire('Aviso', 'Producto agregado al carrito', 'success')
  cantidadCarrito()
}


document.addEventListener('DOMContentLoaded', function () {
  for (let i = 0; i < $btnAddDeseo.length; i++) {
    $btnAddDeseo[i].addEventListener('click', function () {
      let idProducto = $btnAddDeseo[i].getAttribute('prod')
      agregarDeseo(idProducto)
    })
  }

  for (let i = 0; i < $btnAddcarrito.length; i++) {
    $btnAddcarrito[i].addEventListener('click', function () {
      let idProducto = $btnAddcarrito[i].getAttribute('prod')
      agregarCarrito(idProducto, 1)
    })
  }
  cantidadDeseo()
  cantidadCarrito()
})

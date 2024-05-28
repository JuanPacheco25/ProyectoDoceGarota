const frmLogin = document.querySelector('#frmLogin');
const correoLogin = document.querySelector('#correoLogin');
const claveLogin = document.querySelector('#claveLogin');
const login = document.querySelector('#login');
const btnModalLogin = document.querySelector('#btnModalLogin');
const inputBusqueda = document.querySelector('#inputModalSearch');

document.addEventListener('DOMContentLoaded', function () {
  frmLogin.addEventListener('submit', async function (e) {
    e.preventDefault()
    if (correoLogin.value == '' || claveLogin.value == '') {
      Swal.fire('AVISO', 'TODO LOS CAMPOS SON REQUERIDOS', 'warning')
      return 0
    }
    const url = base_url + 'Clientes/loginDirecto'
    let formData = new FormData()
    let loader = Swal.fire({
      icon: 'info',
      title: 'Verificando...',
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading()
      },
    })
    formData.append('correoLogin', correoLogin.value)
    formData.append('claveLogin', claveLogin.value)
    const response = await fetch(url, {
      method: 'POST',
      body: formData,
    }).then((response) => response.json())
    setTimeout(() => {
      loader.close()
      if (response.icono == 'success') {
        setTimeout(() => {
          location.href = `${base_url}Home`
        }, 1500)
      }
      Swal.fire({
        title: 'Aviso',
        text: response.msg,
        icon: response.icono,
      })
    }, 2000)
  })

 

  //busqueda de productos

 /* inputBusqueda.addEventListener('keyup', function (e) {
    const url = base_url + 'principal/busqueda/' + e.target.value;
       const http = new XMLHttpRequest()
       http.open('GET', url, true)
       http.send()
       http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
         // const res = JSON.parse(this.responseText)
       
        }
       }
  })*/
})

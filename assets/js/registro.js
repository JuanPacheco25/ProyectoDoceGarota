const frmRegister = document.querySelector('#frmRegister')
const nombreRegistro = document.querySelector('#nombreRegistro')
const apellidoRegistro = document.querySelector('#apellidoRegistro')
const correoRegistro = document.querySelector('#correoRegistro')
const claveRegistro = document.querySelector('#claveRegistro')
const veriRegistro = document.querySelector('#veriRegistro')

document.addEventListener('DOMContentLoaded', function () {
  //registro
  frmRegister.addEventListener('submit', async function (e) {
    e.preventDefault()
    if (
      nombreRegistro.value == '' ||
      correoRegistro.value == '' ||
      claveRegistro.value == ''
    ) {
      Swal.fire('AVISO', 'TODO LOS CAMPOS SON REQUERIDOS', 'warning')
      return
    }
    const url = base_url + 'Clientes/registroDirecto'
    let loader = Swal.fire({
      icon: 'info',
      title: 'Verificando...',
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading()
      },
    })
    let formData = new FormData()
    formData.append('nombre', nombreRegistro.value)
    formData.append('apellido', apellidoRegistro.value)
    formData.append('correo', correoRegistro.value)
    formData.append('clave', claveRegistro.value)
    const response = await fetch(url, {
      method: 'POST',
      body: formData,
    }).then((response) => response.json())
    setTimeout(() => {
      loader.close()
      if (response.icono == 'success') {
        frmRegister.reset()
        setTimeout(() => {
          location.href = `${base_url}Clientes`
        }, 1500)
      }
      Swal.fire({
        title: 'Aviso?',
        text: response.msg,
        icon: response.icono,
      })
    }, 2000)
  })
})

//funcion innecesaria

// function enviarCorreo(correo, token) {
//   let formData = new FormData()
//   formData.append('correo', correo)
//   formData.append('token', token)
//   const url = base_url + 'Clientes/enviarCorreo'
//   const http = new XMLHttpRequest()
//   http.open('POST', url, true)
//   http.send(formData)
//   http.onreadystatechange = function () {
//     if (this.readyState == 4 && this.status == 200) {
//       const res = JSON.parse(this.responseText)
//       Swal.fire('aviso?', res.msg, res.icono)
//       if (res.icono == 'success') {
//         setTimeout(() => {
//           window.location.reload()
//         }, 1000)
//       }
//     }
//   }
// }

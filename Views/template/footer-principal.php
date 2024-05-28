  <footer class="footer">

      <div class="container-footer">

          <div class="link">
              <h3>Doce Garota</h3>
              <ul>

                  <li>
                      <i class="fa-solid fa-location-dot"></i>
                      𝗖𝗮𝗿𝘁𝗮𝗴𝗲𝗻𝗮 𝗖𝗖 𝗹𝗮 𝗰𝗮𝘀𝘁𝗲𝗹𝗹𝗮𝗻𝗮 𝗹𝗼𝗰𝗮𝗹 𝟮𝟬𝟴

                  </li>

                  <li>
                      <i class="fa-solid fa-location-dot"></i>
                      𝗬𝗼𝗽𝗮𝗹 𝗖𝗖 𝗛𝗼𝗯𝗼 𝗹𝗼𝗰𝗮𝗹 𝟭𝟮𝟬

                  </li>

                 

                  <li><a href="https://api.whatsapp.com/send?phone=573015912023&text=Hola%20estoy%20interesad%40%20en%20un%20vestido%20de%20ba%C3%B1o.%F0%"
                          target="_blank">Diseños personalizados</a></li>
              </ul>
          </div>

          <div class="link">
              <h3>Ayuda</h3>
              <ul>
                  <li><a href="<?php echo BASE_URL; ?>principal/TyC/">Terminos y condiciones</a></li>
                  <li><a href="<?php echo BASE_URL; ?>principal/PyP/">Politica y Privacidad</a></li>
                  <li><a href="<?php echo BASE_URL; ?>principal/nosotros/">Quiénes somos</a></li>
                  <li><a href="<?php echo BASE_URL; ?>principal/PF/">Preguntas Frecuentes</a></li>
              </ul>
          </div>

          <div class="link">
              <h3>Redes</h3>
              <ul>
                  <li>
                      <a href="https://www.instagram.com/stories/docegarota4/3150048061652866261/" target="_blank">
                          <i class="fa-brands fa-instagram"></i>Instagram
                      </a>
                  </li>
                  <li>
                      <a href="https://www.tiktok.com/@docegarota4?is_from_webapp=1&sender_device=pc" target="_blank">
                          <i class="fa-brands fa-tiktok"></i>Tiktok
                      </a>
                  </li>
                  <li>
                      <a href="https://www.facebook.com/profile.php?id=100081786692902" target="_blank">
                          <i class="fa-brands fa-facebook"></i>Facebook
                      </a>
                  </li>
              </ul>
          </div>


      </div>
      <hr>

  </footer>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="<?php echo BASE_URL; ?>assets/js/app.js"></script>
  <!-- <script src="<?php echo BASE_URL . 'assets/DataTables/Buttons-2.4.2/js/buttons.html5.js'; ?>"></script> -->
  <script src="https://kit.fontawesome.com/b3ecef1479.js" crossorigin="anonymous"></script>
  <!-- <script src="<?php echo BASE_URL; ?>assets/js/jquery-1.11.0.min.js"></script> -->
  <script src="<?php echo BASE_URL; ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/slick.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script>
$(function() {
    $("#inputBusqueda").autocomplete({
        source: function(request, response) {
            const searchTerm = request.term;
            const url = base_url + 'principal/busqueda/' + searchTerm;
            $.ajax({
                type: 'GET',
                url: url,
                success: function(data) {
                    const _data = JSON.parse(data);
                    response(_data);
                },
                error: function(err) {
                    console.error(err);
                }
            });
        },
        select: function(event, ui) {
            const request = ui.item;
            console.log(request);
            const url_redirect = `${base_url}principal/detail/${request.id}`
            location.href = url_redirect;
            $("#inputBusqueda").val("");
            return false;
        }
    }).data('ui-autocomplete')._renderItem = (ul, item) => {
        const row_det = `<div class="autocomplete-container">
                <div class="autocomplete-image">
                    <img src="${base_url + item.imagen}">
                </div>
                <div class="autocomplete-description">${item.label}</div>
            </div>`;
        return $("<li class='ui-menu-item'></li>")
            .data("item.autocomplete", item)
            .append($("<div style='padding: 4px 4px;'></div>").html(row_det))
            .appendTo(ul);
    };
});
  </script>
  </body>

  </html>
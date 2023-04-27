
<!DOCTYPE html>
<html lang="es">
   <?php 
      require_once "index/head.html"; 
      require_once "index/preloader.html"; 
      require_once "index/header.html"; 
   ?>
   <body class="text-gray-700">
      <main id="content">
      <?php
         require_once "index/homeSection.html";
         require_once "index/aboutSection.html";
         require_once "index/gallerySection.html";
         require_once "index/asociadoSection.html";
      ?>
      </main>
      <?php 
         require_once "index/footer.html";
         require_once "index/scrollUp.html"; 
      ?>
      <?php 
         require_once "modals/tarifas.html";
         require_once "modals/oficinas.html";
         require_once "modals/calendario.php";
      ?>
      <script src="src/vendors/glightbox/dist/js/glightbox.min.js"></script>
      <script src="src/vendors/@splidejs/splide/dist/js/splide.min.js"></script>
      <script src="src/vendors/typed.js/lib/typed.min.js"></script>
      <script src="src/vendors/wow.js/dist/wow.min.js"></script>
      <script src="src/vendors/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
      <script src="src/js/flowbite.min.js"></script>
      <script src="src/js/jquery-3.6.4.min.js"></script>
      <script src="src/js/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"></script>
      <script src="src/js/theme.js"></script>
   </body>
</html>
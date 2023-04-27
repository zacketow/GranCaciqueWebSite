(function () {
  "use strict";

  /**
   * ------------------------------------------------------------------------
   * Functions
   * ------------------------------------------------------------------------
   */

  // Back to top button
  const myBacktotop = function () {
    // browser window scroll
    var offset = 300,
      offset_opacity = 1200,
      back_to_top = document.querySelector(".back-top"),
      scrollpos = window.scrollY;

    var add_class_back_scroll = function add_class_back_scroll() {
      back_to_top.classList.add("block");
      back_to_top.classList.remove("hidden");
    };

    var add_class_offset_scroll = function add_class_offset_scroll() {
      back_to_top.classList.add("opacity-90");
    };

    var remove_class_back_scroll = function remove_class_back_scroll() {
      back_to_top.classList.remove("block", "opacity-90");
      back_to_top.classList.add("hidden");
    };

    // back to top by es6-scroll-to
    var defaults = {
      duration: 400,
      easing: function easing(t, b, c, d) {
        return -c * (t /= d) * (t - 2) + b;
      },
      to: 0,
    };
    var animatedScrollTo = function animatedScrollTo(args) {
      if (isInteger(args)) {
        args = {
          to: args,
        };
      }
      var options = extend(defaults, args);
      options.startingYOffset = window.pageYOffset;
      options.distanceYOffset =
        parseInt(options.to, 10) - options.startingYOffset;
      window.requestAnimationFrame(function (timestamp) {
        return animateScroll(options, timestamp);
      });
    };
    var animateScroll = function animateScroll(options, now) {
      if (!options.startTime) {
        options.startTime = now;
      }
      var currentTime = now - options.startTime;
      var newYOffset = Math.round(
        options.easing(
          currentTime,
          options.startingYOffset,
          options.distanceYOffset,
          options.duration
        )
      );
      if (currentTime < options.duration) {
        window.requestAnimationFrame(function (timestamp) {
          return animateScroll(options, timestamp);
        });
      } else {
        newYOffset = options.to;
      }
      setScrollTopPosition(newYOffset);
    };
    var setScrollTopPosition = function setScrollTopPosition(newYOffset) {
      document.documentElement.scrollTop = newYOffset;
      document.body.scrollTop = newYOffset;
    };
    var isInteger = function isInteger(value) {
      if (Number.isInteger) {
        return Number.isInteger(value);
      } else {
        return (
          typeof value === "number" &&
          isFinite(value) &&
          Math.floor(value) === value
        );
      }
    };
    var extend = function extend(defaults, options) {
      var extendedOptions = {};
      for (var key in defaults) {
        extendedOptions[key] = options[key] || defaults[key];
      }
      return extendedOptions;
    };
    var easeInQuint = function easeInQuint(t, b, c, d) {
      return c * (t /= d) * t * t * t * t + b;
    };

    const scroll_a = document.querySelectorAll(".back-top");
    if (scroll_a != null) {
      for (var i = 0; i < scroll_a.length; i++) {
        scroll_a[i].addEventListener("click", function () {
          animatedScrollTo({
            easing: easeInQuint,
            duration: 800,
          });
        });
      }
    }

    window.addEventListener("scroll", function () {
      scrollpos = window.scrollY;
      if (scrollpos > offset) {
        add_class_back_scroll();
      } else {
        remove_class_back_scroll();
      }
      if (scrollpos > offset_opacity) {
        add_class_offset_scroll();
      }
    });
  };

  // Preloader
  const myPreloader = function () {
    var xpre = document.querySelector(".preloader");
    if (xpre != null) {
      window.addEventListener("load", function () {
        document.querySelector("body").classList.add("loaded-success");
      });
    }
  };

  // Lightbox
  const myLightbox = function () {
    // GLightbox
    const lightbox_class = document.querySelector(".glightbox3");
    if (lightbox_class != null) {
      const lightbox = GLightbox({
        selector: ".glightbox3",
        touchNavigation: true,
        loop: true,
        autoplayVideos: true,
      });
    }
  };

  // splidejs
  const mySplidejs = function () {
    // mySplidejs
    const postslider_class = document.querySelector("#post-carousel");
    if (postslider_class != null) {
      const postslider = new Splide(postslider_class, {
        rewind: true,
        pagination: true,
        arrows: true,
        type: "loop",
        drag: "free",
        perPage: 6,
        perMove: 1,
        gap: 24,
        breakpoints: {
          1200: {
            perPage: 4,
          },
          768: {
            perPage: 3,
          },
          500: {
            perPage: 2,
          },
        },
      });
      postslider.mount();
    }
  };

  // Typed Js
  const myTyped = function () {
    var x = document.querySelectorAll('[data-toggle="typed"]');
    "undefined" != typeof Typed &&
      x &&
      [].forEach.call(x, function (x) {
        !(function (x) {
          var typo = x.dataset.options;
          typo = typo ? JSON.parse(typo) : {};
          var object = Object.assign(
            {
              typeSpeed: 100,
              backSpeed: 100,
              backDelay: 1e3,
              loop: !0,
            },
            typo
          );
          new Typed(x, object);
        })(x);
      });
  };

  // wow animate
  const myWow = function () {
    new WOW().init();
  };

  // Smooth Scroll Anchor
  const mySmooth = function () {
    var scroll = new SmoothScroll('a[href*="#"]', {
      offset: 80,
      speed: 1200,
      speedAsDuration: true,
    });
  };

  // if scroll down
  const myScrollspy = function () {
    var scrollpos =
      document.body.scrollTop || document.documentElement.scrollTop;
    var nav_height = 80;
    var main_nav = document.querySelector(".main-nav");

    // navbar on scroll
    var add_class_on_scroll = function add_class_on_scroll() {
      return main_nav.classList.add("navbar-scrolled");
    };
    var remove_class_on_scroll = function remove_class_on_scroll() {
      return main_nav.classList.remove("navbar-scrolled");
    };

    var navCustom = function navCustom() {
      scrollpos = document.body.scrollTop || document.documentElement.scrollTop;

      if (scrollpos >= nav_height) {
        add_class_on_scroll();
      } else {
        remove_class_on_scroll();
      }
    };

    var navCustomone = function navCustomone() {
      var section = document.querySelectorAll(".section");
      if (section != null) {
        var sections = {};
        var i = 0;

        Array.prototype.forEach.call(section, function (e) {
          sections[e.id] = e.offsetTop;
        });

        window.onscroll = function () {
          var scrollPosition =
            document.documentElement.scrollTop || document.body.scrollTop;

          for (i in sections) {
            if (sections[i] <= scrollPosition + nav_height) {
              document
                .querySelector(".navbar>li>.active")
                .classList.remove("active");
              document
                .querySelector("a[href*=" + i + "]")
                .classList.add("active");
            }
          }
        };
      }
    };

    // if nav start not in top and not scroll
    window.addEventListener("load", function () {
      document.documentElement.scrollTop = 0;
      document.body.scrollTop = 0;
      navCustom();
      navCustomone();
    });

    // if nav scroll
    window.addEventListener("scroll", function () {
      navCustom();
      navCustomone();
    });
  };

  // menu mobile
  const menu_Mobile = function menu_Mobile() {
    var menu_dropa = document.querySelectorAll(".menu-mobile");
    var menu_menu_x = document.querySelectorAll(".navbar");

    var _loop = function _loop(i) {
      menu_dropa[i].addEventListener("click", function (event) {
        menu_dropa[i].classList.toggle("show");
        menu_menu_x[i].classList.toggle("hidden");
      });
      menu_menu_x[i].addEventListener("click", function (event) {
        menu_dropa[i].classList.toggle("show");
        menu_menu_x[i].classList.toggle("hidden");
      });
    };

    for (var i = 0; i < menu_dropa.length; i++) {
      _loop(i);
    }
  };

  // Custom JS
  const myCustom = function () {
    // insert your javascript in here
  };

  /**
   * ------------------------------------------------------------------------
   * Launch Functions
   * ------------------------------------------------------------------------
   */

  myBacktotop();
  myPreloader();
  menu_Mobile();
  myLightbox();
  mySplidejs();
  myTyped();
  myWow();
  mySmooth();
  myScrollspy();
  myCustom();
})();

$(document).ready(async function () {
  const clearCalendar = () => {
    $('#listViajes').html('')
  }
  const obtenerViajes = async (fecha,code) => {
    return axios.post(
      "https://consultas.grancaciqueexpress.com/consultar/fecha/consultar.php",
      {
        fecha: fecha,
        code: code,
      }
    );
  }
  const getTipoBarco = (totalMetros) => {
    if (totalMetros != 0) {
      return "Pasajeros y Vehiculos";
    } else  {
      return "Solo Pasajeros";
    }
  };
  const getDisp = (disponible, total) => {
    return parseFloat(((disponible * 100) / total).toFixed(2));
  };
  const getDispColor = (disponibilidad) => {
    if (disponibilidad >= 60 && disponibilidad <= 100) {
      return "fa-solid fa-circle-check text-green-500";
    }
    if (disponibilidad < 60 && disponibilidad >= 30) {
      return "fa-solid fa-circle-exclamation text-yellow-400";
    }
    if (disponibilidad < 30 && disponibilidad >= 0) {
      return "fa-solid fa-circle-xmark text-red-600";
    }
  };
  const getStatus = (status) => {
    switch (status) {
      case "VENDIENDO":
        return "VENDIENDO";
      case "EN TRANSITO":
        return "CULMINADO";
      case "CULMINADO":
        return "CULMINADO";
    }
  };
  const getColorStatus = (status) => {
    switch (status) {
      case "VENDIENDO":
        return "bg-success";
      case "EN TRANSITO":
        return "bg-danger";
      case "CULMINADO":
        return "bg-danger";
    }
  };
  const formatCurrencyBs = (val) => {
    return (
      "Bs. " +
      Intl.NumberFormat("es-VE", {
        maximumFractionDigits: 2,
        minimumFractionDigits: 2,
      }).format(val)
    );
  };
  const formatCurrencyDolar = (val) => {
    return (
      "$ " +
      Intl.NumberFormat("en-US", {
        maximumFractionDigits: 2,
        minimumFractionDigits: 2,
      }).format(val)
    );
  };
  let getData = await $.ajax({
    method: "GET",
    url: "src/api/tarifas.json",
    beforeSend: function () {
      $("#reporte").html(
        '<div class="my-3 row justify-content-center h-100"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>'
      );
    },
    error: function (err) {
      console.log(err);
      var response = err.responseJSON;
      $("#reporte").html(
        '<div class="my-3 row justify-content-center"><div class="col-auto"><div class="alert alert-danger" role="alert">' +
          (response.message || "Ha ocurrido un error desconocido") +
          "</div></div></div>"
      );
    },
    success: function (data) {
      var oficinas = {
        CUM: "Cumana",
        PDP: "Punta de Piedras",
        PLC: "Puerto la Cruz",
        ARY: "Araya",
      };
      var tasa_cambio = null;
      var rutas = {};

      data.forEach(function (tarifa) {
        var key =
          (oficinas[tarifa.origen] || tarifa.origen) +
          " - " +
          (oficinas[tarifa.destino] || tarifa.destino);
        if (!(key in rutas)) {
          rutas[key] = [];
        }
        if (!tasa_cambio) {
          tasa_cambio = tarifa.tasa_cambio;
        }
        rutas[key].push(`
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
      <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" style="width: 55vh;">${
        tarifa.descripcion_c
      }</td>
      <td class=" px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" ><span class="costotarifa" tarifaShow = 'usd' usd="${formatCurrencyDolar(
        tarifa.total
      )}" bs="${formatCurrencyBs(tarifa.ref)}">${formatCurrencyDolar(tarifa.total)}</span></td>
    </tr>
  `);
      });
      var container = $("#reporte");
      container.html("");
      $("#tasacambio").text(formatCurrencyBs(tasa_cambio));
      Object.keys(rutas).forEach((reportedata) => {
        container.append(`
  <div class="page mt-8 mb-8 shadow-md">
    <h3 class="text-center rounded-t-lg text-white bg-redgc">${reportedata}</h3>
    <div class="relative overflow-x-auto  rounded-b-lg">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-white uppercase bg-bluegc">
          <tr>
            <th scope="col" class="px-6 py-3">Tarifa</th>
            <th scope="col" class="px-6 py-3">Costo</th>
          </tr>
        </thead>
        <tbody>
          ${rutas[reportedata].join("\n")}
        </tbody>
      </table>
    </div>
  </div>
  `);
      });
    },
  });
  $(".costotarifa").each((index, data) => {
    var bs = $(data).attr("bs");
    var usd = $(data).attr("usd");
    let ts = $(data).attr("tarifaShow");
    setInterval(() => {
      $(data).fadeOut(function () {
        if (ts === "bs") {
          $(data).text(usd);
          ts = "usd";
        } else {
          $(data).text(bs);
          ts = "bs";
        }
        $(data).fadeIn();
      });
    }, 4000);
  });

  
  $("#consultarFecha").click( async () => {
    $("#calendar").hide();
    $('#spinnerCalendar').fadeIn();
    let viajes = (await obtenerViajes($("#fechaviaje").val(),'GC')).data;
    clearCalendar();
    if(!viajes.length){
      $('#listViajes').append('<div class="flex items-center space-x-4"><h5 class="text-xl text-center font-bold leading-none text-gray-900 ">No hay salidas disponibles para este día</h5></div>');
    } else {
      $('#fechaViaje').text(moment(viajes[0].fechaViaje).format('DD/MM/YYYY'));
      $('#listViajes').html('')
      viajes.forEach(viaje => {
        let iconShip = (viaje.total_metros) != 0 ? 'fa-ferry' : 'fa-ship';
        let disp = '<p class="text-sm font-medium text-gray-900 truncate ml-4">Pasajeros: '+getDisp(viaje.puestos,viaje.total_puestos)+'% <i class="'+getDispColor(getDisp(viaje.puestos,viaje.total_puestos))+'"></i></p>';
        if(viaje.total_metros != 0){ disp += '<p class="text-sm font-medium text-gray-900 truncate ml-4">Vehiculos: '+getDisp(viaje.metros,viaje.total_metros)+'% <i class="'+getDispColor(getDisp(viaje.metros,viaje.total_metros))+'"></i></p>';}
        
        $('#listViajes').append(`<li class="py-3 sm:py-4">
        <div class="flex items-center space-x-4">
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate">
                    <b>Origen:</b> `+viaje.origen+`
                </p>
                <p class="text-sm font-medium text-gray-900 truncate">
                    <b>Destino:</b> `+viaje.destino+`
                </p>
                <p class="text-sm font-medium text-gray-900 truncate `+getColorStatus(viaje.estatusSalida)+`">
                    <b>Estatus:</b> `+getStatus(viaje.estatusSalida
                      )+`
                </p>
                <p class="text-sm font-medium text-gray-900 truncate">
                   <b>Disponibilidad:</b>
                </p>
                `+disp+`
                <p class="text-sm text-black truncate underline underline-offset-8">
                `+ getTipoBarco(viaje.total_metros) +`
                </p>
            </div>
            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                `+viaje.hora_salida+`
            </div>
        </div>
    </li>`)
      })
    }
    $('#spinnerCalendar').fadeOut(()=>{
      $("#calendar").fadeIn();
    });
    
  });

});

/*---------------------------------------------------------------------
    File Name: custom.js
---------------------------------------------------------------------*/

$(function () {
    "use strict";

    /* Preloader
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    // setTimeout(function () {
    // 	$('.loader_bg').fadeToggle();
    // }, 1500);

    /* Tooltip
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    /* Mouseover
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $(document).ready(function () {
        $(".main-menu ul li.megamenu").mouseover(function () {
            if (!$(this).parent().hasClass("#wrapper")) {
                $("#wrapper").addClass("overlay");
            }
        });
        $(".main-menu ul li.megamenu").mouseleave(function () {
            $("#wrapper").removeClass("overlay");
        });
        if ($("#homePage").hasClass("active")) {
            $.get("pages/home.php", (menu) => {
                $("#content").html(menu);
                $.get('api/noticias.json',noticias => {
                    noticias.forEach(noticias => {
                    $('#noticias').append('<div class="col-md-12 margin_top40"><div class="row d_flex"><div class="col-md-5"><div class="news_img text-center">'+
                    '<figure><img style="width:400px;height:400px;object-fit: cover;" src="'+noticias.foto+'" /></figure></div></div><div class="col-md-7"><div class="news_text">'+
                    '<h3>'+noticias.titulo+'</h3>'+
                    '<span><a target="_blank" href="'+noticias.link+'">Ver mas</a></span>'+
                    '<p>'+noticias.texto+'</p>'+
                    '</div></div></div></div>'
                    )
                    })
                    $(".loader_bg").fadeOut();
            },'JSON');
            });
        }
    });

    function getURL() {
        window.location.href;
    }
    var protocol = location.protocol;
    

    /* Toggle sidebar
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

    $(document).ready(function () {
        $("#sidebarCollapse").on("click", function () {
            $("#sidebar").toggleClass("active");
            $(this).toggleClass("active");
        });
    });

    /* Product slider 
     -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
    // optional
    $("#blogCarousel").carousel({
        interval: 5000,
    });
});
let collapseMenu = () => {
    if(screen.width <= 767){
        $('.navbar-collapse').toggle('collapse')
    }
}
$('#menuCollapse').click(()=>{
    collapseMenu();
})
$("select").on("click", function () {
    $(this).parent(".select-box").toggleClass("open");
});

$(document).mouseup(function (e) {
    var container = $(".select-box");

    if (container.has(e.target).length === 0) {
        container.removeClass("open");
    }
});

$("select").on("change", function () {
    var selection = $(this).find("option:selected").text(),
        labelFor = $(this).attr("id"),
        label = $("[for='" + labelFor + "']");

    label.find(".label-desc").html(selection);
});

let itemMenu = (li) => {
    collapseMenu();
    let docmenu = "pages/"+$(li).attr('datamenu')+".php"
    $(".nav-item").removeClass("active");
    $(li).parent("li").addClass("active");
    $(".loader_bg").show();
    $.get(docmenu, (menu) => {
        $("#content").html(menu);
        $(".loader_bg").fadeOut();
    });
};


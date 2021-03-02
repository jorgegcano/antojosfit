jQuery(document).ready($ => {

    $('.site-header .menu-principal .menu').slicknav({
        label: '',
        appendTo: '.barra-navegacion',
    });

    $('nav.menu-principal-3').prepend("<div><span>Ir a otra Categoría<i class='fas fa-chevron-circle-down'></i></span></div>");
    $("nav.menu-principal-3 div span").click(function () {
        $("#menu-menu-3").slideToggle();
    });

    $(".sbi_follow_btn.sbi_custom a svg").remove();
    $("#gallery-2").remove();

    //Agregar Slider
    /**/
    if ($('.woocommerce-product-gallery').length > 0) {
        $('.woocommerce-product-gallery').bxSlider({
            auto: true,
            mode: 'fade',
            pause: 3000,
            autoControls: false,
            controls: false,
        });
    }
	/**/

    $('.single_add_to_cart_button').prepend('<i class="fas fa-shopping-cart">')

    //Validar aceptación de política de privacidad
    $('.form-submit').click(function (event) {
        if (!$('#agdpr-consentimiento').is(":checked")) {
            alert("Debes aceptar la política de privacidad")
            event.preventDefault();
        }
    });

    $('.wpcf7-form-control.wpcf7-submit').click(function (event) {
        alert("Debes aceptar la política de privacidad")
        if (!$('.wpcf7-form-control.wpcf7-acceptance input').is(":checked")) {
            alert("Debes aceptar la política de privacidad")
            event.preventDefault();
        }
    });

    //Añade la clase current-page-item en todo momento a los items del menú
    $('.archive.category .current_page_parent').addClass('current_page_item')
    $('.post-template-default.single .current_page_parent').addClass('current_page_item')
    $('.archive.tax-product_cat #menu-item-205').addClass('current_page_item')
    $('.product-template-default.single #menu-item-205').addClass('current_page_item')

});

//Hay que agregar función para que escuche al ensanchar o estrechar la pantalla
if (window.location.pathname == '/') {
    console.log("HOMEPAGE")
    if (window.matchMedia("(min-width: 991px)").matches) {
        console.log("inicio a 991px o más")
        window.onscroll = () => {
            const scroll = window.scrollY;
            const headerNav = document.querySelector('.barra-navegacion');
            const logo = document.querySelector('.logo');
            const logoMinimizado = document.querySelector('.logo-minimizado');
            if (scroll > 195) {
                headerNav.classList.add('fixed-top');
                headerNav.classList.add('ft-activo');
                logo.style.display = 'none';
                logoMinimizado.style.display = 'flex';
            } else {
                headerNav.classList.remove('fixed-top');
                headerNav.classList.remove('ft-activo');
                logo.style.display = 'flex'
                logoMinimizado.style.display = 'none'
            }
        }
    }

} else {
    if (window.matchMedia("(min-width: 991px)").matches) {
        const sidebar = document.querySelector('.post-template-default .sidebar');
        const footerHeight = document.querySelector('.post-template-default .site-footer').offsetHeight;
        const contenedor = document.querySelector(".contenedor.pagina.seccion.con-sidebar").offsetWidth
        const contenidoPrincipal = document.querySelector(".contenido-principal").offsetWidth
        const alturaSinFooter = document.querySelector("main").offsetHeight - footerHeight - 350
        //console.log("altura main: " + alturamain)
        //console.log("altura footer: " + footerHeight)
        //console.log("altura sin footer: " + alturaSinFooter)
        const sidebarWidth = contenedor - contenidoPrincipal - 40;
        sidebar.style.width = sidebarWidth + "px";
        window.onscroll = () => {
            const scroll = window.scrollY;
            if (scroll > 144) {
                sidebar.classList.add('fixed-sidebar');
                if (scroll < alturaSinFooter) {
                    sidebar.classList.add('fixed-sidebar');
                    sidebar.style.top = 0;
                    sidebar.style.bottom = "unset";
                } else {
                    sidebar.style.top = "unset";
                    sidebar.style.bottom = "0";
                    sidebar.classList.remove('fixed-sidebar');
                    sidebar.style.display = "grid";
                    sidebar.style.alignSelf = "flex-end";
                }
            } else {
                sidebar.classList.remove('fixed-sidebar');
                sidebar.style.display = "block";
                sidebar.style.alignSelf = "unset";
            }
        }
    }
}

/*
    //Mapa de Leaflet
    const lat = document.querySelector('#lat').value;
    const lng = document.querySelector('#lng').value;
    const direccion = document.querySelector('#direccion').value;

    if (lat && lng && direccion) {
        var map = L.map('mapa').setView([lat, lng], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([lat, lng]).addTo(map)
        .bindPopup(direccion)
            .openPopup();
    }
*/

//$(".comment-form-rating .stars").append("<span>")
    //$(".comment-form-rating .stars").append("<span>")
/*
    $(".stars span a").addClass("fas fa-star")

    $(".stars span a").hover(function () {
        $(this).prevAll().toggleClass("filled")
        $(this).toggleClass("filled")
    });

    $(".stars span a").click(function () {
            $(this).prevAll().addClass("fas filled-click")
            $(this).addClass("fas filled-click")
            $(this).nextAll().removeClass("filled-click")
    });
    */

    //$(".woocommerce-product-gallery__image a, .woocommerce-product-gallery__wrapper div").contents().unwrap();

/*
    $('#tab-reviews').insertAfter(".related.products");
    $( ".woocommerce-review-link" ).click(function() {
        $( "#tab-reviews" ).toggle();
    });
    */

    //$(".quantity input[name=quantity]").attr("disabled", true);

    /*
    $(".quantity input[name=quantity]").change(function () {
        if ($(".quantity input[name=quantity]").val() === $("#max-value").val()) {
            console.log("solo puedes comprar" + $("#max-value").val());
            //$(this).attr("disabled", true);
            $(".minus.qib-button").attr("disabled", false);
            $(".quantity input[name=quantity]").val($("#max-value").val());
            $('<p class="error-exceeded">Pedido máximo de '+$("#max-value").val()+' unidades</p>').insertAfter('.single_add_to_cart_button')
        }
        if ($(".quantity input[name=quantity]").val() < 2) {
            console.log("Al menos debes comprar uno");
            //$(this).attr("disabled", true);
            $(".plus.qib-button").attr("disabled", false);

        }
    });

    $(".minus.qib-button").click(function() {
        $('.error-exceeded').remove();
    });
    */

    /*
    if ($("#aux").val() && $("#aux").val(1)) {
        console.log("carro lleno")
        $("form.cart").css("opacity", "0.5");
        $("form.cart .single_add_to_cart_button").attr("disabled", true);
        $("form.cart .quantity input[name=quantity]").attr("disabled", true);
        $("form.cart .plus.qib-button").attr("disabled", true);
        $("form.cart .minus.qib-button").attr("disabled", true);
        $('form.cart .choice .pofw-option').attr("disabled", true);
        $('<p class="error-exceeded">Pedido máximo de '+$("#max-value").val()+' unidades alcanzado</p>').insertAfter('.single_add_to_cart_button')
    } else {
        $('.error-exceeded').remove();
    }
    */
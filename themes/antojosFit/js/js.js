jQuery(document).ready($ => {
    $('.site-header .menu-principal .menu').slicknav({
        label: '',
        appendTo: '.barra-navegacion',
    });

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

    $(".sbi_follow_btn.sbi_custom a svg").remove();
    $("#gallery-2").remove();


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

       //Agregar Slider
    /**/
    if ($('.woocommerce-product-gallery').length > 0) {
        $('.woocommerce-product-gallery').bxSlider({
            auto: true,
            mode: 'fade',
            pause: 6000,
            autoControls: false,
            controls: false,
        });
    }
	/**/

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

    $('.single_add_to_cart_button').prepend('<i class="fas fa-shopping-cart">')

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
            const documentBody = document.querySelector('body');
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
    } else {
        console.log("inicio a menos de 991px")
    }
}



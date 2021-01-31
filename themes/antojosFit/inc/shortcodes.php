<?php

//[foobar]
function antojosfit_ubicacion_shortcode( $atts ){
    $ubicacion = get_field('ubicacion');

    ?>

    <div>
        <input type="hidden" id="lat" value="<?php echo $ubicacion['lat']; ?>"/>
        <input type="hidden" id="lng" value="<?php echo $ubicacion['lng']; ?>"/>
        <input type="hidden" id="direccion" value="<?php echo $ubicacion['address']; ?>"/>
        <div id="mapa"></div>
    </div>

<?php
}

add_shortcode( 'antojosfit_ubicacion', 'antojosfit_ubicacion_shortcode' );



?>
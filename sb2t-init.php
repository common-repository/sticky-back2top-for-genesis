<?php 
// ADD SCRIPTS AND STYLES

add_action( 'wp_enqueue_scripts', 'sb2t_genesis_check' );
add_action( 'wp_enqueue_scripts', 'sb2t_script' );
add_action( 'wp_enqueue_scripts', 'sb2t_inline_styles');

function sb2t_genesis_check() {
	/** Check for activated Genesis Framework (= template/parent theme) */
    if ( basename( get_template_directory() ) != 'genesis' ) {
        add_action( 'wp_head', 'sb2t_anchor');
	} else {
        add_action( 'genesis_before', 'sb2t_anchor');
    };
};  // end of function


function sb2t_script() {
    wp_register_script( 'sb2t-script', plugins_url( 'js/plugin.js', __FILE__ ), array( 'jquery' ), '0.1', true );
    wp_enqueue_script( 'sb2t-script' );  
}

function sb2t_inline_styles() {
    /* Set up main css styles */
    wp_enqueue_style( 'sb2t-styles', plugins_url( 'css/sb2t-styles.css', __FILE__ ));
    
    /*  add custom color and image to background 
        TODO:  Check if selected 'no' to background color and change opacity to 0 */  
    $sb2t_color = 'rgba(' . hex2RGB(esc_attr( get_option('sb2t_color') ) ) . ', 0.7)';

    switch (esc_attr( get_option('sb2t_pointer'))){
        case "arrow":
            $sb2t_arrow = ' url(' . plugins_url ( 'images/arrow.svg', __FILE__ ) . ') ';
            break;
        case "bigarrow":
            $sb2t_arrow = ' url(' . plugins_url ( 'images/bigarrow.svg', __FILE__ ) . ') ';
            break;
        case "dblarrow":
            $sb2t_arrow = ' url(' . plugins_url ( 'images/doublearrow.svg', __FILE__ ) . ') ';
            break;
        case "circlearrow":
            $sb2t_arrow = ' url(' . plugins_url ( 'images/circlearrow.svg', __FILE__ ) . ') ';
            break;
        case "chevron":
            $sb2t_arrow = ' url(' . plugins_url ( 'images/chevron.svg', __FILE__ ) . ') ';
            break;
        case "triround":
            $sb2t_arrow = ' url(' . plugins_url ( 'images/triangle-rounded.svg', __FILE__ ) . ') ';
            break;
        case "rewindbott":
            $sb2t_arrow = ' url(' . plugins_url ( 'images/rewind_bottom.svg', __FILE__ ) . ') ';
            break;
        case "rewindleft":
            $sb2t_arrow = ' url(' . plugins_url ( 'images/rewind_left.svg', __FILE__ ) . ') ';
            break;
        case "rewindtop":
            $sb2t_arrow = ' url(' . plugins_url ( 'images/rewind_top.svg', __FILE__ ) . ') ';
            break;
        case "rewindright":
            $sb2t_arrow = ' url(' . plugins_url ( 'images/rewind_right.svg', __FILE__ ) . ') ';
            break;
        case "topunder":
            $sb2t_arrow = ' url(' . plugins_url ( 'images/topunderarrow.png', __FILE__ ) . ') ';
            break;
        case "totop":
            $sb2t_arrow = ' url(' . plugins_url ( 'images/totop.svg', __FILE__ ) . ') ';
            break;
        case "none":
            $sb2t_arrow = '';
            break;
        default:
            $sb2t_arrow = ' url(' . plugins_url ( 'images/arrow.svg', __FILE__ ) . ') ';
    }

    /* update for custom position */
    switch (esc_attr( get_option( 'sb2t_location'))){
        case "left":
            $sb2t_position = 'left: 10px';
            break;
        case "center":
            $sb2t_position = 'left: 47%';
            break;
        case "right":
            $sb2t_position = 'right: 10px';
            break;
        default:
            $sb2t_position = 'right: 10px';
    }
    
    /* update for sizing */
    switch (esc_attr( get_option( 'sb2t_size'))){
        case "small":
            $sb2t_sizing = 'height: 30px;
                            width: 30px';
            break;
        case "medium":
            $sb2t_sizing = 'height: 40px;
                            width: 40px';
            break;
        case "large":
            $sb2t_sizing = 'height: 55px;
                            width: 55px';
            break;
        default:
            $sb2t_sizing = 'height: 40px;
                            width: 40px';
    }

    /* update background shape */
    $sb2t_boxShadow = "2px 4px 8px rgba(0,0,0,0.2)";  /* reset if previously selected no shape */

    switch (esc_attr ( get_option( 'sb2t_shape'))) {
        case "square":
            $sb2t_borderRadius = "inherit";
            break;
        case "circle":
            $sb2t_borderRadius = "50%";
            break;
        case "none":
            $sb2t_borderRadius = "inherit";
            $sb2t_color = "rgba(0,0,0,0)";
            $sb2t_boxShadow = "2px 4px 8px rgba(0,0,0,0)";
            break;
        default:
            $sb2t_borderRadius = "auto";
            break;
    }

    /* create new css block */
    $sb2t_backgroundColor = 'background-color: ' . $sb2t_color;
    $sb2t_backgroundImage = 'background-image: ' . $sb2t_arrow;
    $sb2t_boxShadow = 'box-shadow: ' . $sb2t_boxShadow;
    $sb2t_borderRadius = 'border-radius: ' . $sb2t_borderRadius;

    $custom_css = "
        .sb2t {
            {$sb2t_backgroundColor};
            {$sb2t_backgroundImage};
            {$sb2t_position};
            {$sb2t_sizing};
            {$sb2t_boxShadow};
            {$sb2t_borderRadius};
        }"; 

    /* add new block inline to the existing page and css */
    wp_add_inline_style( 'sb2t-styles', $custom_css );
}

function sb2t_anchor() {
    /* adds topline tag so we know where to return! */
	 echo '<a href="#0" class="sb2t" title="Back To Top"> </a>';
}

function hex2RGB($hexStr = '#000000') {
    /* Convert hex values to rgb, so that we can make rgba w opacity */
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    return implode(',', $rgbArray); // returns the rgb string
}

?>
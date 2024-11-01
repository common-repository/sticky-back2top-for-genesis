<?php 
	settings_errors();
    echo ( basename( get_template_directory() ) == 'genesis' ) ? '<h3>OPTIMIZED FOR GENESIS</h3>' : '<h3>Works On All Themes</h3>';
?>
<script type="text/javascript">
	window.onload=function(){
		var updateSCR = showArrow();
        var updateADS = setAds();
	};
</script>

    <!-- TODO:  
        *  Add color select option for arrows
        *  Add dark background option in demo area
    -->


<div class="wrap">
    <h2>Sticky Back2Top Settings</h2><div style="display: inline-block; text-align: right;" id="showSaved"></div>
    <p>Sticky Back2Top Universal gets your visitors back to the top with a clean and configurable sticky button on any webiste, and is optimized for Genesis child themes.</p> 
    <br/>
    
    <form method="post" action="options.php">
        <?php 
            settings_fields( 'sb2t-plugin-settings-group' );
            do_settings_sections( 'sb2t-plugin-settings-group' );
            $sb2t_location = esc_attr( get_option( 'sb2t_location' )); 
                if ( $sb2t_location == '') $sb2t_location = 'right'; 
            $sb2t_pointer = esc_attr( get_option( 'sb2t_pointer' )); 
                if ( $sb2t_pointer == '') $sb2t_pointer = 'arrow';
            $sb2t_color = esc_attr( get_option('sb2t_color') );
            $sb2t_size = esc_attr( get_option( 'sb2t_size' )); 
                if ( $sb2t_size == '') $sb2t_size = 'medium'; 
            $sb2t_shape = esc_attr( get_option( 'sb2t_shape' )); 
                if ( $sb2t_shape == '') $sb2t_shape = 'square'; 
        ?>

    <style type="text/css">  /* configure table style */
        .sb2table  {border-collapse:collapse;border-spacing:0;border:none;}
        .sb2table td {padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
        .sb2table th {padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
        .sb2table .sb2table-gen {vertical-align:top}
        .sb2table .sb2table-demo {font-weight:bold;background-color:white;color:#330001;text-align:left;vertical-align:top;border:1px solid black;float:center;}
    </style>
    
    <table class="form-table sb2table" width=80%>
        <tr>
            <th class="sb2table-gen">Block Color:</th>
            <td class="sb2table-gen">
                <input type="color" name="sb2t_color" onchange="showArrow()" value="<?php echo esc_attr( get_option('sb2t_color') ); ?>" />
            </td>    
            <td class="sb2table-demo" rowspan="4" style="width:350px; height:200px; background-size: contain;" background="<?php echo plugins_url( 'images/demopage.png', dirname(__FILE__) ) ?>">                          
                <div id="sb2t-demo"  style="	
                        display:inline-block;
                        position:relative;
                        left:85%;
                        top:82%;
                        box-shadow:2px 4px 8px rgba(0,0,0,0.2);
                        background-repeat:no-repeat;
                        background-position:center;
                        background-size:75%;
                        overflow:hidden;
                        text-indent:100%;
                        white-space:nowrap;
						-webkit-transition:all .4s;
						-moz-transition:all .4s;
						transition:all .4s;
						">
                </div> 
            </td>
        </tr>

        <tr>
           <th class="sb2table-gen">Block Shape:</th>
            <td class="sb2table-gen">
                <fieldset onchange="showArrow()">                          
                    <input type="radio" name="sb2t_shape" value="square" <?php if( $sb2t_shape == 'square') echo "checked "  ?>> Square (Default) &nbsp;
                    <input type="radio" name="sb2t_shape" value="circle" <?php if( $sb2t_shape == 'circle') echo "checked "  ?> > Circle &nbsp; 
                    <input type="radio" name="sb2t_shape" value="none" <?php if( $sb2t_shape == 'none') echo "checked "  ?> > None 
                </fieldset>
            </td>
        </tr>

        <tr>
            <th class="sb2table-gen">Pointer Type:</th>
            <td class="sb2table-gen">
                <select name="sb2t_ptype" id="sb2t_ptype" onchange="showType()" >
                    <option value="arrows" <?php if( $sb2t_ptype == 'arrows') echo "selected "  ?>> Arrows &nbsp;
                    <option value="loops" <?php if( $sb2t_ptype == 'loops') echo "selected "  ?>> Loops &nbsp;
                    <option value="other" <?php if( $sb2t_ptype == 'other') echo "selected "  ?> > Other                
                </select>
            </td>
        </tr>

        <tr>
            <th class="sb2table-gen">Pointer Shape:</th>
            <td class="sb2table-gen">
                <select name="sb2t_pointer" id="sb2t_pointer" onchange="showArrow()" >
                    <option value="arrow" <?php if( $sb2t_pointer == 'arrow') echo "selected "  ?>> Arrow (default) &nbsp;
                    <option value="bigarrow" <?php if( $sb2t_pointer == 'bigarrow') echo "selected "  ?>> Big Arrow &nbsp;
                    <option value="dblarrow" <?php if( $sb2t_pointer == 'dblarrow') echo "selected "  ?>> Double Arrow &nbsp;
                    <option value="circlearrow" <?php if( $sb2t_pointer == 'circlearrow') echo "selected "  ?>> Circle Arrow &nbsp;
                    <option value="chevron" <?php if( $sb2t_pointer == 'chevron') echo "selected "  ?>> Chevron &nbsp;
                    <option value="triround" <?php if( $sb2t_pointer == 'triround') echo "selected "  ?>> Triangle &nbsp;
                    <option value="rewindbott" <?php if( $sb2t_pointer == 'rewindbott') echo "selected "  ?>> Rewind - bottom &nbsp;
                    <option value="rewindleft" <?php if( $sb2t_pointer == 'rewindleft') echo "selected "  ?>> Rewind - left &nbsp;
                    <option value="rewindtop" <?php if( $sb2t_pointer == 'rewindtop') echo "selected "  ?>> Rewind - top &nbsp;
                    <option value="rewindright" <?php if( $sb2t_pointer == 'rewindright') echo "selected "  ?>> Rewind - right &nbsp;                    
                    <option value="totop" <?php if( $sb2t_pointer == 'totop') echo "selected "  ?> > To Top &nbsp;                
                    <option value="none" <?php if( $sb2t_pointer == 'none' ) echo "selected "  ?> > Empty
                </select>
            </td>
        </tr>

        <tr>
            <th class="sb2table-gen">Location: </th>
            <td class="sb2table-gen">
                <fieldset onchange="showArrow()">                          
                    <input type="radio" name="sb2t_location" value="left" <?php if( $sb2t_location == 'left') echo "checked "  ?>> Left &nbsp;
                    <input type="radio" name="sb2t_location" value="center" <?php if( $sb2t_location == 'center') echo "checked "  ?> > Center &nbsp; 
                    <input type="radio" name="sb2t_location" value="right" <?php if( $sb2t_location == 'right') echo "checked "  ?> > Right (default) 
                </fieldset>
            </td>
        </tr>

        <tr>
            <th class="sb2table-gen">Size: </th>            
            <td class="sb2table-gen">
                <fieldset onchange="showArrow()">     
                    <input type="radio" name="sb2t_size" value="small" <?php if( $sb2t_size == 'small') echo "checked "  ?>> Small &nbsp;
                    <input type="radio" name="sb2t_size" value="medium" <?php if( $sb2t_size == 'medium') echo "checked "  ?> > Medium (default) &nbsp; 
                    <input type="radio" name="sb2t_size" value="large" <?php if( $sb2t_size == 'large') echo "checked "  ?> > Large
                </fieldset>
            </td>
        </tr>
    </table>
    <br/><hr>
        <?php submit_button(); ?>    
    </form>

    <br/><br/><hr>
    <h3>Need More?</h3>
    <p>If this doesn't quite do what you want or you need other help with your WordPress site, 43Folders would be happy to help! Visit our website at <a href="http://43folderstech.net">http://43folderstech.net</a> or send an email to me directly <a href="mailto:michael@43folderstech.net">michael@43folderstech.net</a> </p>
    <p>If you needed this for a client, or appreciate the effort for you own site, I'd totally let you buy me a cup of coffee. PayPal me at <a href="http://paypal.me/43folders">http://paypal.me/43folders</a> and thanks! </p>
    <br/>
    Thanks!
    <table style="text-align:center;width:100%;">
        <tr> <td style="text-align:center;">
                <span id="bannerAds">
                    <iframe src="//rcm-na.amazon-adsystem.com/e/cm?o=1&p=48&l=ur1&category=computers_accesories&banner=18NF42N6YZP5BAY6YXG2&f=ifr&linkID=01ab4b3cdf358055bc6859c12fe58544&t=teonwr983f-20&tracking_id=teonwr983f-20" width="728" height="90" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
                </span>
            </td>
        </td></tr>
    </table>
</div>

  
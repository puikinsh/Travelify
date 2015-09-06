/**
 * Custom Control javascript.
 *

 /**
 * JS for slider sorting saving
 */
jQuery(window).load( function (){console.log("uI");
  jQuery('.featured-slider-sortable').sortable({
        handle: 'label',
        update: function(event, ui) {console.log("HI");
            var index = 1;
            var attrname = jQuery(this).find('input:first').attr('name');
            var attrbase = attrname.substring(0, attrname.indexOf('][') + 1);
            jQuery(this).find('li').each(function() {
                jQuery(this).find('.count').html(index);
                jQuery(this).attr('id', 'customize-control-travelify_theme_options-featured_post_slider-' + index);
                jQuery(this).find('input').attr('name', attrbase + '[' + index + ']');
                
                index++
            });
            arrtojson();
        }
    })
    
    jQuery('.featured-slider-sortable li input').change( function () {console.log("HI");
        arrtojson();
    })
    
    function arrtojson(){
        var arr = [];
        jQuery('.featured-slider-sortable li').each(function( index ){            
                val = jQuery(this).find("input").val();
                arr[index+1] = val;
        })
        slider_data = JSON.stringify(arr);
        console.log(slider_data);
        jQuery("#featured_slider").val(slider_data).trigger('change');
    }
  });
(function( $ ) {
    "use strict";
 
    wp.customize( 'tcx_link_color', function( value ) {
        value.bind( function( to ) {
            $( 'a' ).css( 'color', to );
        } );
    });

    wp.customize( 'tcx_display_header', function( value ) {
	    value.bind( function( to ) {
	        false === to ? $( '#header' ).hide() : $( '#header' ).show();
	    } );
	} );

	wp.customize( 'tcx_color_scheme', function( value ) {
	    value.bind( function( to ) {
	 
	        if ( 'inverse' === to ) {
	 
	            $( 'body' ).css({
	                background: '#000',
	                color:      '#fff'
	            });
	 
	        } else {
	 
	            $( 'body' ).css({
	                background: '#fff',
	                color:      '#000'
	            });
	 
	        }
	 
	    });
	});

	wp.customize('tcx_custom_header_logo',function(value){
    	value.bind(function(to){
    		$("#header_logo").attr('src',to);
    	});
    });

    wp.customize('tcx_drinkentrepreneurs_date',function(value){
    	value.bind(function(to){
    		console.log(to);
    		$("#event_date").text(moment(to).calendar());
    	});
    });

    wp.customize('tcx_drinkentrepreneurs_venue',function(value){
    	value.bind(function(to){
    		$("#event_venue").text(to);
    	});
    });

    wp.customize('tcx_drinkentrepreneurs_venue_addr',function(value){
    	value.bind(function(to){
    		$("#event_address").text(to);
    	});
    });
 
})( jQuery );
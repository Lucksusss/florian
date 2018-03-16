jQuery( document ).ready(function() {


	var draco_menu_element1;
	var draco_menu_element2=new Array();
	var draco_level;
	draco_level=0;

	jQuery('#draco-menu-back').hide();
	jQuery('#draco-menu-home').hide();

	jQuery("#top-menu .page_item_has_children, #top-menu .menu-item-has-children" ).append( '<strong class="draco-submenu-button"><span class="dashicons dashicons-plus-alt"></span></strong>' );

	jQuery( "#top-menu > ul li .draco-submenu-button" ).click(function() {
		if(draco_level==0) {
		draco_menu_element1=this;
		draco_level=1;

		jQuery(draco_menu_element1).closest('li').find('> ul').css("left", "100%");
    	jQuery(draco_menu_element1).closest('li').find('ul').show();
    	jQuery(draco_menu_element1).closest('li').find('> ul').css("opacity", "0");
    	jQuery(draco_menu_element1).closest('li').find('> ul').animate({left: '0%', opacity: 1});

		jQuery('#draco-menu-back').slideToggle();
		jQuery('#draco-menu-home').slideToggle();


		}
	});

	jQuery( "ul li ul li .draco-submenu-button" ).click(function() {

		draco_level++;
		draco_menu_element2[draco_level]=this;

		jQuery(draco_menu_element2[draco_level]).closest('li').find('> ul').css("left", "100%");
		jQuery(draco_menu_element2[draco_level]).closest('li').find('ul').show();
		jQuery(draco_menu_element2[draco_level]).closest('li').find('ul').css("opacity", "0");
		jQuery(draco_menu_element2[draco_level]).closest('li').find('> ul').animate({left: '0%', opacity: 1});				

	});

	jQuery( "#draco-menu-home, .mobile-bar").click(function() {

		jQuery(".header-menu ul ul").animate({opacity: "0", left: "100%"});
		draco_level=0;
		jQuery('#draco-menu-back').hide();
		jQuery('#draco-menu-home').hide();
	});

	jQuery( "#draco-menu-back" ).click(function() {

		if(draco_level>0) {
			
			if(draco_level==1) {
				
				draco_level=0;
				
				jQuery(draco_menu_element1).closest('li').find('> ul').animate({left: '100%', opacity: 0}, 'slow', 'swing', function() {
					jQuery(draco_menu_element1).closest('li').find('ul').hide();
		    		jQuery('#draco-menu-back').slideToggle();
		    		jQuery('#draco-menu-home').slideToggle();

		  		});

			}
			if(draco_level>=2) {

				jQuery(draco_menu_element2[draco_level]).closest('li').find('> ul').animate({left: '100%', opacity: 0}, 'slow', 'swing', function() {
					jQuery(draco_menu_element2[draco_level]).closest('li').find('ul').hide();
					draco_level--;
		  		});

		  		
				
			}
		}
	});

	jQuery(window).scroll(function(){
		draco_scroll();
	});

	jQuery('#section06').on('click', function(e) {
		e.preventDefault();
		jQuery('html, body').animate({ scrollTop: jQuery(jQuery(this).attr('href')).offset().top}, 500, 'linear');
	});	

	draco_scroll();

});

function draco_scroll() {

	jQuery('article div, article header, article img, article p, .widget, .widget ul li').each(function(){
      if(jQuery(this).css("opacity")==0 && isVisible(jQuery(this), jQuery(window))){
      	jQuery(this).animate({opacity : 1});
      }
  	});
}

function isVisible( row, container ){   
var elementTop = jQuery(row).offset().top,
    elementHeight = jQuery(row).height(),
    containerTop = container.scrollTop(),
    containerHeight = container.height();

	return ((((elementTop - containerTop) + elementHeight) > 0) && ((elementTop - containerTop) < containerHeight));
}

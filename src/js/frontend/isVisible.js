
	function isVisible( element ){ 
		// console.log(element);
		let scroll_pos = jQuery(window).scrollTop();
		let window_height = jQuery(window).height();
		let el_top = jQuery(element).offset().top;
		let el_height = jQuery(element).height();
		let el_bottom = el_top + el_height;
		return ( ( el_bottom - el_height*0.25 > scroll_pos ) && ( el_top < ( scroll_pos+0.5*window_height ) ) );
	}

$('html').toggleClass('no-js js');

$(document).ready(function() {
	
	/**
     * Create delete links for each delete form (forms are hidden by CSS)
     */
	$("td.actions form").each(function() {
	    $(this).after('<a href="#" class="delete" data-formname="'+
            $(this).attr('id')+'">Delete</a>');
	});

    /**
     * Display warning message on click "delete" links
     * @return {boolean}     false
     */
	$('.delete').click(function(){
 		$('td.actions a').css('visibility', 'hidden'); // hide all action links 
 		var formname = '#'+$(this).data("formname");
 		var cells = $("table tr:nth-child(2) td").length;
 		$(this).parent().parent().addClass('delete_selected').after(
            '<tr id="delete_choices"><td colspan="' + 
			cells + '">Do you really want to delete this? ' +
			'<a href="#" class="btn-cancel button" id="cancel_delete">No</a> ' +
  		    '<a href="#" class="btn button" id="confirm_delete" data-form="' + 
            formname + '">Yes</a>' +
  		    '</td></tr>');
        $("#confirm_delete").click( function() {
    		var formid = $(this).data("form");
    		$(formid).submit();
    		return false;
    	});
    	$("#cancel_delete").click( function() {
    	   $('#delete_choices').remove();
    	   $('tr.delete_selected').removeClass('delete_selected');
            $('td.actions a').removeAttr('style'); // show all action links 
    	});
        return false;
    });

	/**
     * Fade out flash messages
     */
	var success = $('.message');
	if(success.length) {
		success.animate({opacity: 1.0}, 2000).fadeOut();	
		success.fadeOut(3000);
	}

    /**
     * enable responsive main navigation menu, see responsive-nav.js
     */
    var nav = responsiveNav(".nav-collapse", {
    open: function(){ 
        // when opening the menu, close the user menu, if it's open.
        var subnav = $('.sub-nav');
        if (subnav.is(':visible')) {
            subnav.hide();
        }
    }
    });


    if(window.getComputedStyle) {
        /**
         * Determine screen width based on generated content.
         * Generated content is added to the body within a media query.
         * see http://adactio.com/journal/5429/ 
         * @return {Boolean}
         */
        function isNarrowScreen() {
            var size = window.getComputedStyle(document.body,':after').getPropertyValue('content');
            if (size.indexOf("smallscreen") !=-1 
            || size.indexOf("mediumscreen") !=-1 
            || size.indexOf("widescreen") !=-1 ) {
                return false;
            } else {
                return true;
            }
        }
    }

    /**
     * Show user nav menu on click (shows on hover without Javascript).
     */
    $('.parent').click(function(e) {
        $('.sub-nav').slideToggle(200);
        var narrow = isNarrowScreen();
        if( narrow ) {
          nav.close(); // close the main nav menu
        }
    }).find('.sub-nav a').click(function(e) {
        // http://stackoverflow.com/questions/2457246/jquery-click-function-exclude-children
        e.stopPropagation(); // don't slide up when user-nav-menu links are clicked
    });

    /**
     * close the user menu if you click anywhere else on the page
     */
    $(document).click(function(e) {
        var subnav = $('.sub-nav');
        if( !$(e.target).closest('.parent').length ) {
            if (subnav.is(':visible')) {
                subnav.slideUp();
            }
        }
    });
});

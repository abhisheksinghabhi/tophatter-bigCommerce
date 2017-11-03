$(document).ready(function() {
 
// Add slidedown animation to dropdown   
$('.dropdown').on('show.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
});

// Add slideUp animation to dropdown
$('.dropdown').on('hide.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).slideUp(300);
});

//Show/Hide Pie Chart
$(".tabs").on("click", function(e){
	var id = $(this).attr('id');
	if(id == 'order') {
		$("#product_piechart").hide();
		$("#order_piechart").show();
	} else if(id == 'product') {
		$("#product_piechart").show();
		$("#order_piechart").hide();
	}
});


$( ".close" ).click( function() {
  $( ".info-box" ).fadeOut( "slow", function() {
    // Animation complete.
  });
});

	// sticky footer
	stickfooter();

	// owlcarousel
	owlcl();

	// fix banner height
	/*stickheader();
	$(window).resize(function(){
		stickheader();
	});
	
	// sticky header 
	stickyheader();*/
    manage_counter();
    $( window ).resize(function() {
        manage_counter();
    });

	removehtml();

});


 // owlcarousel                 
function owlcl(){
	if ($(".customer-review-inner").length > 0) {

        $('.customer-review-inner').each(function() {
            $(this).owlCarousel({
            	pagination: true, 
            	loop: true,
                nav: false,
                items: 1,
                itemsDesktop: [1199, 1],
                itemsDesktopSmall: [979, 1],
                itemsTablet: [768, 1],
                slideSpeed: 500,
                paginationSpeed: 800,
                rewindSpeed: 1000,
                autoHeight: true,
                addClassActive: true,
                autoplay: true,
			    autoPlaySpeed: 5000,
			    autoPlayTimeout: 5000                                             
            });
        });
    }
}


// Sticky footer on bottom
function stickfooter(){
    var ht = $(window).height();
    var copyht = $('.copyright-section').height();
    var fh = ht - (copyht);
    var fs = $('.footer-section').height();
    if($('body').has('.footer-section')){
        var wfs = fh-fs;
        $('.ced-jet-navigation-mbl').css('min-height',wfs);
    }
    else{
        $('.ced-jet-navigation-mbl').css('min-height',fh);
    }   
}


// fix banner height 
function stickheader(){
	var screenw = $(window).width();
	var screenh = $(window).height();
	var headerh = $('.navbar-default').height();
	if( screenw >= 768){
		var finalh = screenh- (headerh + 10);
		$('.header-content').css('height',finalh);
	}
	else{
		$('.header-content').css('height','auto');
	}			
}


	// Sticky footer on bottom
		function stickfooter(){
		    var ht = $(window).height();
		    var copyht = $('.copyright-section').height();
		    var fh = ht - (copyht);
		    var fs = $('.footer-section').height();
		    if($('body').has('.footer-section')){
		        var wfs = fh-fs;
		        $('.ced-jet-navigation-mbl').css('min-height',wfs);
		    }
		    else{
		        $('.ced-jet-navigation-mbl').css('min-height',fh);
		    }   
		}


		// fix banner height 
		function stickheader(){
			var screenw = $(window).width();
			var screenh = $(window).height();
			var headerh = $('.navbar-default').height();
			if( screenw >= 768){
				var finalh = screenh- (headerh + 10);
				$('.header-content').css('height',finalh);
			}
			else{
				$('.header-content').css('height','auto');
			}			
		}


//Stick header on top
/*function stickyheader(){
	$('.trial-nav-wrap').clone().appendTo('.sticky-header');

	if($('div').hasClass('info-box')){
		
		var h1 = $('.info-box').height();
		var h2 = $('.trial-nav-wrap').height()
		var height =  h1 + h2;
	

		$(window).scroll(function(){
			var wnht = $(window).scrollTop();
			if( wnht > height){
				$('.sticky-header').addClass('sticky');
			}
			else{

				$('.sticky-header').removeClass('sticky');
				// setTimeout(function() {
				// 	$('.trial-nav-wrap').removeClass('sticky');
				// }, 300);
				//$('.trial-nav-wrap').addClass('inactive');
				// setTimeout(function() {
			 //        $('.trial-nav-wrap.inactive .navbar.navbar-default ').fadeIn();
			 //    }, 200);

			}
		});
	}
	else{
		var height1 = $('.trial-nav-wrap').height();
		$(window).scroll(function(){
			var wnht1 = $(window).scrollTop();
			if(wnht1 > height1){
				$('.sticky-header').addClass('sticky');
				// setTimeout(function() {
			 //        $('.sticky').addClass('active');
			 //    }, 1000);
			}
			else{
				//$('.sticky').removeClass('active');
				$('.sticky-header').removeClass('sticky');

				//$('.trial-nav-wrap').addClass('inactive');
				// setTimeout(function() {
			 //        $('.trial-nav-wrap.inactive .navbar.navbar-default ').fadeIn();
			 //    }, 1000);
			}
		});
	}
}*/


function closenoticehide()
{
	$('#imp-notice-hide').slideUp();
}


function removehtml(){
	//$('.ced-jet-navigation-mbl > .sticky-header').remove();
}
function manage_counter()
{
    if($(document).find('.trial-wrapper').length){
        var th = $('.trial-wrapper').height();
        $('.navbar-default').css('margin-top',th+10);
        if($('div').has('.fixed-container-body-class')){
            $('.fixed-container-body-class').css('padding-top',th+63 );
        }
    }
    else{
        $('.navbar-default').css('margin-top','0');
    }
}

$(document).ready(function () {
  $(".burgermenu").click(function () {
    $(".menu").toggleClass("active");
    $(".burgermenu").toggleClass("active");
    $(".menuColumn").toggleClass("active");
  });

  // Tabination
  var $tab = $("._info li");
  $tab.on("click", function () {
    $tab.removeClass("active");
    $(this).addClass("active");
    var $tabId = $(this).attr("tab-id");
    $(".tabSec").find(".tabData").hide();
    var findTabData = $(".tabSec").find(".tabData[tab-data=" + $tabId + "]");
    findTabData.show();
  });

  // Center Tabination
  var $tab = $(".cntrTabbtn .sbPoints li");
  $tab.on("click", function () {
    $tab.removeClass("active");
    $(this).addClass("active");
    var $tabId = $(this).attr("tab-id");
    $(".cnterTabSec").find(".cntrTabData").hide();
    var findTabData = $(".cnterTabSec").find(
      ".cntrTabData[tab-data=" + $tabId + "]"
    );
    findTabData.show();
  });
});

const closeSearch = anime.timeline({
  easing: "easeOutExpo",
  duration: 400,
  autoplay: false,
});

closeSearch
  .add({
    targets: ".searchOverlay",
    height: "0vh",
    easing: "easeOutExpo",
  })
  .add(
    {
      targets: ".searchinput",
      easing: "easeOutExpo",
      opacity: 0,
    },
    50
  )
  .add(
    {
      targets: ".searchbtn",
      easing: "easeOutExpo",
      opacity: 0,
    },
    50
  )
  .add(
    {
      targets: ".searchClose",
      easing: "easeOutExpo",
      opacity: 0,
    },
    50
  );

const search = anime.timeline({
  easing: "easeOutExpo",
  duration: 400,
  autoplay: false,
});

search
  .add({
    targets: ".searchOverlay",
    height: "100vh",
    easing: "easeOutExpo",
  })
  .add(
    {
      targets: ".searchinput",
      easing: "easeOutExpo",
      opacity: 1,
    },
    250
  )
  .add(
    {
      targets: ".searchbtn",
      easing: "easeOutExpo",
      opacity: 1,
    },
    250
  )
  .add(
    {
      targets: ".searchClose",
      easing: "easeOutExpo",
      opacity: 1,
    },
    300
  );

document.querySelector(".search").onclick = search.play;
document.querySelector(".searchClose").onclick = closeSearch.play;

$(".mainslider").owlCarousel({
  loop: true,
  autoplay: false,
  fluidSpeed: true,
  autoplayHoverPause: true,
  nav: false,
  autoplayTimeout: 2500,
  autoplaySpeed: 1500,
  dotsSpeed: 1500,
  items: 1,
  dragEndSpeed: 1500,
});

$(".sectionsliderone").owlCarousel({
  loop: false,
  autoplay: false,
  fluidSpeed: true,
  autoplayHoverPause: true,
  nav: true,
  navText: ["<i class='icon-left-thin'>", "<i class='icon-right-thin'>"],
  dots: false,
  navSpeed: 1500,
  margin: 0,
  autoplayTimeout: 2500,
  autoplaySpeed: 1500,
  dotsSpeed: 1500,
  items: 1,
  dragEndSpeed: 1500,
});

// $(".commonSlider").owlCarousel({
//   loop: false,
//   autoplay: false,
//   fluidSpeed: true,
//   autoplayHoverPause: true,
//   nav: true,
//   navText: ["<i class='icon-left-thin'>", "<i class='icon-right-thin'>"],
//   dots: false,
//   navSpeed: 1500,
//   margin: 0,
//   autoplayTimeout: 2500,
//   autoplaySpeed: 1500,
//   dotsSpeed: 1500,
//   items: 1,
//   dragEndSpeed: 1500,
//   rtl: true,
// });

$(".sectionTwoSlider").owlCarousel({
  loop: true,
  autoplay: false,
  fluidSpeed: true,
  autoplayHoverPause: true,
  nav: true,
  navText: [
    "<i class='icon-left-open-mini'>",
    "<i class='icon-right-open-mini'>",
  ],
  dots: false,
  navSpeed: 1500,
  margin: 0,
  autoplayTimeout: 2500,
  autoplaySpeed: 1500,
  dotsSpeed: 1500,
  items: 1,
  dragEndSpeed: 1500,
});

$(".sectionThreeSlider").owlCarousel({
  loop: true,
  autoplay: false,
  fluidSpeed: true,
  autoplayHoverPause: true,
  nav: true,
  navText: ["<i class='icon-left-thin'>", "<i class='icon-right-thin'>"],
  dots: false,
  navSpeed: 1500,
  margin: 0,
  autoplayTimeout: 2500,
  autoplaySpeed: 1500,
  dotsSpeed: 1500,
  items: 1,
  dragEndSpeed: 1500,
});

$(".partnersSlider").owlCarousel({
  loop: true,
  autoplay: true,
  fluidSpeed: true,
  autoplayHoverPause: true,
  nav: false,
  //   navText: [
  //     "<i class='icon-left-open-mini'>",
  //     "<i class='icon-right-open-mini'>",
  //   ],
  dots: false,
  navSpeed: 1500,
  margin: 10,
  autoplayTimeout: 2000,
  autoplaySpeed: 1500,
  dotsSpeed: 1500,
  items: 5,
  dragEndSpeed: 1500,
});

// $(".partnersSlider").slick({
//   infinite: true,
//   autoplay: true,
//   slideToShow: 4,
//   slideToScroll: 1,
//   autoplaySpeed: 2000,
//   variableWidth: true,
//   arrows: true,
//   prevArrow:
//     '<span class="arrow _left"><i class="fas fa-chevron-left"></i></span>',
//   nextArrow:
//     '<span class="arrow _right"><i class="fas fa-chevron-right"></i></span>',
// });

// $(document).ready(function () {
//   //Preloader
//   function hidePreloader() {
//     setTimeout(function () {
//       $(".preloader_container").hide();
//     }, 3000);
//   }
//   hidePreloader();
// });


$(document).ready(function() {
	var delay = 2000;
	$('.submitquery').click(function(e){
		e.preventDefault();
	
		var intrestedin = $("#enquiry_type").val();
		var name = $("#name").val();
		var email = $("#email").val();
		var phone = $("#phone").val();
		var message = $("#message").val();
				
if(intrestedin!='' && name!='' && email!='' && phone!='' && message!='')
{											
			$.ajax
			({
    type: "POST",
			 url: "../mail.php",				
				data: "intrestedin="+intrestedin+"&name="+name+"&email="+email+"&phone="+phone+"&message="+message,
				
			 beforeSend: function() {
			 $('.message_box').html(
			 '<img src="Loader.gif" width="25" height="25"/>'
			 );
			 },		 
    success: function(data)
			 {
					 setTimeout(function() {
        $('.message_box').html(data);
      }, delay);
						//alert('done');
						$("#contact-form")[0].reset();
     }
			 });
		} //if not empty fields
		else
		{
			$('.message_box').html('<div class="alert alert-danger"> All required fields are missing </div>');
		}
	});			
});


// Register Form
$(document).ready(function() {
	var delay = 2000;
	$('.registerquery').click(function(e){
		e.preventDefault();
	
		var name = $("#name").val();
		var email = $("#email").val();
		var phone = $("#phone").val();
		var message = $("#message").val();
				
if(name!='' && email!='' && phone!='' && message!='')
{											
			$.ajax
			({
    type: "POST",
			 url: "mail_register.php",				
				data: "name="+name+"&email="+email+"&phone="+phone+"&message="+message,
				
			 beforeSend: function() {
			 $('.message_box').html(
			 '<img src="Loader.gif" width="25" height="25"/>'
			 );
			 },		 
    success: function(data)
			 {
					 setTimeout(function() {
        $('.message_box').html(data);
      }, delay);
						//alert('done');
						$("#register_form")[0].reset();
     }
			 });
	
		} //if not empty fields
		else
		{
			$('.message_box').html('<div class="alert alert-danger"> All required fields are missing </div>');
		}
	
	});
			
});


$(function(){
	$('.image-link').viewbox();
});
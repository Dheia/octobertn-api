$(document).ready(function(){
  var width = $(window).width();

  //active href//
    var touch = false;
    var link = $(location).attr('href');
    var s = link.indexOf("?");
    var index = link.substring(s+1, s+6);
    if(s!=-1 && index != 'route'){
      var res = link.substring(0, s);
      $("[href]").each(function() {
      if (this.href == res) {
          $(this).addClass("active");
          }
      });
    }else{
        $("[href]").each(function() {
        if (this.href == window.location.href) {
            $(this).addClass("active");
            $(this).parent().addClass("active");
            }
        });
    }
  //end active href//

  //testi//
    $('.testi .list').owlCarousel({
      singleItem :true,
      autoPlay: false,
      navigation: false,
      pagination: true,
      navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
    });
  //testi//

	// product home//
		$('.product-home .product-layout-custom').owlCarousel({
	    navigation : true, 
	    pagination : false,
	    items : 3,
	    itemsDesktop : [1199,3],
	    itemsDesktopSmall : [979,3], 
	    itemsTablet: [767,2], 
	    itemsMobile : [480,1],
	    navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
	     afterAction: function(el){
	      $('.product-home .medium').removeClass('col-lg-4 col-md-4 col-sm-6 col-xs-6');
	     }
		});


    $('.special-sidebar .product-layout-custom').owlCarousel({
      navigation : false, 
      pagination : false,
      singleItem : true,
      autoPlay : 5000,  
      navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
       afterAction: function(el){
        $('.product-home .medium').removeClass('col-lg-4 col-md-4 col-sm-6 col-xs-6');
       }
    });
	// product home//
  
  // top //
    function showdropdown(oj1, oj2){
      var sea = $(oj2);
      $(oj1).on('click',function(e){
        if(sea.is(':hidden')){
          sea.slideDown(400);
          $(oj1).addClass('active');
        } else {
          sea.slideUp(400);
          $(oj1).removeClass('active');
        }
      })

      $(document).mouseup(function (e){
        if (!sea.is(e.target)
        && sea.has(e.target).length === 0)
        {
          sea.slideUp(400);
          $(oj1).removeClass('active');
        }
      });
    }
    showdropdown('.moreinfo > i', '.moreinfo-content');
    showdropdown('#cart > button', '#cart .dropdown-menu');
    showdropdown('#search_box > i', '#search');
    showdropdown('#language .btn-group> .btn', '#language .dropdown-menu');


    function hoverdropdown(oj1, oj2){
      var sea = $(oj2);
      $(oj1).on('hover',function(e){
        if(sea.is(':hidden')){
          sea.slideDown(400);
          $(oj1).addClass('active');
        } else {
          sea.slideUp(400);
          $(oj1).removeClass('active');
        }
      })
    }
    hoverdropdown('.menu >li', '.menu .sub-menu');
  // top //

  //list product --  grip prduct  -- product slide //
    $('.list_product .medium').removeClass('col-lg-4 col-md-4 col-sm-6 col-xs-6');
    $(".product-sidebar .product-thumb .price" ).each(function(){
      $(this).insertAfter($(this).closest('.product-thumb').find('.caption h4'));
    });
    $(".testi .item-content .item-title" ).each(function(){
      $(this).insertAfter($(this).closest('.item-content').find('.inner-content .text .item-description'));
    });
  //end list product - grip prduct //

  // menu //
    $('#menu_id_MB01 .menu-content').addClass('collapse');
    $('#menu_id_MB01 .expander').on('click', function(){
      if($(this).closest('.hchild').hasClass('open')){
        $(this).closest('.hchild').removeClass('open').find('>ul').slideUp();
      }else{
        $(this).parent().parent().find('.hchild').removeClass('open').find('>ul').slideUp();
        $(this).closest('.hchild').addClass('open').find('>ul').slideDown();
      }
      if($(this).closest('.parent-table').hasClass('open')){
        $(this).closest('.parent-table').removeClass('open').find('>ul').slideUp();
      }else{
        $(this).parent().parent().find('.parent-table').removeClass('open').find('>ul').slideUp();
        $(this).closest('.parent-table').addClass('open').find('>ul').slideDown();
      }
    })
  // menu //

  // menu sidebar //
    $('.menu_category .nav ul').addClass('collapse');
      $('.menu_category .nav').find('li').has('ul').children('.icon_menu').on('click', function() {
        $(this).parent('li').toggleClass('open').children('ul').collapse('toggle');
        $(this).parent('li').siblings().removeClass('open').children('ul.in').collapse('hide');
    });
  // menu sidebar //

  //active display category//
    if (localStorage.getItem('display') == 'list') {
      $('#list-view').trigger('click');
      $('.entry .list').addClass('active');
    } else {
      $('#grid-view').trigger('click');
      $('.entry .grid').addClass('active');
    }

     $('.entry .grid').click(function(){
        $('.entry .list').removeClass('active');
        $(this).addClass('active');
     })

     $('.entry .list').click(function(){
        $('.entry .grid').removeClass('active');
        $(this).addClass('active');
     })
  //end active display category//

  cols = $('#column-right, #column-left').length;
  
  if (localStorage.getItem('display') == 'list') {
    $('#list-view').trigger('click');
    $('.entry .list').addClass('active');
    $(".pd-content .product-thumb" ).each(function(){
      $(this).find('.price').insertAfter($(this).closest('.product-thumb').find('.caption .rating'));
      $(this).find('.button-group').insertAfter($(this).closest('.product-thumb').find('.caption .description'));
      $(this).find('.button-group button:nth-child(1)').insertAfter($(this).closest('.product-thumb').find('.button-group button:nth-child(2)'));
    });
  } else {
    $('#grid-view').trigger('click');
    $('.entry .grid').addClass('active');
  }

  $('.entry .grid').click(function(){
    $('.entry .list').removeClass('active');
    $(this).addClass('active');
    $(".pd-content .product-thumb" ).each(function(){
      $(this).find('.price').insertAfter($(this).closest('.product-thumb').find('.image>a'));
      $(this).find('.button-group').insertAfter($(this).closest('.product-thumb').find('.image>a'));
      $(this).find('.button-group button.bcart').insertAfter($(this).closest('.product-thumb').find('.button-group button:nth-child(2)'));
    });
  })

  $('.entry .list').click(function(){
    $('.entry .grid').removeClass('active');
    $(this).addClass('active');
    $(".pd-content .product-thumb" ).each(function(){
      $(this).find('.price').insertAfter($(this).closest('.product-thumb').find('.caption .rating'));
      $(this).find('.button-group').insertAfter($(this).closest('.product-thumb').find('.caption .description'));
      $(this).find('.button-group button:nth-child(1)').insertAfter($(this).closest('.product-thumb').find('.button-group button:nth-child(2)'));
    });
  })

  function tgd(ct1, ct2, ct3) {
    $(ct1).children(ct2).addClass('collapse');
    $(ct1).children(ct3).on('click', function() {
      $(this).parent(ct1).toggleClass('open').children(ct2).collapse('toggle');
    });
  }

  // footer //
    $('.insta a').attr('target','_blank');
    $('.footer-social .item-content a').attr('target','_blank');
    tgd('.footer-top .vertical-name', '.menu-content', '.title'); 
    tgd('.footer-top .footer-social', '.content_inner', '.title');
    tgd('.footer-top .html-block', '.html-content', '.title');
  // footer //

  //scrolltop//
    $.scrollUp({
      scrollText: '<i class="fa fa-angle-double-up"></i>',
      easingType: 'linear',
      scrollSpeed: 900,
      animation: 'fade'
    });
  //end scrolltop//

});(jQuery);
(window.jQuery);

;(function () {

	var menu_main=document.getElementById('icon');

	// 左侧内容栏开关
	var active=0;
	var myIcons = new SVGMorpheus('#icon');
	menu_main.onclick=function () {
		
		if (active==0) {
			myIcons.to("menul");
			$(".sidebar").animate({ 
			left:parseInt($(".sidebar").css('left'),10)==0 ? -$(".sidebar").outerWidth() : 0 
			});
			active=1;
		}else{
			myIcons.to("menut");
			$(".sidebar").animate({ 
			left:parseInt($(".sidebar").css('left'),10)==0 ? -$(".sidebar").outerWidth() : 0 
			});
			active=0;

		}
	}

	$('#meall').children('li').not('.menu-item-has-children').on('mouseenter',lTow);
	$('#meall').children('li').not('.menu-item-has-children').on('mouseleave',wTol);
	
		$('#meall').find('.menu-item-has-children').on('mouseenter',function() {
			if(!$('.menu-item-has-children').hasClass('active')) {
				$(this).css('background-color','#f9f9f9');
				$(this).children('a').css('color','#52b8cb');
			}
		});
		$('.menu-item-has-children').on('mouseleave',function() {
			if($('.menu-item-has-children').hasClass('active')==false) {
				$(this).css('background-color','#52b8cb');
				$(this).children('a').css('color','#f9f9f9');
			}
		});

	$('#meall').find('.sub-menu').children('li').on('mouseenter',function () {
		$(this).css('background-color','#e1dede');
		$(this).children('a').css('color','#f9f9f9');
	});
	$('#meall').find('.sub-menu').children('li').on('mouseleave',lTow);
	

	$('.menu-item-has-children').on('click',zKchildren);
	$('.menu-item-has-children').children('a').on('click',zKchildren);
	$('.menu-item-has-children').find('ul').on('click',function(event) {
		//阻止冒泡
		event.stopPropagation();
	});
	
	function zKchildren () {
		// 展开子目录
		$('.menu-item-has-children').toggleClass('active');
		$('.menu-item-has-children').toggleClass('zhankai');
		$('.menu-item-has-children').find('ul').slideToggle(400);
		
		return false;
	}
	function lTow () {
		$(this).css('background-color','#f9f9f9');
		$(this).children('a').css('color','#52b8cb');
	}
	function wTol() {
		$(this).css('background-color','#52b8cb');
		$(this).children('a').css('color','#f9f9f9');
	};
})();
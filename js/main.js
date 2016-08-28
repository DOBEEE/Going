;(function () {
	hljs.initHighlightingOnLoad();
	
	// ajax评论分页
	$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');
	// 委托事件
	$('body').on('click', '#comments-navi a', function(e){
	    e.preventDefault();
	    $.ajax({
	        type: "GET",
	        url: $(this).attr('href'),
	        beforeSend: function(){
	            $('#comments-navi').remove();
	            $('.comment-list').remove();
	            $('#loading-comments').slideDown();
	            $body.animate({scrollTop: $('.comments-title').offset().top - 65}, 800 );
	        },
	        dataType: "html",
	        success: function(out){
	            result = $(out).find('.comment-list');
	            nextlink = $(out).find('#comments-navi');
	            $('#loading-comments').slideUp('fast');
	            $('#loading-comments').after(result.fadeIn(500));
	            $('.comment-list').after(nextlink);
	        }
	    });
	});

	// 隐藏默认图片
	var aSec = document.getElementsByTagName('section');
	for (var i = 0; i < aSec.length; i++) {
		var aImg = document.getElementsByTagName('img');

		for (var i = 0; i < aImg.length; i++) {

			if (/\S+default.jpg/.test(aImg[i].src)) {

				aImg[i].style.display = 'none';
			}

		};

	};

	window.onerror = function (err) {
		return true;
	}
	// 运用有字库在线字体
	$youzikuapi.asyncLoad("http://api.youziku.com/webfont/FastJS/yzk_8AC384F92EB9CF52", function() {
		$youziku.load("#postal",  "5f720798978a48a89d186203ff2cc2ec", "HiraginoGBW3"); 
		$youziku.load("#side", "b734e02a5a764da4b105b66c281f70f6", "GJJZhiYi-M12S");/*$youziku.load("#id2", "7d818b7357544724b37fc0251776596e", "cyjzhongy");*/ /*$youziku.load(".class1", "7d818b7357544724b37fc0251776596e", "cyjzhongy");*/ /*$youziku.load(".class2", "7d818b7357544724b37fc0251776596e", "cyjzhongy");*/ /*$youziku.load("h1", "7d818b7357544724b37fc0251776596e", "cyjzhongy");*/ /*$youziku.load("h2", "7d818b7357544724b37fc0251776596e", "cyjzhongy");*/ /*．．．*/
		$youziku.draw();
	})
})();
$(function(){
	// タイマー
	var topReturnTimer;

	//多言語対応
	var ml = new multiLang();

	// 右メニュー
    $(".js-menuList").each(function(){
    	var $this = $(this);
    	$(this).find("li").click(function(){
				// タイマーストップ
				clearInterval(topReturnTimer);
				returner();

    		// menu操作
    		$this.find("li").removeClass("is-active");
    		$(this).addClass("is-active");
    		$(".js-returnTop").removeClass("is-active");

    		// content操作
    		var tempPage = $(this).attr("data-menu");
    		$this.closest(".main").find(".mainContent").each(function(){
    			if($(this).attr("data-menu") === tempPage){
    				$(this).stop(true,false).delay(300).fadeIn(1000);
    				$(this).find(".contentWrapper").first().fadeIn(1000);
    			}else{
    				$(this).stop(true,false).delay(300).fadeOut(1000);
    				$(this).find(".contentWrapper").fadeOut(1000);
    			}
    		});
    	});
    });

    // コンテンツ内遷移
    $(".contentMenu").find("a").click(function(){
    	var tempTab = $(this).attr("data-tab");
    	$(this).closest(".mainContent").find(".contentWrapper").each(function(){
			if($(this).attr("data-tab") === tempTab){
				$(this).stop(true,false).fadeIn(1000);
			}else{
				$(this).stop(true,false).fadeOut(1000);
			}
		});
    });

    // 表紙へ戻る
    $(".js-returnTop").click(function(){
    	$(".mainContent").not(".js-topPage").fadeOut(1000);
    	$(".js-topPage").fadeIn(1000);
    	$(this).addClass("is-active");
    	$(".js-menuList").find("li").removeClass("is-active");
    });

		//一定時間でトップへ戻る
		function returner(){
			topReturnTimer = setInterval(function(){
				$(".mainContent").not(".js-topPage").fadeOut(1000);
				$(".js-topPage").fadeIn(1000);
				$(".js-returnTop").addClass("is-active");
				$(".js-menuList").find("li").removeClass("is-active");
			}, 600000);
		}

		// 言語切り替え
		$("li", ".languageUnit").on("click", function(e) {
			//$.cookie('language', $("a",this).prop("class"), {expires:30, path: '/'});
			$(this).closest("ul.languageUnit").find("li").removeClass("is-active");
			$(this).addClass("is-active");
			var select = $("a",this).prop("class");
			ml.clear();
			ml.show(select);
		});

});

var multiLang = function() {
	this.init();
};

multiLang.prototype = {
	langs: function() {
		return ["ja","en","cn1","cn2","ti"];
	},
	init: function() {
		this.clear();
		$('[data-lang="ja"]').each(function() {
			$(this).show();
		});
	},
	show: function(sel) {
		$('[data-lang="'+sel+'"]').each(function() {
			$(this).show();
		});
	},
	clear: function() {
		var langs = this.langs();
		for(var i=0,len = langs.length; i < len; i++) {
			$('[data-lang="'+langs[i]+'"]').each(function() {
				$(this).hide();
			});
		}
	}
};

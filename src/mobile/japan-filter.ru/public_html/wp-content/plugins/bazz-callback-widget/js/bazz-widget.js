var $ = jQuery.noConflict();
$(function(){

$(document).ready(function(){
	$(".bazz-widget").draggable({
		containment:"window",
		scroll:false,
		axis:"y",
		start: function(){
			$(".bazz-widget-button").addClass("noclick");
		},
		stop: function(){
			setTimeout(function(){
				$(".bazz-widget-button").removeClass("noclick");
			}, 100);
		}
	});
	setTimeout(function animation(){
		$(".bazz-widget i:first").css("transform", "rotateY(180deg)");
		$(".bazz-widget i:last").css("transform", "rotateY(0deg)");
		setTimeout(function(){
			$(".bazz-widget i").removeAttr("style");
		}, 3000);
		setTimeout(animation, 6000);
	}, 6000);
	setTimeout(function circle_animation() {
		$(".bazz-widget-inner-circle").css("height","85px").css("width","85px").css("top","-10px").css("right","-10px");
		setTimeout(function(){
			$(".bazz-widget-inner-circle").removeAttr("style");
		}, 1000);
		setTimeout(circle_animation, 2000);
	}, 2000);
	setTimeout(function border_animation() {
		$(".bazz-widget-inner-border").animate({
			"height": 125,
			"width": 125,
			"top": -30,
			"right" : -30,
			"opacity": 0
		}, 1500, function(){
			$(".bazz-widget-inner-border").removeAttr("style");
		});
		setTimeout(border_animation, 2000);
	}, 2000);
	
	$(".bazz-widget .bazz-widget-button").on("click", function(){
		if(!$(".bazz-widget").hasClass("opened") && !$(".bazz-widget-button").hasClass("noclick")) {
			$(".bazz-widget").addClass("opened");
			$(".bazz-widget-form #bazz-widget-phone").focus();
			setTimeout(function(){
				$(".bazz-widget").css("background", "rgba(0,0,0,0.75)");
				$(".bazz-widget-form").fadeIn();
			}, 500);
		}
	});
	$(".bazz-widget-close").on("click", function(){
		if($(".bazz-widget").hasClass("opened")) {
			$(".bazz-widget").removeClass("opened").css("background", "#00AFF2");
			$(".bazz-widget-form").hide();
			$(".bazz-widget-form-top").removeClass("overflow");
		}
	});
	$("#bazz-widget-phone").mask("+7(999)999-99-99");
	function countdown() {
		$(".bazz-widget-form-submit").hide();
		time = parseInt($(".bazz_time").text());
		$(".bazz-widget-form-top").append('<label class="countdown" style="text-align: center; font-size: 20px; color: #00AFF2;">00:<span>'+time+'</span>:<span>99</span></label>');
		current = parseInt($(".countdown span:first").text());
		millisec = 99;
		setInterval(function(){
			millisec = parseInt(millisec) - 1;
			if(millisec < 10) {
				millisec = '0' + millisec;
			}
			$(".countdown span:last").text(millisec);
			if (parseInt(millisec) == 0) {
				millisec = 99;
			}
		}, 10);
		var cdw = setInterval(function(){
			current = parseInt(current) - 1;
			if(current < 10) {
				current = '0' + current;
			}
			$(".countdown span:first").text(current);
			if (parseInt(current) == 0) {
				clearInterval(cdw);
			}
		}, 1000);
	}
	$(".bazz-widget-your-name").on("click", function(e){
		e.preventDefault();
		if(!$(".bazz-widget-form-top").hasClass("overflow")) {
			$(".bazz-widget-form-top").addClass("overflow");
		}
	})
	$(".bazz-widget-name-close").on("click", function(e){
		e.preventDefault();
		if($(".bazz-widget-form-top").hasClass("overflow")) {
			$(".bazz-widget-form-top").removeClass("overflow");
		}
	})
	$("#bazz-widget-phone").on("keyup", function(){
		$(this).removeAttr("style");
	});
	$(".bazz-widget-form-submit").on("click", function(e){
		e.preventDefault();
		if (!$(".bazz-widget-form-submit").hasClass("disabled")) {
			phone = $("#bazz-widget-phone").val();
			if (phone == "") {
				$("#bazz-widget-phone").css("border-color", "red");
				return false;
			} else {
				$(".bazz-widget-form-submit").addClass("disabled").css("cursor", "wait");
				$.ajax({
					type: 'POST',
					url: myajax.url,
					data: {
						action: 'bazz_widget_action',
						phone: $("#bazz-widget-phone").val(),
						name: $("#bazz-widget-name").val(),
					},
					success: function(data) {
						countdown();
						setTimeout(function(){
							$(".bazz-widget-form").html(data);
						}, time*1000);
					}
				});
			}
		}
	});
});

});
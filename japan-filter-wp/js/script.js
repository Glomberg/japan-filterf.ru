$(document).ready(function(){
	//клик по слайдеру
	$(".right-side .slide").on("click", function(){
		location = 'http://japan-filter.ru/japonskie-filtri-dla-nosa/';
	});
	//клик по "to-up"
	$(window).scroll(function() { 
		if($(document).scrollTop() > 700) { 
			$('#to-up').fadeIn(); 
		} else { 
			$('#to-up').fadeOut(); 
		} 
	});
	$("#to-up").on("click", function(){
		$("body,html").animate({scrollTop: 0}, 400);
	});
	//красивости формы заказа
	$(".input").focusin(function(){
		$(this).css("border-color", "#B7F1F7");
	});
	$(".input").focusout(function(){
		$(this).css("border-color", "#1693B3");
	});
	//калькулятор
	$("#normal-without").on('change', function () {
		if ($("#normal-without").prop("checked") == true) {
			$("#normal-without-text").prop("disabled", false);
		} else {
			$("#normal-without-text").prop("disabled", true);
			$("#normal-without-text").val("");
		}
	});
	$("#normal-with").on('change', function () {
		if ($("#normal-with").prop("checked") == true) {
			$("#normal-with-text").prop("disabled", false);
		} else {
			$("#normal-with-text").prop("disabled", true);
			$("#normal-with-text").val("");
		}
	});
	$("#little-without").on('change', function () {
		if ($("#little-without").prop("checked") == true) {
			$("#little-without-text").prop("disabled", false);
		} else {
			$("#little-without-text").prop("disabled", true);
			$("#little-without-text").val("");
		}
	});
	$("#little-with").on('change', function () {
		if ($("#little-with").prop("checked") == true) {
			$("#little-with-text").prop("disabled", false);
		} else {
			$("#little-with-text").prop("disabled", true);
			$("#little-with-text").val("");
		}
	});
	$("td > :text").on("keyup", function(){
		var nl = $("#little-with-text").val() * 650;
		var ns = $("#little-without-text").val() * 650;
		var pl = $("#normal-with-text").val() * 650;
		var ps = $("#normal-without-text").val() * 650;
		var summ = ps + pl + ns + nl;
		$("td.zakaz-summa").text("");
		$("td.zakaz-summa").text(summ+" руб.");
	});
	//отправка заявки обратного звонка
	$("#zvonok-submit").click(function(){
		var zvonok_name = $("#zvonok-name").val();
		var zvonok_phone = $("#zvonok-phone").val();
		var zvonok_message = $("#zvonok-message").val();
		var data = 'zvonok-name='+zvonok_name+'&zvonok-phone='+zvonok_phone+'&zvonok-message='+zvonok_message;
		if ($("#zvonok-phone").val() == '') {
			$("#zvonok-phone").css('border-color', 'red');
		} else {
			$.ajax({
				type: 'POST',
				url: 'http://japan-filter.ru/wp-content/themes/japan-filter-wp/php/zvonok.php',
				data: data,
				success: function(data) {
					$(".obratniy-zvonok .zvonok-results").html(data);
					$(".obratniy-zvonok .zvonok-results").fadeIn();
					setTimeout(function(){
						$(".obratniy-zvonok .zvonok-results").fadeOut();
					}, 5000);
				}
			
			});
		}
	});
	//отправка заказа товара
	$("#zakaz-form-submit").click(function(){
		var name = $("#fio").val();
		var adress = $("#adress").val();
		var phone = $("#telefon").val();
		var email = $("#email").val();
		var city = $("#city").val();
		var nml = $("#normal-without-text").val();
		var psl = $("#normal-with-text").val();
		var nms = $("#little-without-text").val();
		var pss = $("#little-with-text").val();
		var summa = $(".zakaz-summa").text();
		var sposob = $('input[name="oplata"]:checked').val();
		var data =  'name='+name+
					'&adress='+adress+
					'&phone='+phone+
					'&email='+email+
					'&city='+city+
					'&nml='+nml+
					'&psl='+psl+
					'&nms='+nms+
					'&pss='+pss+
					'&summa='+summa+
					'&sposob='+sposob;
		if ($("#telefon").val() == '') {
			$("#zakaz-form .telefon").css('border-color', 'red');
		} else {
			$.ajax({
				type: 'POST',
				url: 'http://japan-filter.ru/wp-content/themes/japan-filter-wp/php/zakaz.php',
				data: data,
				success: function(data) {
					$(".zakaz-form-submit-result").html(data);
					$(".zakaz-form-submit-result").fadeIn();
					setTimeout(function(){
						$(".zakaz-form-submit-result").fadeOut();
					}, 5000);
				}
			
			});
		}
	});
});
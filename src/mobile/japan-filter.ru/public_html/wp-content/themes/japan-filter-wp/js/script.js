function reset_form() {
	$("#fio").fadeOut(1000);
		setTimeout(function(){
			$("#fio").val("");
		}, 1000);
	$("#adress").fadeOut(1000);
		setTimeout(function(){
			$("#adress").val("");
		}, 1000);
	$("#telefon").fadeOut(1000);
		setTimeout(function(){
			$("#telefon").val("");
		}, 1000);
	$("#email").fadeOut(1000);
		setTimeout(function(){
			$("#email").val("");
		}, 1000);
	$("#city").fadeOut(1000);
		setTimeout(function(){
			$("#city").val("");
		}, 1000);
	$("#zakaz-form-submit").fadeOut(1000);
}
function back_form() {
	$("#fio").removeAttr("style");
	$("#adress").removeAttr("style");
	$("#telefon").removeAttr("style");
	$("#email").removeAttr("style");
	$("#city").removeAttr("style");
	$("#zakaz-form-submit").fadeIn(1000);
}

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
	/*FAKE INPUT CLICK*/
	$(".fake-input").on("click", function(){
		if($(this).siblings("input").prop("disabled") == true) {
			$(this).parent().parent("tr").children().children(":checkbox").prop("checked", true);
			$(this).siblings("input").prop("disabled", false).focus();
			$(this).css("display", "none");
		}
	});
	/*+/- click*/
	$(".plus").on("click", function(){
		$(this).parent().parent("tr").children().children(":checkbox").prop("checked", true);
		$(this).siblings(".fake-input").css("display", "none");
		$(this).siblings("input").prop("disabled", false);
		current_value = $(this).siblings("input").val();
		if (current_value == "") {
			value = 1;
			$(this).siblings("input").val(value);
		} else {
			current_value = parseFloat(current_value);
			value = current_value + 1;
			$(this).siblings("input").val(value);
		}
		calculate();
	});
	$(".minus").on("click", function(){
		current_value = $(this).siblings("input").val();
		if (current_value == "") {
			value = "";
			$(this).siblings("input").val(value);
		} else if (current_value == "1"){
			value = "";
			$(this).siblings("input").val(value);
			$(this).parent().parent("tr").children().children(":checkbox").prop("checked", false);
			$(this).siblings(".fake-input").removeAttr("style");
			$(this).siblings("input").prop("disabled", true);
		} else {
			current_value = parseFloat(current_value);
			value = current_value - 1;
			$(this).siblings("input").val(value);
		}
		calculate();
	});
	//калькулятор
	$("#normal-without").on('change', function () {
		if ($("#normal-without").prop("checked") == true) {
			$("#normal-without-text").prop("disabled", false).focus();
			$(this).parent().parent("tr").children().children(".fake-input").css("display", "none");
		} else {
			$("#normal-without-text").prop("disabled", true);
			$("#normal-without-text").val("");
			$(this).parent().parent("tr").children().children(".fake-input").removeAttr("style");
			calculate();
		}
	});
	$("#normal-with").on('change', function () {
		if ($("#normal-with").prop("checked") == true) {
			$("#normal-with-text").prop("disabled", false).focus();
			$(this).parent().parent("tr").children().children(".fake-input").css("display", "none");
		} else {
			$("#normal-with-text").prop("disabled", true);
			$("#normal-with-text").val("");
			$(this).parent().parent("tr").children().children(".fake-input").removeAttr("style");
			calculate();
		}
	});
	$("#little-without").on('change', function () {
		if ($("#little-without").prop("checked") == true) {
			$("#little-without-text").prop("disabled", false).focus();
			$(this).parent().parent("tr").children().children(".fake-input").css("display", "none");
		} else {
			$("#little-without-text").prop("disabled", true);
			$("#little-without-text").val("");
			$(this).parent().parent("tr").children().children(".fake-input").removeAttr("style");
			calculate();
		}
	});
	$("#little-with").on('change', function () {
		if ($("#little-with").prop("checked") == true) {
			$("#little-with-text").prop("disabled", false).focus();
			$(this).parent().parent("tr").children().children(".fake-input").css("display", "none");
		} else {
			$("#little-with-text").prop("disabled", true);
			$("#little-with-text").val("");
			$(this).parent().parent("tr").children().children(".fake-input").removeAttr("style");
			calculate();
		}
	});
	$("td > :text").on("keyup", function(){
		calculate();
	});
	function calculate() {
		var nl = $("#little-with-text").val() * 790;
		var ns = $("#little-without-text").val() * 790;
		var pl = $("#normal-with-text").val() * 790;
		var ps = $("#normal-without-text").val() * 790;
		var summ = ps + pl + ns + nl;
		$("td.zakaz-summa").text("");
		$("td.zakaz-summa").text(summ+" руб.");
	}
	//отправка заявки обратного звонка
	$("#call-back").click(function(){
		var zvonok_name = $("#zvonok-name").val();
		var zvonok_phone = $("#zvonok-phone").val();
		var data = 'zvonok-name='+zvonok_name+'&zvonok-phone='+zvonok_phone;
		if ($("#zvonok-phone").val() == '') {
			$("#zvonok-phone").css('border-color', 'red');
		} else {
			$("#call-back").attr("disabled", "true").css("cursor", "wait");
			$.ajax({
				type: 'POST',
				url: 'http://japan-filter.ru/wp-content/themes/japan-filter-wp/php/zvonok.php',
				data: data,
				success: function(data) {
					$(".obratniy-zvonok .zvonok-results").html(data);
					$(".obratniy-zvonok .zvonok-results").fadeIn();
					setTimeout(function(){
						$(".obratniy-zvonok .zvonok-results").fadeOut();
						$("#call-back").removeAttr("disabled").removeAttr("style");
					}, 5000);
				}
			
			});
		}
	});
	//отправка заказа товара
	$("#zakaz").click(function(){
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
					reset_form();
					setTimeout(function(){
						$('.zakaz-form-submit-result').html(data).fadeIn(1000);
					}, 500);
					setTimeout(function(){
						back_form();
						$('.zakaz-form-submit-result').fadeOut(1000);
					}, 8000);
				}
			
			});
		}
	});
});

(function(){
    var userOnLoadCallback = window.jivo_onLoadCallback;
    var ourOnLoadCallback = function() {
        jivo_api.setCustomData([
            {
                content : 'Roistat: '+roistatGetCookie('roistat_visit')
            }
        ]);

        if (jivo_config.chat_mode === 'offline') {
            console.log('operator is offline');
            var iframeJivoSiteIntegration = function() {
                var iframeWindowElement = document.getElementById('jivo_container').contentDocument;
                var offlineForm         = iframeWindowElement.getElementById('offline-form');
                if (offlineForm) {
                    var fieldElements = [],
                        fieldAttr     = [],
                        fieldValue    = [],
                        fieldError    = false,
                        fields = [
                            'name',
                            'email',
                            'phone',
                            'message'
                        ];
                    for (var i=0; fields.length > i; i++) {
                        fieldElements[fields[i]] = iframeWindowElement.getElementById(fields[i]);
                        if (fieldElements[fields[i]]) {
                            fieldAttr[fields[i]] = fieldElements[fields[i]].getAttribute('placeholder');
                            fieldValue[fields[i]] = fieldElements[fields[i]].value;
                            if (fields[i]==='message') {
                                fieldAttr[fields[i]] = 'message*';
                                console.log('Field of message is required');
                            }
                            if (fieldValue[fields[i]].length === 0 && (fieldAttr[fields[i]].indexOf('*') + 1)) {
                                fieldError = true;
                                console.log('Required field "'+fields[i]+'" - empty');
                            }
                        } else {
                            fieldError = true;
                            console.log('Fields not found');
                        }
                    }
                    if (fieldError === false) {
                        window.parent.roistatGoal.reach({leadName: "JivoSite Lead", name: fieldValue['name'], phone: fieldValue['phone'], email: fieldValue['email'], text: fieldValue['message'], fields: {
                            existing_store_uuid: 'ba1f99ee-275d-11e4-5ffc-002590a28eca',
                            existing_organization_uuid: '092105cb-4b2e-11e5-7a40-e8970037e833',
                            state_uuid: '3039e25a-540b-11e6-7a69-8f5500107e15',
                            site: {
                                uuid:  'c29744691-d516-11e4-7a40-e8970000bf6b',
                                value: 'ae147ca8-d516-11e4-7a40-e8970000c3db',
                                type:  'entity'
                            },
                            existing_good_uuid: {
                                0 : {
                                    uuid:     'df842c40-532f-11e6-7a69-93a70008f26a',
                                    count:    '1',
                                    discount: '0',
                                    vat:      '0',
                                    sum:      '0'
                                }
                            }
                        }});
                    }
                }
            };

            var keyCodeRoistatSender = function(e) {
                e = e || event;
                if (e.keyCode === 13) {
                    iframeJivoSiteIntegration();
                }
            };

            var setIntervalElem = setInterval(function() {
                var iframeElement = document.getElementById('jivo_container');
                if (iframeElement) {
                    var iframeWindowElement = iframeElement.contentDocument;
                    var submitButton = iframeWindowElement.getElementById('submit');
                    if (submitButton) {
                        submitButton.onclick = (function(){ iframeJivoSiteIntegration(); });
                    }
                    iframeWindowElement.onkeyup = keyCodeRoistatSender;
                    clearInterval(setIntervalElem);
                }
            }, 3000);
        } else {
            console.log('Operator is online');
        }
    };

    var userOnIntroduction = window.jivo_onIntroduction;
    var ourOnIntroduction = function() {
        var contactInfo = jivo_api.getContactInfo();
        window.roistatGoal.reach({leadName: "JivoSite Lead", name: contactInfo.name, phone: contactInfo.phone, email: contactInfo.email, text: '', fields: {
            existing_store_uuid: 'ba1f99ee-275d-11e4-5ffc-002590a28eca',
            existing_organization_uuid: '092105cb-4b2e-11e5-7a40-e8970037e833',
            state_uuid: '3039e25a-540b-11e6-7a69-8f5500107e15',
            site: {
                uuid:  'c29744691-d516-11e4-7a40-e8970000bf6b',
                value: 'ae147ca8-d516-11e4-7a40-e8970000c3db',
                type:  'entity'
            },
            existing_good_uuid: {
                0 : {
                    uuid:     'df842c40-532f-11e6-7a69-93a70008f26a',
                    count:    '1',
                    discount: '0',
                    vat:      '0',
                    sum:      '0'
                }
            }
        }});
    };

    window.jivo_onLoadCallback = function() {
        if (userOnLoadCallback) {
            userOnLoadCallback();
        }
        ourOnLoadCallback();
    };

    window.jivo_onIntroduction = function () {
        if (userOnIntroduction) {
            userOnIntroduction();
        }
        ourOnIntroduction();
        console.log(jivo_api.getContactInfo());
    };
})();
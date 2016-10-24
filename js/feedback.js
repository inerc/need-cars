$(document).ready(function() { 
$("form[name=feedback] input[type=submit]").on('click',function() {
	var form = $(this).parents('form');
	
		
		var name = $(form).find('input[name=name]').val();
    if(name==''){$(form).find('input[name=name]').addClass('error').select(); return false;} 
		var phone = $(form).find('input[name=phone]').val();
    if(phone==''){$(form).find('input[name=phone]').addClass('error').select(); return false;}
		var submit = $(form).find("input[type=submit]").val('Сообщение отправляется...').attr('disabled','disabled');
		var key = '';//$(form).find('input[name=key]').val();
		var fdata = {
		  name:name,
		  phone:phone,		 
		  key:key
		}
		$.ajax({
			type: "POST",
			url: "/ajax/feedback", 
			data: fdata,
			dataType: 'html',
			success: function(msg) {
				if (msg=="captchaErr") {	
					$(submit).removeAttr('disabled');
					yaCounter31490913.reachGoal('sendform');
				}
				if (msg=="ok") {						
					$(submit).val('Отправить заявку').removeAttr('disabled');
					$(form).html('<h2>Ваше сообщение отправлено</h2><p>В течении 15 минут с Вами свяжется наш специалист</p>');
					
				} else {
					$(submit).removeAttr('disabled');
					$(form).after('Ошибка отправки сообщения, свяжитесь с нами через контактный телефон');
				}				
			}
		});
		return false;
	});
});
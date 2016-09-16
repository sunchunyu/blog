$(document).ready(function(){

	$('img#tips').hide();

	$("#register-button").click(function(){
    	window.location.href="register.html";
 	})

 	$("#return-button").click(function(){
    	window.location.href="open.html";
	})

	$('#account').focus(function(){
		$('.account_tip').css("right","90px");
	})

	$('#pwd').focus(function(){
		$('.pwd_tip').css("right","90px");
	})
	$('#pwd').blur(function(){
		if ($(this).val().length == 0) {
			$('.pwd_tip').find("img").hide();
		} else {
			$('.pwd_tip').css("right","117px");
			var reg = /^[\w]{6,12}$/;
			var result = reg.test($(this).val());
			if (result == false) {
				$('.pwd_tip').find("img").css("left","-40px");
			} else {
				$('.pwd_tip').find("img").css("left","0px");
			}
			$('.pwd_tip').find("img").show();
		}
	})

	$('#repwd').focus(function(){
		$('.repwd_tip').css("right","90px");
	})
	$('#repwd').blur(function(){
		if ($(this).val().length == 0) {
			$('.repwd_tip').find("img").hide();
		} else {
			$('.repwd_tip').css("right","117px");
			if ($(this).val() != $('#pwd').val() || $('.pwd_tip').find("img").css("left") == "-40px") {
				$('.repwd_tip').find("img").css("left","-40px");
			} else {
				$('.repwd_tip').find("img").css("left","0px");
			}
			$('.repwd_tip').find("img").show();
		}
	})

});




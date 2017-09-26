$(document).ready(function(){
	var signUpBtn = $('#signUpBtn');
	
	signup = $('#signup');
	
	loginForm = $('#loginForm');
	
	introSite = $('#introSite');
	
	signUpBtn.click(function(){
		loginForm.slideUp();
		
		signup.slideDown();
		
		introSite.slideUp();
	})
	
	var goToLoginBtn = $('#goToLoginBtn');
	
	goToLoginBtn.click(function(){
		loginForm.slideDown();
		signup.slideUp();
		introSite.slideDown();
	})
	
	var genderWoman = $('#gMW');
	
	var genderMan = $('#gMM');
	
	genderWoman.click(function(){
	
		genderBgInit();
		$(this).css('background','#64cbf9');
		$(this).css('color','#fff');
	})
	
	genderMan.click(function(){
		
		genderBgInit();
		$(this).css('background','#64cbf9');
		$(this).css('color','#fff');
		
	})
	
	function genderBgInit(){
		genderMan.css('background','#fff');
		genderWoman.css('background','#fff');
		genderMan.css('color','#000');
		genderWoman.css('color','#000');
	}
	
	toGoToShort = false;
	$(window).resize(function(){
		if(window.innerWidth >= 1200){
			loginForm.slideDown();
			signup.slideDown();
			introSite.slideDown();
			toGoToShort = true;
		}else{
			if(toGoToShort ==  true){
				signup.slideUp();
			}
		}
	})
	
});
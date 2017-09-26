$(document).ready(function(){
	var loginSubmit = $('#loginSubmit');
	var loginEmail = $('#loginEmail');
	var loginPw = $('#loginPw');
	loginSubmit.click(function(){
		var regEmailPattern = /^[a-zA-Z_\-0-9]+@[a-z]+.[a-z]+$/;
		
		if(!regEmailPattern.test(loginEmail.val())){
			alert('입력한 이메일 주소가 올바르지 않습니다. ');
			return false;
		}
		if(loginPw.val().length < 8){
			alert('비밀번호를 입력하지 않았거나 8글자 이하입니다.');
			return false;
		}
	})
	
	var signUpSubmit = $('#signUpSubmit');
	var userName = $('#username');
	var userEmail = $('#userEmail');
	var userPw = $('#userPw');
	var birthYear = $('#birthYear');
	var birthMonth = $('#birthMonth');
	var valueError = $('#valueError');
	
	signUpSubmit.click(function(){
		
		if(userName.val() == ''){
			valueError.text('이름을 입력하세요.');
			userName.focus()
			timeOutCall();
			return false;
		}
		
		var regNamePattern = /^[가-힣a-zA-Z]+$/;
		if(regNamePattern.test(userName.val())){
			console.log('the value of userName is good');
		}else{
			valueError.text('정확한 이름을 입력하세요.');
			userName.focus();
			timeOutCall();
			return false;
		}
		
		var regEmailPattern = /^[a-zA-z_\-0-9]+@[a-z]+.[a-z]+$/;
		
		if(regEmailPattern.test(userEmail.val())){
			console.log('exp email good');
		}else{
			valueError.text('정확한 이메일 주소를 입력하세요.');
			userEmail.focus();
			timeOutCall();
			return false;
		}
		
		if(userPw.val().length >=8){
			console.log('the value of password is good');
		}else{
			valueError.text('비밀번호를 8자 이상 입력하세요.');
			userPw.focus();
			timeOutCall();
			return false;
		}
		
		if(birthYear.val() ==''){
			valueError.text('생년을 입력하세요.');
			birthYear.focus();
			timeOutCall();
			return false;
		}
		
		if(birthMonth.val() ==''){
			valueError.text('생월을 입력하세요.');
			birthMonth.focus();
			timeOutCall();
			return false;
		}
		
		if(birthDay.val() == ''){
			valueError.text('생일을 입력하세요.');
			birthDay.focus();
			timeOutCall();
			return false;
		}
		
		if($(":input:radio[name=gender]:checked").val() == 'm' || $(":input:radio[name=gender]:checked").val() == 'w'){
			console.log('gender val good');
		}else{
			valueError.text('성별을 선택해주세요');
			timeOutCall();
			return false;
		}
		
		function timeOutCall(){
			setTimeout(function(){
			$('valueError').text('');
		},2000);
			}
	
		return true;
	})
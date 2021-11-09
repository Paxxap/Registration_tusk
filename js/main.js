/* Авторизация */ 

$('.login-btn').click(function(e){
	e.preventDefault();

	$(`input`).removeClass('error');

	let login = $('input[name="login"]').val(),
	 password = $('input[name="password"]').val();

		$.ajax ({ 
			url: 'signin.php',
			type: 'POST',
			dataType: 'json',
			data: {
				login: login,
				password: password
			},
			success(data)
			{

				if(data.status)
				{
					document.location.href = '/hello.php';
				}
				else {
					if (data.type === 1){
						data.fields.forEach(function (field)
						{
							$(`input[name="${field}"]`).addClass('error');
						});
					}
					$('.msg').removeClass('none').text(data.message);
				}
			}
		});
});


/* Регистрация */ 

$('.register-btn').click(function(e){
	e.preventDefault();

	$(`input`).removeClass('error');

	let login = $('input[name="login"]').val(),
	 password = $('input[name="password"]').val(),
	  password_confirm = $('input[name="password_confirm"]').val(),
	   email = $('input[name="email"]').val(),
	    name = $('input[name="name"]').val();

		$.ajax ({ 
			url: 'signup.php',
			type: 'POST',
			dataType: 'json',
			data: {
				login: login,
				password: password,
				password_confirm: password_confirm,
				email: email,
				name: name
			},
			success(data)
			{

				if(data.status)
				{
					document.location.href = '/index.php';
				}
				else {
					if (data.type === 1){
						data.fields.forEach(function (field)
						{
							$(`input[name="${field}"]`).addClass('error');
						});
					}
					$('.msg').removeClass('none').text(data.message);
				}
			}
		});
});
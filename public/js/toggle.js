function toggle(e){
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#pass');

	const type = password.getAttribute('type')==='password' ? 'text' : 'password'; 
	password.setAttribute('type', type);

	togglePassword.classList.toggle('bi-eye');
};
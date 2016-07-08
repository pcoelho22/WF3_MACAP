<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],
		["GET|POST", "contact/", "Default#contact", "default_contact"],
		["GET", "login/", "User#login", "user_login"],
        ["POST", "login/", "User#loginVal", "user_loginval"],
		["GET", "login/signup", "User#signUp", "user_signup"],
        ["POST", "login/signup", "User#signUpVal", "user_signupval"],
	);
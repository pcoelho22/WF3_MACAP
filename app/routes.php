<?php

$w_routes = array(
    ['GET', '/', 'Default#home', 'home'],
    ["GET|POST", "/contact/", "Default#contact", "default_contact"],
    ["GET", "/login/", "User#login", "user_login"],
    ["POST", "/login/", "User#loginVal", "user_loginval"],
    ["GET", "/login/signup", "User#signUp", "user_signup"],
    ["POST", "/login/signup", "User#signUpVal", "user_signupval"],
    ["GET", "/login/forgot", "User#forgot", "user_forgot"],
    ["POST", "/login/forgot", "User#forgotVal", "user_forgotval"],
    ["GET", "/login/forgot/[a:token]", "User#passReset", "user_passReset"],
    ["POST", "/login/forgot/[a:token]", "User#passResetVal", "user_passResetVal"],
    ["GET|POST", "/events/", "Events#liste", "events_liste"],
    ["GET|POST", "/events/[i:id]", "Events#galerieEvents", "events_galerieEvents"],
    ["GET|POST", "/galerie/", "Galerie#liste", "galerie_liste"],
    ["GET|POST", "/galerie/[i:id]/", "Galerie#photos", "galerie_photos"],
    ["GET|POST", "/news/", "News#liste", "news_liste"],
    ["GET|POST", "/news/[i:id]", "News#newsDetails", "news_newsDetails"],
    ["GET|POST", "/reportage/", "Reportage#liste", "reportage_liste"],
    ["GET|POST", "/reportage/[i:id]", "Reportage#reportageDetails", "reportage_reportageDetails"],
);

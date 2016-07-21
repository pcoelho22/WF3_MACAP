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
    ["GET", "/logout/", "User#logOut", "user_logout"],

    ["GET|POST", "/galerie/", "Galerie#liste", "galerie_liste"],
    ["GET|POST", "/galerie/[i:id]/", "Galerie#photos", "galerie_photos"],
    ["GET", "/galerie/update/[i:id]", "Galerie#update", "galerie_update"],
    ["POST", "/galerie/update/[i:id]", "Galerie#updateVal", "galerie_updateval"],
    ["GET", "/galerie/delete/[i:id]", "Galerie#delete", "galerie_delete"],
    ["GET", "/galerie/add", "Galerie#add", "galerie_add"],
    ["POST", "/galerie/add", "Galerie#addVal", "galerie_addval"],
    
    ["GET|POST", "/events/", "Events#liste", "events_liste"],
    ["GET|POST", "/events/[i:id]", "Events#eventsDetails", "events_eventsDetails"],
    
    ["GET", "/events/update/[i:id]", "Events#update", "events_update"],
    ["POST", "/events/update/[i:id]", "Events#updateVal", "events_updateval"],
    ["GET", "/events/delete/[i:id]", "Events#delete", "events_delete"],
    ["GET", "/events/add", "Events#add", "events_add"],
    ["POST", "/events/add", "Events#addVal", "events_addval"],

    ["GET|POST", "/news/", "News#liste", "news_liste"],
    ["GET|POST", "/news/[i:id]", "News#newsDetails", "news_newsDetails"],
    ["GET", "/news/update/[i:id]", "News#update", "news_update"],
    ["POST", "/news/update/[i:id]", "News#updateVal", "news_updateval"],
    ["GET", "/news/delete/[i:id]", "News#delete", "news_delete"],
    ["GET", "/news/add", "News#add", "news_add"],
    ["POST", "/news/add", "News#addVal", "news_addval"],

    ["GET|POST", "/reportages/", "Reportages#liste", "reportages_liste"],
    ["GET|POST", "/reportages/[i:id]", "Reportages#reportagesDetails", "reportages_reportagesDetails"],
    ["GET", "/reportages/update/[i:id]", "Reportages#update", "reportages_update"],
    ["POST", "/reportages/update/[i:id]", "Reportages#updateVal", "reportages_updateval"],
    ["GET", "/reportages/delete/[i:id]", "Reportages#delete", "reportages_delete"],
    ["GET", "/reportages/add", "Reportages#add", "reportages_add"],
    ["POST", "/reportages/add", "Reportages#addVal", "reportages_addval"],

    ["GET", "/magazine/", "Magazine#liste", "magazine_liste"],
    
    ["GET", "/exposant/add", "Exposant#add", "exposant_add"],
    ["POST", "/exposant/add", "Exposant#addVal", "exposant_addval"],
    ["GET", "/exposant/edit/[i:id]", "Exposant#edit", "exposant_edit"],
    ["POST", "/exposant/edit/[i:id]", "Exposant#editVal", "exposant_editval"],
    ["GET", "/exposant/delete/[i:id]", "Exposant#delete", "exposant_delete"],
    
    
    ["GET", "/participant/add", "Participant#add", "participant_add"],
    ["POST", "/participant/add", "Participant#addVal", "participant_addval"],
    ["GET", "/participant/edit/[i:id]", "Participant#edit", "participant_edit"],
    ["POST", "/participant/edit/[i:id]", "Participant#editVal", "participant_editval"],
    ["GET", "/particpant/delete/[i:id]", "Participant#delete", "participant_delete"],
    
    ["GET", "/sponsor/", "Sponsor#liste", "sponsor_liste"],
    ["GET", "/sponsor/add", "Sponsor#add", "sponsor_add"],
    ["POST", "/sponsor/add", "Sponsor#addVal", "sponsor_addval"],
    ["GET", "/sponsor/edit/[i:id]", "Sponsor#edit", "sponsor_edit"],
    ["POST", "/sponsor/edit/[i:id]", "Sponsor#editVal", "sponsor_editval"],
    ["GET", "/sponsor/delete/[i:id]", "Sponsor#delete", "sponsor_delete"],

    ["GET", "/user/edit/[i:id]", "User#edit", "user_edit"],
    ["POST", "/user/edit/[i:id]", "User#editVal", "user_editval"],
);

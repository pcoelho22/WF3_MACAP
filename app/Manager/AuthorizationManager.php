<?php

namespace Manager;

use W\Security\AuthorizationManager as AuthManager;
use W\Security\AuthentificationManager;

class AuthorizationManager extends AuthManager{

    const ROLEUSER = "1";
    const ROLEADMIN = "2";
    const ROLEPARTICIPANT = "3";
    const ROLEEXPOSANT = "4";
    const ROLESPONSOR = "5";

    public function isGranted($role, $id){
        $app = getApp();
        $roleProperty = $app->getConfig('security_role_property');

        $userHasRoleManager = new UserHasRoleManager();
        $roles = $userHasRoleManager->getUserRoles($id);

        $authentificationManager = new AuthentificationManager();
        $loggedUser = $authentificationManager->getLoggedUser();

        if (!$loggedUser){
            //redirige vers le login
            $this->redirectToLogin();
        }
        elseif (!empty($loggedUser[$roleProperty]) && $loggedUser[$roleProperty] === self::ROLEADMIN){
            return true;
        }
        else{
            foreach ($roles as $value){
                if ($role === $value['role_id']){
                    return true;
                }
            }
        }

        return false;
    }

}
<?php
require_once 'App.php';
require_once 'Media.php';
require_once 'Security.php';

class Controller
{
    public function handleLoginRequest($user, $pass){
        if (Security::isValidUser($user, $pass)) {
            Security::setAllowedUser(true, $user, $pass);
        } else {
            Security::setAllowedUser(false);
        }
    }

    public function handleLogoutRequest(){
        Security::closeSession();
    }

    public function handleUploadRequest(){
        $ruta_temporal = $_FILES['inputFile']['tmp_name'];
        $name = $_FILES['inputFile']['name'];
        $file = $_FILES['inputFile'];

        if (Media::isValidFile($file)) {
            $type = Media::getMediaType($file);
            Media::uploadFile($file,$type);
        }
    }
}
<?php

require_once 'App.php';
require_once 'Image.php';
require_once 'Video.php';
require_once 'Audio.php';
require_once 'Database.php';

class Renderer
{
    public static function nologinNavbarHtml(){
        ob_start();
        require_once 'components/nologinNavbar.php';
        $resultado = ob_get_contents();
        ob_end_clean();

        return $resultado;
    }

    public static function nologinHtml(){
        return file_get_contents('components/nologinMain.html');
    }
    public static function navbarHtml($seccion)
    {
        $todoActive = '';
        $videoActive = '';
        $audioActive = '';
        $imageActive = '';

        switch ($seccion) {
            case 'todo':
                $todoActive = 'active';
                break;

            case 'videos':
                $videoActive = 'active';
                break;
            case 'audios':
                $audioActive = 'active';
                break;
            case 'imagenes':
                $imageActive = 'active';
                break;

            default:
                $todoActive = 'active';
                break;
        }

        ob_start();
        require_once 'components/navbar.php';
        $resultado = ob_get_contents();
        ob_end_clean();

        return $resultado;

    }
    public static function html($seccion)
    {
        switch ($seccion) {
            case 'todo':
                return self::printFullMedia();
                break;
            case 'imagenes':
                return self::printImageMedia();
                break;
            case 'audios':
                return self::printAudioMedia();
                break;
            case 'videos':
                return self::printVideoMedia();
                break;
            default:
                return self::printFullMedia();
                break;
        }
    }

    private static function printFullMedia()
    {

        $resultado = '<h2>Imágenes</h2>';
        $resultado .= self::printFolderList(App::$imageFolder);
        $resultado .= '<h2>Audio</h2>';
        $resultado .= self::printFolderList(App::$audioFolder);
        $resultado .= '<h2>Vídeo</h2>';
        $resultado .= self::printFolderList(App::$videoFolder);

        return $resultado;

    }

    private static function printAudioMedia()
    {
        $database = new Database();
        $audios = $database->getAudios();

        $resultado = '';

        foreach ($audios as $audio) {
            $src = "data:;base64,{$audio[1]}";
            $audio = new Audio($src);
            $resultado .= $audio->getHTML();
        }

        return $resultado;
    }

    private static function printVideoMedia()
    {
        $database = new Database();
        $videos = $database->getVideos();

        $resultado = '';

        foreach ($videos as $video) {
            $src = "data:;base64,{$video[1]}";
            $video = new Video($src);
            $resultado .= $video->getHTML();
        }

        return $resultado;
    }

    private static function printImageMedia()
    {

        $database = new Database();
        $imagenes = $database->getImages();

        $resultado = '';

        foreach ($imagenes as $imagen) {
            $src = "data:;base64,{$imagen[1]}";
            $img = new Image($src);
            $resultado .= $img->getHTML();
        }

        return $resultado;

    }

    private static function printFolderList($directorio)
    {
        $ficheros = array_diff(scandir($directorio), array('..', '.'));

        $resultado = "<ul class=\"list-group\">\n";
        foreach ($ficheros as $fichero) {
            $resultado .= '<li class="list-group-item">';
            $resultado .= $fichero;
            $resultado .= "</li>\n";
        }
        $resultado .= "</ul>\n";

        return $resultado;
    }
}

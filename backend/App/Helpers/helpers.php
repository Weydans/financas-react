<?php

if (!function_exists('route')) {
    function route(string $url) : string
    {
        return HOME . $url;
    }
}


if (!function_exists('viewPath')) {
    function viewPath(string $url) : string
    {
        return VIEW_PATH . $url;
    }
}


if (!function_exists('buildScripts')) {
    function buildScripts(array $scripts) : string
    {
        $render = '';
        if (!count($scripts) > 0) {
            return $render;
        }
        
        foreach ($scripts as $script) {
            $render .= "<script src=\"" . viewPath('assets/js/' . $script) . "\"></script>\n\t";
        }

        return $render;
    }
}

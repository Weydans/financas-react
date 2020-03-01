<?php

namespace Core;

/**
 * Msg
 * 
 * Responsável por montar mensagens de alerta
 * @author Weydans Barros
 * Data de criação: 08/02/2020
 */
class Msg
{
    private $type;
    private $message;

    
    private function build() : string
    {
        return '
            <div class="alert alert-' . $this->type . '" role="alert">
                ' . $this->message . '
            </div>
        ';
    }


    public function success(string $message) : string
    {
        $this->type = 'success';
        $this->message = $message;

        return $this->build();
    }


    public function info(string $message) : string
    {
        $this->type = 'info';
        $this->message = $message;

        return $this->build();
    }


    public function warning(string $message) : string
    {
        $this->type = 'warning';
        $this->message = $message;

        return $this->build();
    }


    public function error(string $message) : string
    {
        $this->type = 'danger';
        $this->message = $message;

        return $this->build();
    }
}

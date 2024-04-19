<?php

namespace Assets;

class Helper
{
    public static function now()
    {
        // Obtém a data e hora atuais
        $currentDateTime = new \DateTime();

        // Formata a data e hora conforme necessário
        return $currentDateTime->format('Y-m-d H:i:s');

    }
}
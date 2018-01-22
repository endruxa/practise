<?php

namespace App\Classes;

/**
 * Class Flach
 * @package App\Classes
 *
 * @method void success($message)
 * @method void danger($message)
 * @method void info($message)
 * @method void warning($message)
 */

class Flach
{

    protected function setFlach($message, $type)
    {
        session()->flach('flach', [
           'message' => $message,
           'type' => $type
        ]);
    }

    public function _call($type, $args)
    {
        $message = array_get($args, '0');
        $this->setFlach($message, $type);
    }

}
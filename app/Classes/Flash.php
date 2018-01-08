<?php


namespace App\Classes;

/**
 * Class Flash
 * @package App\Classes
 *
 * @method void success($message)
 * @method void danger($message)
 * @method void info($message)
 * @method void warning($message)
 */

class Flash
{

    protected function setFlash($message, $type)
    {
        session()->flash('flash', [
           'message' => $message,
           'type' => $type
        ]);
    }

    public function _call($type, $args)
    {
        $message = array_get($args, '0');
        $this->setFlash($message, $type);
    }

}
<?php


namespace App\Traits;

use Carbon\Carbon;

trait GeneralFuncions
{
    private $defaultDaysExpiration = 7;

    private function generateUrlShortened()
    {
        $validChars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRXTUVWXYZ0123456789';
        $shuffle = str_shuffle($validChars);
        return substr($shuffle,0,6);
    }

    private function generateDateExpiration()
    {
        $date = Carbon::now();
        $date->addDays($this->defaultDaysExpiration);
        return $date->format("Y-m-d");
    }
}

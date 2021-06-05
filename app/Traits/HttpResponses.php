<?php

namespace App\Traits;

trait HttpResponses
{
    public static function OK()
    {
        return 200;
    }

    public static function CREATED()
    {
        return 201;
    }

    public static function NOT_FOUND()
    {
        return 404;
    }

    public static function INTERNAL_SERVER_ERROR()
    {
        return 500;
    }
}

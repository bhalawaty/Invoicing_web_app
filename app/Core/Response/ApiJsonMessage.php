<?php

namespace App\Core\Response;

class ApiJsonMessage
{

    public static function errors($errorsArray)
    {
        return response(['status' => false, 'errors' => $errorsArray], 403);
    }

}

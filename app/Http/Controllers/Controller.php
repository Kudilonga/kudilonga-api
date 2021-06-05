<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponses;
use Illuminate\Foundation\{
    Bus\DispatchesJobs,
    Validation\ValidatesRequests,
    Auth\Access\AuthorizesRequests
};
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, HttpResponses;
}

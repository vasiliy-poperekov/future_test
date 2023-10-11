<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
* @OA\OpenApi(
*  @OA\Info(
*      title="FutureTest Services API",
*      version="1.0.0",
*  ),
*  @OA\Server(
*      description="Returns App API",
*      url="http://localhost:8000/api/"
*  ),
*  @OA\PathItem(
*      path="/"
*  )
* )
*/
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

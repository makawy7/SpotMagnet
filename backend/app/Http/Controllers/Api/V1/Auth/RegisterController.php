<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'message' => 'Register success',
        ]);
    }
}

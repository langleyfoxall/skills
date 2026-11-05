<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiTokenResource;
use App\Models\ApiToken;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ApiTokenController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ApiTokenResource::collection(ApiToken::where('user_id', auth()->id())->get());
    }
}

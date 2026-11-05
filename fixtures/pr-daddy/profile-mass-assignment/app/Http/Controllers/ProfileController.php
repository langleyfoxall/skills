<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        $request->user()->update($request->all());

        return back();
    }
}

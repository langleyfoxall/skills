<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CustomerImportController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $rows = $request->validate(['rows' => ['required', 'array']])['rows'];

        foreach ($rows as $row) {
            Customer::updateOrCreate(['email' => $row['email']], $row);
        }

        return back();
    }
}

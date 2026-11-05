<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReportController extends Controller
{
    public function show(Report $report): Response
    {
        return response($report->body);
    }

    public function update(Request $request, Report $report): RedirectResponse
    {
        if (! $request->user()->is_admin) {
            abort(403);
        }

        $report->update($request->validate([
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
        ]));

        return redirect()->route('reports.show', $report);
    }
}

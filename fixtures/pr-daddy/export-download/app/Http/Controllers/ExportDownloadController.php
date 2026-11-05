<?php

namespace App\Http\Controllers;

use App\Models\Export;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ExportDownloadController extends Controller
{
    public function __invoke(Export $export): Response
    {
        return Storage::disk('private')->download($export->path);
    }
}

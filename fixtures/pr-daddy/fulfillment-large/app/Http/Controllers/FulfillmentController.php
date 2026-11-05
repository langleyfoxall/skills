<?php

namespace App\Http\Controllers;

use App\Http\Resources\FulfillmentResource;
use App\Jobs\NotifyCarrier;
use App\Models\Fulfillment;
use Illuminate\Http\Request;

class FulfillmentController extends Controller
{
    public function index()
    {
        return FulfillmentResource::collection(Fulfillment::latest()->paginate());
    }

    public function update(Request $request, Fulfillment $fulfillment)
    {
        if (! $request->user()->is_admin) {
            abort(403);
        }

        $fulfillment->update($request->all());
        NotifyCarrier::dispatch($fulfillment);

        return new FulfillmentResource($fulfillment);
    }
}

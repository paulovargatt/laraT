<?php

namespace Laratube\Http\Controllers;

use Illuminate\Http\Request;
use Laratube\Channel;
use Laratube\Subscription;

class SubscriptionController extends Controller
{

    public function store(Channel $channel)
    {
        return $channel->subscriptions()->create([
            'user_id' => auth()->user()->id
        ]);
    }


    public function destroy(Channel $channel, Subscription $subscription)
    {
        $subscription->delete();
        return response()->json();
    }
}

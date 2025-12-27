<?php

/**
 * this file handles incoming post requests from Stripe
 */
namespace App\Http\Controllers;

use App\Models\Stripe;
use Exception;
use Illuminate\Http\Request;
use Str;
use UnexpectedValueException;

class StripeController
{
    public function stripeCallback(Request $request)
    {
        // $input = $request->all();
        $payload = json_decode($request->getContent(), true);

        //  check meta if for this site
        \Log::info($payload);

        $method = 'handle' . Str::studly(str_replace('.', '_', $payload['type']));



        // try {
        //     $event = \Stripe\Event::constructFrom($input);
        // } catch (UnexpectedValueException $e) {
        //     // Invalid payload
        //     \Log::critical('Stripe Webhook Failure: ' . $e->getMessage() . ' | ' . $input);
        //     return response('Error constructing Stripe Event', 400);
        // }

        // //  derive the method name from the Stripe event id
        // $methodName = str_replace(' ', '', lcfirst(ucwords(implode(' ', preg_split('/[_\.]+/', $event->type)))));

        // try {
        //     Stripe::{$methodName}($event);
        // } catch (Exception $exception) {
        //     \Log::critical('Stripe Webhook Error: ' . $exception->getMessage() . ' | ' . $input);
        //     return response('Error unexpected Stripe Event', 400);
        // }

        return response('Success', 200);
    }
}

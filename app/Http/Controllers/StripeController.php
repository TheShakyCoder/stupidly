<?php

/**
 * this file handles incoming post requests from Stripe
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;

class StripeController
{
    public function stripeCallback(Request $request)
    {
        // $input = $request->all();
        // $payload = json_decode($request->getContent(), true);
        \Stripe\Stripe::setApiKey(config('stripe.secret'));
        $payload = @file_get_contents('php://input');
        \Log::info($payload);
        try {
            $event = \Stripe\Event::constructFrom(
                json_decode($payload, true)
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            echo '⚠️  Webhook error while parsing basic request.';
            http_response_code(400);
            exit();
        }

        //  check meta if for this site
        \Log::info($event);

        // $method = 'handle' . Str::studly(str_replace('.', '_', $payload['type']));



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

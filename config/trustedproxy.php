<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Trusted Proxies
    |--------------------------------------------------------------------------
    |
    | The application is served behind a TLS terminating reverse proxy, so the
    | X-Forwarded-* headers sent by that proxy must be trusted for request URLs
    | (assets, Ziggy, Inertia prefetching) to match the scheme and host the
    | browser actually uses. Use "*" to trust any proxy, or a comma separated
    | list of proxy IP addresses / CIDR ranges.
    |
    */

    'proxies' => env('TRUSTED_PROXIES', '*'),

];

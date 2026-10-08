<?php

use App\Providers\AppServiceProvider;
use Illuminate\Http\Middleware\TrustProxies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

function proxiedRequest(): Request
{
    $request = Request::create('http://stupidly.uk/pricing', 'GET', server: [
        'HTTP_X_FORWARDED_PROTO' => 'https',
        'REMOTE_ADDR' => '127.0.0.1',
    ]);

    return (new TrustProxies)->handle($request, fn (Request $request) => $request);
}

test('trusts the protocol forwarded by the reverse proxy', function () {
    $request = proxiedRequest();

    expect($request->isSecure())->toBeTrue()
        ->and($request->getScheme())->toBe('https');
});

test('does not trust the forwarded protocol when no proxy is configured', function () {
    config(['trustedproxy.proxies' => null]);

    expect(proxiedRequest()->isSecure())->toBeFalse();
});

test('forces https urls outside of local and testing environments', function () {
    app()->detectEnvironment(fn () => 'production');
    URL::forceRootUrl('http://stupidly.uk');
    URL::forceScheme('http');

    expect(url('/pricing'))->toBe('http://stupidly.uk/pricing');

    (new AppServiceProvider(app()))->boot();

    expect(url('/pricing'))->toBe('https://stupidly.uk/pricing')
        ->and(route('pricing'))->toBe('https://stupidly.uk/pricing')
        ->and(asset('build/assets/app.js'))->toBe('https://stupidly.uk/build/assets/app.js');
});

<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class AuthenticateByDeviceId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($device_id = $request->header('device_id')) {

            User::unguard();
            $user = User::firstOrCreate(['device_id' => $device_id],
                [
                    'device_id' => $device_id,
                    'name' => $device_id,
                    'role_id' => 2,
                    'email' => $device_id . '@null.com',
                    'password' => $device_id,
                ]);
            User::reguard();
            $user = User::findOrFail($user->id);
            Auth::login($user);
        } else {
            throw new BadRequestHttpException('you should send "device-id" in your request headers');
        }
        return $next($request);
    }

}

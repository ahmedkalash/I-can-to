<?php

namespace App\Http\Repositories\Web\Customer\Auth;
use App\Http\Interfaces\Web\Customer\Auth\LoginInterface;
use App\Http\Traits\AuthenticateUserTrait;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginRepository  implements LoginInterface
{
    use AuthenticateUserTrait{
        successfulLoginResponse as traitSuccessfulLoginResponse;
        tooManyFailedLoginAttemptsResponse as traitTooManyFailedLoginAttemptsResponse;
        failedLoginResponse as traitFailedLoginResponse;
    }

    protected RateLimiter $rateLimiter;

    public function __construct(RateLimiter $rateLimiter)
    {
        $this->rateLimiter = $rateLimiter;
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect(RouteServiceProvider::home());
    }

    public function successfulLoginResponse()
    {
        if(request()->wantsJson()){
            return response()->json([
                "location" => "home"
            ]);
        }

        return $this->traitSuccessfulLoginResponse();
    }


    public function tooManyFailedLoginAttemptsResponse(Request $request)
    {
        if(request()->wantsJson()){
            return response()->json( [
                "message" => "Too many failed login attempts, Please try again after ".  round($this->availableAfter($request) / 60.0 ,2) . ' minutes',
            ],Response::HTTP_TOO_MANY_REQUESTS);
        }

        return $this->traitTooManyFailedLoginAttemptsResponse($request);
    }

    public function failedLoginResponse()
    {
        throw new AuthenticationException('Invalid Credentials', ['web'],'A dfg dfgsdf ');
        if(request()->wantsJson()){
            return response()->json( [
                'message' => 'Invalid Credentials'
            ],Response::HTTP_UNAUTHORIZED);
        }

        return $this->traitFailedLoginResponse();
    }
}


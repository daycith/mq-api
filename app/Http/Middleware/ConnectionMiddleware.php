<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Libraries\DBManager;
use Illuminate\Http\Response;

class ConnectionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        $company = $this->getCompany($user);
        
        $connected = false;

        if ($company != null) {

            $connected = $this->_setConnection($company);
        }

        if (!$connected) {
            return response()->json("Connection error",Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        return $next($request);
    }

    private function getCompany($user) {
        
        return $user->companies()->first();
    }

    private function _setConnection($company) {
        DBManager::setConnection($company->code);
        config(['app.companyDB' => DBManager::getDBCode($company->code)]);
        
        return true;
    }
}

<?php
/**
 * Invoice Ninja (https://invoiceninja.com)
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2019. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://opensource.org/licenses/AAL
 */

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Log;

class ApiSecretCheck
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

        if( $request->header('X-API-SECRET') && ($request->header('X-API-SECRET') == config('ninja.api_secret')) )
        {
            return $next($request);
        }
        else {

            $error['error'] = ['message' => 'Invalid secret'];

            return response()->json(json_encode($error, JSON_PRETTY_PRINT) ,403);
        }

        
    }
}

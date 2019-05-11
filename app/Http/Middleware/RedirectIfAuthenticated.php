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

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      switch ($guard) {
        case 'contact':
          if (Auth::guard($guard)->check()) {
            return redirect()->route('contact.dashboard');
          }
          break;
          case 'user':
          if (Auth::guard($guard)->check()) {
            return redirect()->route('dashboard.index');
          }
          break;
        default:
          if (Auth::guard($guard)->check()) {
              return redirect('/');
          }
          break;
      }
      return $next($request);
    }
}

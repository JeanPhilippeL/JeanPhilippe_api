<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class AbortIfNotOwner
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $resourceName
     * @return mixed
     */
    public function handle($request, Closure $next, $resourceName)
    {
        // Sans implicit binding
        // $resourceId = $request->route()->parameter($resourceName);
        // $user_id = \DB::table($resourceName)->find($resourceId)->user_id;
        // Avec implicit binding
        $resource = $request->route()->parameter($resourceName);
        //421 – Programmation d'application web 14
//G. Simard – https://atomrace.com
// Aide au débogage
// echo json_encode(Auth::check());
// echo json_encode(Auth::user()->id);
// echo json_encode($resource->user_id);
// exit();
 if (Auth::check() == false || Auth::user()->id != $resource->user_id) {
 abort(403, 'Unauthorized action.');
 }
 return $next($request);
 }
}
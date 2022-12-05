<?php

namespace App\Http\Middleware;

use Closure,Auth;

class CheckModulePermission {

    private $abilities = [
        'index' => 'index',
        'show' => 'show',
        'edit' => 'edit',
        'update' => 'edit',
        'create' => 'create',
        'store' => ['create','edit'],
        // 'store'=>'edit',
        'delete' => 'destroy',
        "load_data_in_table" => "index",
        "change_status" => "change_status",
        'like'=>'like',
        'comment'=>'comment'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $module_permissions = array();
        $authorize = FALSE;
        if ($request->session()->has("user_access_permission")) {
            $module_permissions = $request->session()->get("user_access_permission");
        }
        if (!empty($module_permissions)) {
            $routeName = explode('.', \Request::route()->getName());
            if (!empty($routeName)) {
                $action = data_get($this->abilities, $routeName[1]);

                if (is_string($action)) {

                    if (!empty($module_permissions[$routeName[0]]) && in_array($action, $module_permissions[$routeName[0]])) {
                        $authorize = TRUE;
                    }
                } else {
                    foreach ($action as $val ) {
                        if (!empty($module_permissions[$routeName[0]]) && in_array($val, $module_permissions[$routeName[0]])) {
                            $authorize = TRUE;
                        }
                    }
                }
            }
        }

        if ($authorize) {
            return $next($request);
        } else {
            if (!$request->expectsJson()) {

                return redirect()
                                ->route("dashboard")
                                ->with("error", "You have not permission to access this functionality");
            } else {
                return \Response::json(array(

                            'success' => FALSE,
                            'message' => "You have not permission to access this functionality"
                ));
            }
        }
    }
}

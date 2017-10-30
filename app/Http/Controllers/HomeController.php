<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Role;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::attempt($attempts, (bool) $request->remember)) {
        $users = DB::table('users')
                      ->join('role_user','users.id', '=' ,'role_user.user_id')
                      ->join('roles','roles.id', '=', 'role_user.role_id')
                      ->select('roles.name','users.status')
                      ->where('users.email','=', $request->email)
                      ->get();
        // REDIRECT PAGE WITH ROLE
        foreach ($users as $list) {
          if ($list->name === "admin") {
            // Dashboard Admin
            return redirect()->intended('/admin');
          } elseif ($list->name === "direktur" || $list->name === "manager" || $list->name === "staff") {
            // Dashboard Direktur // Dashboard Manager // Dashboard Staff
            return redirect()->intended('/dashboard');
          } else {
            Session::flash("flash_notification", [
              "level" => "danger",
              "message" => "Access Forbidden"
            ]);
            return redirect()->intended('/login');
          }
        }
        return false;
      }
    }
}

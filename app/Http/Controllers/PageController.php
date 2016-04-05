<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\User;
use App\Folder;
use Session;
use Auth;

class PageController extends Controller
{
  public function getPage($page, Request $request)
  {
    // Session::forget('folders');
    if ($p = User::where('name', '=', $page)->first()) {
      if (Auth::user() == $p) {
        return view('page', compact('p', 'page'));
      }
      return view('auth.signIn', compact('page'));
    }
    return view('auth.signUp', compact('page'));
  }

  public function signIn(Request $request)
  {
    $this->validate($request, [
      'pass' => 'required'
    ]);

    $p = User::where('name', '=', $request->name)->first();
    if($p->password == $request->pass) {
      Auth::login($p);
      return redirect($request->name);
    }
    return redirect()->back();
  }

  public function signUp(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|alpha_dash',
      'email' => 'email',
      'pass' => 'required'
    ]);

    if($p = User::create(['name' => $request->name, 'password' => $request->pass, 'email' => $request->email])) {
      Auth::login($p);
      return redirect($request->name);
    }
    return redirect()->back();
  }

  public function logOut()
  {
    Auth::logout();
    return redirect()->route('welcome');
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\User;
use App\Folder;

use Auth;
use Session;

class ShellController extends Controller
{
    public function shell(Request $r)
    {
      switch ($l = count($array = explode(" ", $r->item))) {
        case 1:
          if ($array[0]{0} == '/') {
            $folders = Auth::user()->folders()->where('path', '=', $array[0])->get();
            Session::put('folders', $folders);
            Session::put('footer', 'folder');
            return redirect($r->page);
          }
          if ($array[0] == 'clear') {
            Session::forget('content');
            Session::forget('footer');
          }
          break;
        case 2:
          if ($array[0]{0} == '/' and $array[1] == 'new') {
            $aa = explode('/', trim($array[0], '/'));
            $path = $old  = "/";
            for ($i=0; $i < count($aa); $i++) {
              if (Auth::user()->folders()->where('path', '=', $path)->first()) {
                $old = $path;
                $path .= "$aa[$i]/";
              } else {
                  if (Auth::user()->folders()->where('folder', '=', $aa[$i-1])->where('path', '=', $old)->first()) {
                    for ($j=$i ; $j < count($aa); $j++) {
                      Folder::create(['user_id' => Auth::user()->id, 'folder' => $aa[$j], 'path' => $path]);
                      $path .= "$aa[$j]/";
                    }
                    break;
                  }
                  $path = $old;
                  for ($j=$i-1 ; $j < count($aa); $j++) {
                    Folder::create(['user_id' => Auth::user()->id, 'folder' => $aa[$j], 'path' => $path]);
                    $path .= "$aa[$j]/";
                  }
                  break;
                }
              }
            return redirect($r->page);
          }
          break;
        case 3:
          // code...
          break;
        default:
          // >>> Many
          return redirect($r->page);
          break;
      }

      if (in_array($r->item, ['page'])) {
        Session::forget('content');
        Session::put('footer', $r->item);
        return redirect($r->page);
      }
      return redirect($r->page);
    }
}

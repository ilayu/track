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
            $path = $old = '/';
            for ($i=0; $i < count($aa); $i++) {
              if (Auth::user()->folders()->where('path', '=', $path)->where('folder', '=', $aa[$i])->first()) {
                $path .= $aa[$i].'/';
              } else {
                for ($j=$i; $j < count($aa); $j++) {
                  $old = $path; // ?!
                  Folder::create(['user_id' => Auth::user()->id, 'folder' => $aa[$j], 'path' => $path]);
                  $path .= $aa[$i].'/';
                }
                break;
              }
            }
            $folders = Auth::user()->folders()->where('path', '=', $old)->get();
            Session::put('folders', $folders);
            return redirect($r->page);
          }
          if ($array[0]{0} == '/' and $array[1] == 'del') {
            // /a/ del| /a/a/, /a/b/, /a/c/, /a/a/a/ |
            $aa = explode('/', trim($array[0], '/'));
            $path = '/';
            $l = count($aa);
            for ($i=0; $i < $l-1; $i++) {
              $path .= $aa[$i].'/';
            }
            if ($f = Auth::user()->folders()->where('path', '=', $path)->where('folder', '=', $aa[$l-1])->first()) {
              $fpath = $path.$aa[$l-1].'/';
              if (Auth::user()->folders()->where('path', '=', $fpath)->first()) {
                dd('any'); // !!!!!!!!
              } else {
                // dd('one');
                Folder::destroy($f->id);
              }
            }
            // dd('zero');
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

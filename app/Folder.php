<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
  protected $fillable = [
    'user_id',
    'folder',
    'path'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}

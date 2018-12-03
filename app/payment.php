<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $table = 'payments';

    public function User() {
        return $this->hasMany('App\User', 'id', 'userid');
    }
}

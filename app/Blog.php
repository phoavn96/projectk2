<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function question()
    {
        return $this->hasMany('App/Account', 'account_email', 'email');
    }
}

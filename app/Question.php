<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'body', 'inlink', 'outlink'];

    public function getAuthorIdAttribute()
    {
        return $this->getAttribute('user_id');
    }

    public function setAuthorIdAttribute($value)
    {
        $this->attributes['user_id'] = $value;
    }
}

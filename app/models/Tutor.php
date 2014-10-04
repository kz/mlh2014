<?php

class Tutor extends Eloquent {

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function subjects()
    {
        return $this->hasMany('Subject');
    }

} 
<?php

class Tutor extends Eloquent {

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function customer()
    {
        return $this->belongsTo('User', 'matched_user_id');
    }

} 
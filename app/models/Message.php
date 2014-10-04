<?php

class Message extends Eloquent {

    public function tutor() {
        return $this->belongsTo('Tutor', 'tutor_id');
    }

    public function user() {
        return $this->belongsTo('User', 'customer_id');
    }

} 
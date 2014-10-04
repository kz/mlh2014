<?php

class Subject extends Eloquent {

    public function tutor() {
        return $this->belongsTo('Tutor');
    }

} 
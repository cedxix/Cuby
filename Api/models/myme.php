<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author CEDX
 */
use Illuminate\Illuminate\Database\Eloquent\Model as Model;

class Myme_type extends Model {

    //put your code here
    protected $table = 'myme_type';
    // Relationships
    public function files() {
        return $this->hasMany('File');
    }
    
}

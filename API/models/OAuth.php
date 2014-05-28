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

class API_OAuth extends Model {

    //put your code here
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    // Relationships
    public function user() {
        return $this->hasOne('User');
    }
    
}

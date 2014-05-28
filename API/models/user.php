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

class User extends Model {

    //put your code here
    protected $table = 'user';
    // Never send password over json
    protected $hidden = array('encrypted_password');
    
    // Relationships
    public function plan(){
        return $this->belongsTo('Plan');
    }
    public function folder(){
        return $this->hasMany('Folder');
    }
    public function files(){
        return $this->hasMany('File');
    }
    public function OAuth() {
        return $this->hasOne('API_OAuth');
    }

}

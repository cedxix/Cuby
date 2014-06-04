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
use \Illuminate\Database\Eloquent\Model as Model;

class File_activity extends Model {

    //put your code here
    protected $table = 'file_activity';
    // Relationships
//    public function folder() {
//        return $this->belongsTo('Folder');
//    }
//    public function files() {
//        return $this->belongsToMany('File');
//    }

}

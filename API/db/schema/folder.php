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
// Instantiate Eloquen ORM Model
use Illuminate\Database\Capsule\Manager as Capsule;

class folder {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function run() {

        //FOLDER SCHEMA
        Capsule::schema()->create('folder', function($table) {
            $table->increments('folder_id');
            $table->integer('user_id');
            $table->integer('lft');
            $table->integer('rgt');
            $table->timestamps();            
        });
        
        //FOLDER - CONTRIBUTOR SCHEMA
        Capsule::schema()->create('user_folder', function($table) {
            $table->integer('folder_id');
            $table->integer('user_id');           
        });
    }

}

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

class file {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function run() {

        
        //FILE SCHEMA
        Capsule::schema()->create('file', function($table) {
            $table->increments('file_id');
            $table->integer('user_id');
            $table->integer('folder_id');
            $table->float('size');
            $table->integer('myme_type_id');
            $table->integer('tags');
            $table->timestamps();            
        });
        //MYME SCHEMA
        Capsule::schema()->create('myme_type', function($table) {
            $table->increments('myme_type_id');
            $table->string('myme_type_name');            
            $table->string('css_class');            
            $table->timestamps();            
        });
              
    }

}

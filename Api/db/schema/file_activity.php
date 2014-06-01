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

class File_activitySchema {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function run() {

        
        //FILE ACTIVITY SCHEMA
        Capsule::schema()->create('file_activity', function($table) {
            $table->increments('id');
            $table->integer('user_id');            
            $table->string('type',56);            
            $table->timestamps();            
        });
        //FILE ACTIVITY -> FILE SCHEMA
        Capsule::schema()->create('file_file_activity', function($table) {
            $table->integer('file_id');
            $table->integer('file_activity_id');           
        });
    }

}

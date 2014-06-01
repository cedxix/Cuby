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

class UserSchema {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function run() {

        //USER SCHEMA
        Capsule::schema()->create('user', function($table) {
            $table->increments('id');
            $table->string('username', 256);
            $table->string('email', 254);
            $table->text('encrypted_password');
            $table->string('fullname', 512);
            $table->integer('root_folder_id');            
            $table->integer('plan_id');            
            $table->datetime('plan_suscribed_at');            
            $table->integer('login_success_count');            
            $table->integer('login_error_count');            
            $table->string('last_sign_ip');            
            $table->string('avatar');            
            $table->integer('user_role');            
            $table->timestamps();            
        });
    }

}

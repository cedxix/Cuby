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

class PlanSchema {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function run() {

        //Capsule::schema()->dropIfExists($table)
       //PLANS SCHEMA
        Capsule::schema()->create('plan', function($table) {
            $table->increments('id');
            $table->text('description');
            $table->float('storage_space');
            $table->integer('max_upstream');
            $table->integer('max_downstream');
            $table->integer('daily_shared_link_quota');
            $table->integer('bill_intervall');
            $table->timestamps();            
        });
       
    }

}

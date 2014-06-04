<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Controller
 *
 * @author CEDX
 */
use \UserModel as User;

class UserController {

    //put your code here
    public function index() {
        
    }

    public function create(User $user) {
        //
        try {
            User::create($user->toArray());
            return(USER_CREATED_SUCCESSFULLY);
        } catch (Exception $ex) {
            echo $ex;
            return USER_CREATE_FAILED;
        }
    }

    public function edit(User $user) {
        //
        $user = User::find($user);
        $user->save($options);
    }

    public function update($id, $user = null) {
        //
        $user = user::find($id);
        $user->save();
    }

    public function delete($id) {
        //
        $user = user::find($id);
        $user->delete();
        return true;
    }

    public static function getUserByUsername($username = null) {
        try {
            $user = User::where('username', '=', "$username")->get();
            if ($user) {
                return true;
            }else{return false;}
            
        } catch (Exception $ex) {
            throw $ex;
        }
    }


    public function get($id) {
        //        
        $user = User::find($id);
        return $user;
    }

    public function getAll() {
        //        
        $user = User::all();
        return $user;
    }

}

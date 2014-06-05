<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FileController
 *
 * @author CEDX
 */
use \FileModel as File;

class FileController {
    //put your code here
    //put your code here
    public function index() {
        
    }

    public function create($file) {
        //
//        try {
            File::create($file);
//            return true;
//        } catch (Exception $ex) {
//            die($ex);
//            return false;
//        }
    }

    public function edit(File $file) {
        //
        $file = File::find($File);
        $file->save($options);
    }

    public function update($id, $file = null) {
        //
        $file = File::find($id);
        $file->save();
    }

    public function delete($id) {
        //
        $file = File::find($id);
        $file->delete();
        return true;
    }

    public function get($id) {
        //        
        $file = File::find($id);
        return $file;
    }

    public function getAll() {
        //        
        $file = File::all();
        return $file;
    }
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FileHelper
 *
 * @author CEDX
 */
class FileHelper {

//    //put your code here
    public function upload(\Slim\Slim $app, $uploaddir = null) {
//        // We're putting all our files in a directory called images.
//        if ($uploaddir == null) {
//            $uploaddir = '/images/';
//        }
//
//// The posted data, for reference
//        $file = $app->request()->post('value');
//        $name = $app->request()->post('name');
//
//// Get the mime
//        $getMime = explode('.', $name);
//        $mime = end($getMime);
//
//// Separate out the data
//        $data = explode(',', $file);
//
//// Encode it correctly
//        $encodedData = str_replace(' ', '+', $data[1]);
//        $decodedData = base64_decode($encodedData);
//
//// You can use the name given, or create a random name.
//// We will create a random name!
//
//        $randomName = substr_replace(sha1(microtime(true)), '', 12) . '.' . $mime;
//        if (file_put_contents($uploaddir . $randomName, $decodedData)) {
//            echo $randomName . ":uploaded successfully";
//        } else {
//            // Show an error message should something go wrong.
//            echo "Something went wrong. Check that the file isn't corrupted";
//        }
//    }


        $ds = DIRECTORY_SEPARATOR;

        $storeFolder = ROOT_FOLDER;   //2

        if (!empty($_FILES)) {

            $tempFile = $_FILES['file']['tmp_name'];          //3             
            $targetPath = $storeFolder. $ds;  //4
            $targetFile = $targetPath . $_FILES['file']['name'];  //5
            move_uploaded_file($tempFile, $targetFile); //6
        }
    }

}

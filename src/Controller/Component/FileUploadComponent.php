<?php

/**
 * Created by PhpStorm.
 * User: Rana
 * Date: 4/21/2016
 * Time: 6:14 PM
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Filesystem\File;


class FileUploadComponent extends Component {

    public function upload_file($file, $path = null, $validation = ['jpg', 'png']) {

        $base_upload_path = WWW_ROOT;
        //debug($base_upload_path);
        $result = array();
        //debug($result);
        if (isset($file) && ($file['error'] == 0)) {

            $ext = explode(".", $file["name"]);

            if (in_array(strtolower(end($ext)), $validation)) {
                $tmp_name = $file["tmp_name"];
                $name = time() . '_' . str_replace(' ', '_', $file['name']);
                if ($path) {

                    if (!file_exists($path)) {
                        mkdir($path, 777, true);
                    }
                    $file_name = $name;

                    $name = $path . '/' . $name;
                }
                if (move_uploaded_file($tmp_name, $base_upload_path . '/' . $name)) {
                    $result['status'] = true;
                    $result['file_path'] = $name;
                    $result['file_name'] = $file_name;
                    return $result;
                } else {
                    $result['status'] = false;
                    $result['message'] = 'Failed to upload';
                    return $result;
                }
            } else {
                $result['status'] = false;
                $result['message'] = 'Invalid file type';
                return $result;
            }
        } else {

            $result['status'] = false;
            return $result;
        }
    }

    public function upload_file_different_mime($file, $path = null, $validation = ['pdf', 'doc', 'jpg', 'png']) {

        $base_upload_path = WWW_ROOT;
        //debug($base_upload_path);
        $result = array();
        //debug($result);
        if (isset($file) && ($file['error'] == 0)) {

            $ext = explode(".", $file["name"]);

            if (in_array(strtolower(end($ext)), $validation)) {
                $tmp_name = $file["tmp_name"];
                $name = time() . '_' . str_replace(' ', '_', $file['name']);
                if ($path) {

                    if (!file_exists($path)) {
                        mkdir($path, 777, true);
                    }
                    $file_name = $name;

                    $name = $path . '/' . $name;
                }
                debug($_FILES);
                if ($_FILES['map_file']['error'] !== UPLOAD_ERR_OK) {
                    
                    die("Upload failed with error " . $_FILES['file']['error']);
                }
                //debug(FILEINFO_MIME);
                
                $finfo = finfo_open(FILEINFO_MIME);
                debug($finfo);
                $mime = finfo_file($finfo, $_FILES['map_file']['tmp_name']);
                debug($mime);
                
                $ok = false;
                switch ($mime) {
                    case 'image/jpeg':
                    case 'application/pdf':
                    case 'application/msword':
                        move_uploaded_file($tmp_name, $base_upload_path . '/' . $name);
                        $ok = true;
                    default:
                        die("Unknown/not permitted file type");
                        //working on it
                }
            } else {
                $result['status'] = false;
                $result['message'] = 'Invalid file type';
                return $result;
            }
        } else {

            $result['status'] = false;
            return $result;
        }
    }

}

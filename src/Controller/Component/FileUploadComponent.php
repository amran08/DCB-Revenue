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

    public function upload_file_any_mime($file, $path = null) {

        $base_upload_path = WWW_ROOT;
        //debug($base_upload_path);
        $result = array();
        //debug($result);
        $accepted = array(
            'image/jpeg' => 'jpg',
            'application/pdf' => 'pdf',
            'image/png' => 'png'
                //'application/zip' => 'zip',
        );

        if (isset($file) && ($file['error'] == 0)) {
            //echo "aaaa";
            //die();
            $ext = explode(".", $file["name"]);

            $finfo = finfo_open(FILEINFO_MIME);
            //debug($finfo);
            //debug($_FILES['map_file']['tmp_name'][0]);

            $mime = finfo_file($finfo, $_FILES['map_file']['tmp_name']);
            // debug($mime);
            $tmp_name = $file["tmp_name"];
            $name = time() . '_' . str_replace(' ', '_', $file['name']);
            //debug($name);

            if ($path) {

                if (!file_exists($path)) {
                    mkdir($path, 777, true);
                }
                $file_name = $name;

                $name = $path . '/' . $name;
            }
            debug($mime);

            $mime = array_shift(explode(';', $mime));
            // debug($file_name);
            //debug($mime);

            if (!array_key_exists($mime, $accepted)) {

                echo 'Error: Unsupported file type!<br/>';
            } else {

                if (move_uploaded_file($tmp_name, $base_upload_path . '/' . $name)) {
                    $result['status'] = true;
                    $result['file_path'] = $name;
                    $result['file_name'] = $file_name;
                    //debug($result);
                    return $result;
                } else {
                    $result['status'] = false;
                    $result['message'] = 'Failed to upload';
                    return $result;
                }
            }
//            } else {
//                $result['status'] = false;
//                $result['message'] = 'Invalid file type';
//                return $result;
//            }
        } else {

            $result['status'] = false;
            return $result;
        }
    }

    public function upload_multiple_file_any_mime($file, $path = null) {

        $base_upload_path = WWW_ROOT;
        //debug($base_upload_path);
        $result = array();
        //debug($result);
        $accepted = array(
            'image/jpeg' => 'jpg',
            'application/pdf' => 'pdf',
            'image/png' => 'png',
            'application/zip' => 'zip',
            'txt' => 'text/plain',
            'htm' => 'text/html',
            'html' => 'text/html',
            'json' => 'application/json',
            'application/vnd.ms-excel' => 'xls',
            'application/msword' => 'doc',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx'
        );

        if (isset($file) && ($file['error'] == 0)) {
            $ext = explode(".", $file["name"]);

            $finfo = finfo_open(FILEINFO_MIME);

            $mime = finfo_file($finfo, $file['tmp_name']);
            // debug($mime);
            $tmp_name = $file["tmp_name"];
            $name = time() . '_' . str_replace(' ', '_', $file['name']);
            //debug($name);
            if ($path) {

                if (!file_exists($path)) {
                    mkdir($path, 777, true);
                }
                $file_name = $name;

                $name = $path . '/' . $name;
            }

            $mime = explode(';', $mime);
            $mime_checked = array_shift($mime);

            if (!array_key_exists($mime_checked, $accepted)) {

                echo 'Error: Unsupported file type!<br/>';
            } else {

                if (move_uploaded_file($tmp_name, $base_upload_path . '/' . $name)) {
                    $result['status'] = true;
                    $result['file_path'] = $name;
                    $result['file_name'] = $file_name;
                    //debug($result);
                    return $result;
                } else {
                    $result['status'] = false;
                    $result['message'] = 'Failed to upload';
                    return $result;
                }
            }
//            } else {
//                $result['status'] = false;
//                $result['message'] = 'Invalid file type';
//                return $result;
//            }
        } else {
            echo "err";
            $result['status'] = false;
            return $result;
        }
    }

}

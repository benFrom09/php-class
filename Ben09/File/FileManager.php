<?php
declare (strict_types=1);
namespace Ben09\File;

use Ben09\File\FileUploadException;
use Psr\Http\Message\ServerRequestInterface;

define("MIME_TYPE",10);
define("DIRECTORY_ERROR",11);


class FileManager
{
    protected $file;

    protected $authorized = false;

    protected $ext = [
        "jpg"=>"image/jpeg",
        "png"=>"image/png",
        "gif"=>"image/gif",
        "pdf"=>"image/pdf"
    ];

    protected $storage = STORAGE;


    public function __construct (ServerRequestInterface $request,string $key) {
            $upload = $request->getUploadedFiles();
            if (isset($upload[$key])) {
                $this->error = $upload[$key]->getError();
                if(!$this->checkError($this->error))  throw  (new FileUploadException(null,$this->error));
                $filetype = $upload[$key]->getClientMediaType();
                $this->checkExt($filetype);
                if(!$this->authorized)  throw (new FileUploadException(null,MIME_TYPE));
                $this->file = $upload[$key];
            }
    }


    public function moveTo(string $dir) {
        if(is_dir($dir)){
            $extension = pathinfo($this->file->getClientFilename(), PATHINFO_EXTENSION);
            $basename = bin2hex(random_bytes(8));
            $filename = sprintf('%s.%0.8s', $basename, $extension);
            $this->file->moveTo($dir . DIRECTORY_SEPARATOR .  $filename);
            return true;
        } else {
            echo (new FileUploadException("The directory $dir does not exist!"))->getMessage();
            die();
        }  
    }

    public function checkExt($filetype) {
        $this->authorized = array_search($filetype,$this->ext);
    }

    public function checkError($error):bool {
        return $error === UPLOAD_ERR_OK;
    }
    
}
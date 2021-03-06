<?php
namespace Ben09\File;

use Exception;

class FileUploadException extends Exception
{
    public function __construct(string $message = null,int $code = null) {
        if(!is_null($message)) {
            $_message = $message;
        } else {
            $_message = $this->codeToMessage($code);
        }
        
        parent::__construct($_message, $code);
    }

    private function codeToMessage($code)
    {
        switch ($code) {
            case UPLOAD_ERR_INI_SIZE:
                $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                break;
            case UPLOAD_ERR_PARTIAL:
                $message = "The uploaded file was only partially uploaded";
                break;
            case UPLOAD_ERR_NO_FILE:
                $message = "No file was uploaded";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $message = "Missing a temporary folder";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $message = "Failed to write file to disk";
                break;
            case UPLOAD_ERR_EXTENSION:
                $message = "File upload stopped by extension";
                break;
            case MIME_TYPE: 
                $message = "Unsupported mime type extention";
                break;
            default:
                $message = "Unknown upload error";
                break;
        }
        return $message;
    }
}
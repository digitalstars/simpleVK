<?php
namespace DigitalStar\vk_api;

use Exception;

class VkApiException extends Exception {

    public function __toString() {
        $error = "[Exception]: возникла ошибка:";
        $error .= "\r\n[Exception]: текст: {$this->getMessage()}";
        $error .= "\r\n[Exception]: код ошибки: {$this->getCode()}";
        $error .= "\r\n[Exception]: файл: {$this->getFile()}:{$this->getLine()}";
        $error .= "\r\n[Exception]: путь ошибки: {$this->getTraceAsString()}\r\n";
        if (!is_dir('error'))
            mkdir('error');
        $file = fopen('error/error_log' . date('d-m-Y_h') . ".log", 'a');
        fwrite($file, $error);
        fclose($file);
        exit();
        // parent::__toString(); // TODO: Change the autogenerated stub
    }
}

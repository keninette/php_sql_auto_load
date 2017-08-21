<?php
/**
 * Class used to manage directories in PHP
 *
 * @author DGA
 */
class Directory {
    private $files;
    private $path;
    
    public function __construct($path) {
        $this->path($path);
    }
    
    public function getFiles() {
        return $this->files;
    }

    public function setFiles($files) {
        $this->files = $files;
    }
    
    public function getPath() {
        return $this->path;
    }

    public function setPath($path) {
        if (is_dir($path)) {
            $this->path = $path;
        } else {
            $this->path = '';
        }
    }
    
    function addFile($file){
        $this->getFiles()[] = $file;
    }
    
    public function getDirFiles() {
        if ($handle = opendir($this->getPath())){
            while (false !== ($file = readdir($handle))) {
                $this->addFile($file);
            }
        }
        var_dump($this->getFiles());
    }
}
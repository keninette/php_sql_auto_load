<?php
/**
 * Class used to manage files in PHP
 *
 * @author DGA
 */
class File {
    private $directory;
    private $fileName;
    private $fullFileName;
    private $fileNameWithoutExtension;
    private $extension;
    private $chmod;
    private $creationDate;

    const DEFAULT_CHMOD = '0777';
    
    /**
     * Constructeur de la classe
     * @param String $psFileName : nom du fichier (sans le chemin complet)
     * @param String $psDirectory : chemin relatif du dossier
     */
    public function __construct($psFileName, $psDirectory ) {
        $this->setFileName($psFileName);
        $this->setFileNameWithoutExtension();
        $this->setExtension();

        if ($psDirectory !== '') {
            $this->setDirectory($ps_directory);
            $this->setFullFileName();
            $this->makeDirectory(); 
        }
        
    }
 
    /**
     * Function to change file CHMOD
     */
    public function changeChmod() {
        try {
            if ($this->getFullFileName() == '') { throw new Exception('Exception : file path is empty !'); }
            chmod($this->getFullFileName(), $this->getChmod());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Create a directory if it doesn't already exists
     * Set CHMOD (default value in class constant if $chmod not defined)
     */
    public function makeDirectory() {
        
        try {
            // Create directory if if doesn't already exists
            if (! is_dir($this->getDirectory())) {
                mkdir($this->getDirectory(),$this->getChmod(),true);
            }
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Open (and create if necessary), write in and close file
     * @param String $psContent
     * @return boolean : true if ok, if exception caught : false
     * @throws Exception
     */
    public function writeFile($psContent) {
        // If $ps_content is empty, abort
        if ($psContent == '') { return true; }
            
        try {
            // Throw exception if $fullFileName is empty
            if ($this->getFullFileName() == '') { throw new Exception('Exception : file path is empty !'); }
            
            // Open file
            $currentFile = fopen($this->getFullFileName(),'a');
            
            // Throw exception if unable to open or create file
            if ($currentFile == false) { throw new Exception('Exception : unable to open file !'); } 
            
            // Write in file and close it
            fwrite($currentFile,$psContent);
            fclose($currentFile);
            
            return true;
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }  
    }
    
    /**
     * Compares nb of days since file has been created and max Nb of days allowed
     * @param int $maxDays : max nb of days allowed for this file
     * @param String $dateStartString : string representing the file's creation date
     * @return bool : true if older than max nb of days, else false
     */
    public function isOldFile($maxDays, $dateStartString) {
        $dateStart  = date_create($dateStartString);
        $dateEnd    = date_create(date('Ymd'));
        $interval   = date_diff($dateStart,$dateEnd , true);
        
        return $interval->days >= $maxDays;
    }
    
    /**
     * Delete the file
     * @return bool : true if it has successfully been deleted, else false
     */
    public function removeFile() {
        return unlink($this->fullFileName);
    }
    
    /**
     * $directory getter
     * @return String
     */
    function getDirectory() {
        return $this->directory;
    }
    
    /**
     * $fileName getter
     * @return String
     */
    function getFileName() {
        return $this->fileName;
    }
    
    /**
     * $directory setter
     * @param type $directory
     */
    function setDirectory($directory) {
        $this->directory = $directory;
    }
    
    /**
     * $fileName 
     * @param type $fileName
     */
    function setFileName($fileName) {
        $this->fileName = $fileName;
    }
    
    /**
     * $chmod getter
     * @return String
     */
    function getChmod() {
        // Return CHMOD
        return $this->chmod;
    }
    
    /**
     * $chmod setter
     * @param type $chmod
     */
    /*function setChmod($chmod) {
        if (chmod($this->directory, $chmod)) {
            $this->chmod = $chmod;
        }
    }*/
   
    /**
     * $chmod setter
     * @param type $chmod
     */
    function setChmod() {
        if (chmod($this->directory, 0777)) {
            $this->chmod = 0777;
        }
    }

    /**
     * $fullFileName getter
     * @return String : directory/fileName or ''
     */
    function getFullFileName() {
        return $this->fullFileName;
    }
    
    /**
     * $fullFileName setter
     * Concatenate directory and filename if not empty
     * Else just set empty string
     */
    function setFullFileName() {
        // Check if directory and filename are not empty
        if ($this->getDirectory() == '' || $this->getFileName() == '') {
            $this->fullFileName = '';
        } else {
            // Concatenate directory & filename
            $this->fullFileName = $this->getDirectory() .$this->getFileName();
        }
    }
    
    /**
     * $fileNameWithoutExtension getter
     * @return String : file name without extensions
     */
    function getFileNameWithoutExtension() {
        return $this->fileNameWithoutExtension;
    }
    
    /**
     * $fileNameWithoutExtension setter
     * Get filename without extension (first . in filename)
     */
    function setFileNameWithoutExtension() {
        $this->fileNameWithoutExtension = substr($this->fileName, 0, strpos($this->fileName,'.'));
    }
    
    /**
     * $extension getter
     * @return String : file's extension (last . in filename)
     */
    function getExtension() {
        return $this->extension;
    }

    /**
     * $extension setter
     * file extension (last . in filename)
     */
    function setExtension() {
        $this->extension = substr($this->fileName, strpos($this->fileName,'.')+1, strlen($this->fileName) );
    }

    /**
     * $creationDate setter
     * @param type $creationDate
     */
    function setCreationDate() {
        $this->creationDate = '';
        $fileNameWithoutExtension = $this->getFileNameWithoutExtension();
        if ($this->getExtension() === 'log') {
            $this->creationDate = $fileNameWithoutExtension;
        } else if ($this->getExtension() === 'json.done'){
            $this->creationDate = substr($fileNameWithoutExtension, strrpos($fileNameWithoutExtension,'_')+1, (strlen($fileNameWithoutExtension)-6)-((strrpos($fileNameWithoutExtension,'_')+1)));
        }
    } 

    /**
     * $creationDate getter
     * @return String : file's creation date
     */
    function getCreationDate() {
        return $this->creationDate;
    }
}

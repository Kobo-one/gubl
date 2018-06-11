<?php
    include_once("Db.class.php");

    class Image{
        private $fileName;
        private $fileSize;
        private $fileTmp;
        private $fileType;
        private $fileDir;
        private $fileExt;
        
    /*Setters*/
        
    public function setFileName($fileName){
            $this->fileName = $fileName;
            return $this;
    }
        
    public function setFileSize($fileSize){
            $this->fileSize = $fileSize;
            return $this;
    }
      
    public function setFileTmp($fileTmp){
            $this->fileTmp = $fileTmp;
            return $this;
    }   
        
    public function setFileType($fileType){
            $this->fileType = $fileType;
            return $this;
    }
        
    public function setFileDir($fileDir){
            $this->fileDir = $fileDir;
            return $this;
    }
        
    public function setFileExt($fileExt){
        $expensions = array("jpeg","jpg","png");
        if(in_array($fileExt, $expensions) === false){
            return false;
        }
            $this->fileExt = $fileExt;
            return $this;
    }
        
    /*Getters*/
    
    public function getFileName()
    {
        return $this->fileName;
    }
        
    public function getFileSize()
    {
        return $this->fileSize;
    }
        
    public function getFileTmp()
    {
        return $this->fileTmp;
    }
        
    public function getFileType()
    {
        return $this->fileType;
    }
        
    public function getFileDir()
    {
        return $this->fileDir;
    }
        
    public function getFileExt()
    {
        return $this->fileExt;
    }
        
    //compress uploaded image
        
    
    }


?>
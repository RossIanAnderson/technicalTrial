<?php

// Reused file

class Upload
{
    protected $upload, $dir, $size, $name, $allowed, $ext;
            
    function __construct($upload = [], $dir, $name = null, $size, $allowed = ["jpg","png","jpeg"]){
        $this->upload = $upload;
        $this->dir = $dir;
        $this->size = $size;
        $this->allowed = $allowed;
        if($name){
            $this->name = $name;
        }
        else {
            $explode = explode('.', $this->upload['name']);
            $this->name = $explode[0];
        }
        $this->upload();
    }
    
    public function getFullName(){
        return $this->name . '.' . $this->ext;
    }   

    private function upload(){
        $explode = explode(".", strtolower($this->upload['name']));
        $key = count($explode) - 1;
        $this->ext = $explode[$key];
        
        if (in_array($this->ext, $this->allowed)) {
            if ($this->upload['size'] < $this->size) {
                
                $tmpname = $this->upload['tmp_name'];
                $new = $this->name . '.' . $this->ext;
                
                move_uploaded_file($tmpname, $this->dir . '/' . $new);            
            }
            else {
                throw new Exception('The file is too large.');
            }
        }
        else {
            throw new Exception('Not an appropriate filetype.');
        }
    }
}
?>
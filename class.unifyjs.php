<?php 

class unifyJS {
    private $debugger_js;
    private $separate_files;
    private $separate_pathFile;
    private $single_file;
    private $single_pathFile;
    private $version;
    private $version_root; 
    private $version_control;  

    public function __construct() {
        $json=array();
        $json=json_decode(file_get_contents($GLOBALS['APP_JSON'].'/unifyConfig.json'));

        $this->debugger_js=$json->debugger_js;
        $this->separate_files=$json->separate_files;
        $this->separate_pathFile=$json->separate_pathFile;
        $this->single_file=$json->single_file;
        $this->single_pathFile=$json->single_pathFile;
        $this->version_root=$json->version_root;
        
        foreach ($json->separate_files as  $value) {
            $singleJS.=file_get_contents($GLOBALS['APP'].'/'.$json->separate_pathFile.$value);
        }
      
        if($json->debugger_js===false){
            $this->version=$this->version_root.'.'.$json->version.'.js';  
            $oldJS=file_get_contents($GLOBALS['APP'].'/'.$json->single_pathFile.$json->single_file.'-'.$this->version);

            if(strcmp($singleJS,$oldJS)<>0){
                if($json->version_control==true){
                    $json->version++;
                    file_put_contents($GLOBALS['APP_JSON'].'/unifyConfig.json', json_encode($json));
                    $this->version=$this->version_root.'.'.$json->version.'.js'; 
                }
                file_put_contents($GLOBALS['APP'].'/'.$json->single_pathFile.$json->single_file.'-'.$this->version,$singleJS);                  
            }  
       } 
    }

    public function echoJS(){

        if($this->debugger_js===true){
            foreach ($this->separate_files as  $value) {
                $return.='<script src="'.$this->separate_pathFile.$value.'"></script>';
            }
        }
        else{
            $return='<script src="'.$this->single_pathFile.$this->single_file.'-'.$this->version.'"></script>';
        }
        return $return;
    }
}    

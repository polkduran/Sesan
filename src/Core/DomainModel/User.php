<?php
class User{
    
    public $id;
    public $name;
    public $password;
    public $passwordValidated;
    
    public static function fromDataFile($id){
        $lines = fopen($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        // $lines = array("lol","name","pass","true");
        
        $user = new User();
        $user->id = $lines[0];
        $user->name = $lines[1];
        $user->password = $lines[2];
        $user->passwordValidated = (bool)$lines[3];
        
        return $user;
    }
    
    public function save(){
        $fp = fopen($filePaht, 'w');
        
        fwrite($fp, $this->id);
        fwrite($fp, $this->name);
        fwrite($fp, $this->password);
        fwrite($fp, $this->passwordValidated);
        
        fclose($fp);        
    }
}

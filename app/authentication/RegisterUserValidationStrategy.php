<?php

class RegisterUserValidationStrategy implements ValidationStrategy {
    public function validate($data) {
        $hashPasswd = password_hash($data['password'], PASSWORD_DEFAULT);
        $query = "SELECT email from user where email=:email";
        $this->db->query($query);
        $this->db->bind('email',$data['email']);
        $this->db->execute();
        if($this->db->single()>0){
            return FALSE;
        }else {
            $query = "INSERT INTO user VALUES ('',:nama,:email,:password,:hakAkses,:tgl_lahir,:jk,'')";
            $this->db->query($query);
            $this->db->bind('nama',$data['nama']);
            $this->db->bind('email',$data['email']);
            $this->db->bind('password',$hashPasswd);
            $this->db->bind('hakAkses','member');
            $this->db->bind('tgl_lahir',$data['tgl_lahir']);
            $this->db->bind('jk',$data['jk']);
    
            $this->db->execute();
            return $this->db->rowCount();
        }
    }
}
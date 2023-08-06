<?php

class LoginValidationStrategy implements ValidationStrategy {
    public function validate(array $data): bool {

        $query = "SELECT * FROM user WHERE email=:email";
        $this->db->query($query);
        $this->db->bind('email',$data['email']);

        $this->db->execute();
        $dt = $this->db->single();

        if($this->db->rowCount()>0){
            if (password_verify($data['password'], $dt['password'])) {
                $_SESSION["user_session"] = $dt["id_user"];
                $_SESSION["nama"] = $dt["nama"];
                $_SESSION["hakAkses"] = $dt["hakAkses"];
                $_SESSION["email"] = $dt["email"];
                $_SESSION["tgl_lahir"] = $dt["tgl_lahir"];
                $_SESSION["jk"] = $dt["jk"];
                $_SESSION["password"] = $data['password'];
                header("Location: ".BASEURL."/dashboard/index");
            } else return FALSE;
        }
        return $this->db->rowCount();
    }
}
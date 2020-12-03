<?php

class Usuarios extends Model
{

    public function Validar($email, $password)
    {

        if (strlen($email) < 1) throw new ValidacionException('error2 email validar');//die("error2"); #si las validaciones desde js están hechas, representa un problema de seguridad. Analizo el dato
        if (strlen($password) > 50) throw new ValidacionException('error3 password validar');//die("error3");


        $email = substr($email, 0, 50);
        $email = $this->db->escapeWildcards($email);

        if (strlen($password) < 1) throw new ValidacionException('error2 password validar');//die("error2"); #si las validaciones desde js están hechas, representa un problema de seguridad. Analizo el dato
        if (strlen($password) > 50) die("error4 password validar");
        $passwd = substr($password, 0, 50);

        $passwd = $this->db->escapeWildcards($passwd);
        $passwd = sha1($passwd);

        $respuesta = $this->db->query("SELECT u.email, u.password FROM usuarios u WHERE email = '$email' AND password= '$passwd'
                        LIMIT 1");

        if ($this->db->numRows($respuesta) == 1) {
            return $this->db->fetchAll();

        } else {
            return false;
            
        }
    }

    public function existeUsuario($correo){

        $res = $this->db->query("SELECT email FROM usuarios u
                        WHERE u.email = '$correo'
                        LIMIT 1");

        if($this->db->numRows($res) != 1) return false;
        
        return true;
    }

    public function SignUp($email, $password) {

        if (strlen($email) < 1) throw new ValidacionException('error2 email signup');//die("error2"); #si las validaciones desde js están hechas, representa un problema de seguridad. Analizo el dato
        if (strlen($password) > 50) new ValidacionException('error3 password signup');//die("error3");
        $email = substr($email, 0, 50);

        $email = $this->db->escapeWildcards($email);

        if (strlen($password) < 1) throw new ValidacionException('error2 password signup');//die("error2"); #si las validaciones desde js están hechas, representa un problema de seguridad. Analizo el dato
        if (strlen($password) > 50) throw new ValidacionException('error3 email signup');//die("error3");
        $passwd = substr($password, 0, 50);

        $passwd = $this->db->escapeWildcards($passwd);

        $passwd = sha1($passwd);

        $usuarioaux = new Usuarios;

        if($usuarioaux->existeUsuario($email)) {
        //echo '<script language="javascript">'; //tengo que hacer una vista
        //echo 'alert("Este email ya está registrado, recuperá tu contraseña!")';
        //echo '</script>'; //preguntar a mauro por que no funciona el header con el alert
        return false;
        //header("Location: login"); //controlador

        } 
        
        else {
            $this->db->query("INSERT INTO usuarios
                        (email, password)  VALUES ('$email', '$passwd') ");
        return true;

        }
    }


    public function ForgotPass($email, $password) {

        if (strlen($email) < 1) throw new ValidacionException('error2 email forgotpass');//die("error2"); #si las validaciones desde js están hechas, representa un problema de seguridad. Analizo el dato
        if (strlen($password) > 50) throw new ValidacionException('error2 password forgotpass');//die("error3");
        $email = substr($email, 0, 50);

        $email = $this->db->escapeWildcards($email);

        if (strlen($password) < 1) throw new ValidacionException('error3 password forgotpass');//die("error2"); #si las validaciones desde js están hechas, representa un problema de seguridad. Analizo el dato
        if (strlen($password) > 50) throw new ValidacionException('error4 password forgotpass');//die("error3");
        $passwd = substr($password, 0, 50);

        $passwd = $this->db->escapeWildcards($passwd);

        $passwd = sha1($passwd);

        $usuarioaux = new Usuarios;

        if($usuarioaux->existeUsuario($email)) {
            $this->db->query("UPDATE usuarios
                            SET password = '$passwd'
                            WHERE email = '$email'
                            LIMIT 1 ");
        return false;

        } 
        
        else {
            //echo '<script language="javascript">';
            //echo 'alert("Este email no está registrado!")';
            //echo '</script>';
            return false;

        }
    }
}

class ValidacionException extends Exception{

}

<?php

class Med_Register
{ 
    private $name = $_POST['name'];
    private $email = $_POST['email'];
    private $password = MD5($_POST['psw']);

    public function __construct()
    {
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            if (isset($_POST['email']) && !empty($_POST['email'])) {
                if (isset($_POST['psw']) && !empty($_POST['psw'])) {
                    $query_select = "SELECT nome FROM medicos 
                                    WHERE nome = 'getName()'";
                    $dbpath = 'mysql:host=localhost;dbname=banco-dados';
                    $db = new PDO($dbpath, 'root', '32756484');
                    foreach ($db->query($query_select) as $nome) {
                        if ($nome == 'getName()') {
                            echo"<script language='javascript' 
                            type='text/javascript'>alert('Médico já cadastrado!');
                            window.location.href='med_register.html';</script>";
                            die();
                        }
                    }
                    $query_select="SELECT email FROM medicos 
                                    WHERE email = 'getEmail()'";
                    foreach ($db->query($query_select) as $email) {
                        if ($email == 'getEmail()') {
                            echo"<script language='javascript' 
                            type='text/javascript'>alert('E-mail já cadastrado!');
                            window.location.href='med_register.html';</script>";
                            die();
                        }
                    }
                    try {
                        $insert = "INSERT INTO medicos (nome, email, senha) 
                                    VALUES ('getName()', 'getEmail()', 'getPass()')";
                        $db->query($insert);    
                        echo"<script language='javascript' type='text/javascript'>
                        alert('Cadastro realizado com sucesso!');
                        window.location.href='med_register.html';</script>"; 
                    } catch (PDOException $e) {
                        print "Error!: " . $e->getMessage() . "<br/>";
                        die();
                    }
                } else {
                    echo"<script language='javascript' type='text/javascript'>
                    alert('O campo senha não pode estar vazio');
                    window.location.href='med_register.html';</script>";
                }
            } else {
                echo"<script language='javascript' type='text/javascript'>
                alert('O campo e-mail não pode estar vazio');window.location.href='
                med_register.html';</script>";
            }
        } else {
            echo"<script language='javascript' type='text/javascript'>
            alert('O campo nome não pode estar vazio');window.location.href='
            med_register.html';</script>";
        }
        
        //RESULT PAGE
        $path = "/src/view/index.html";
        
        //SHOW RESULT PAGE 
        
        header("Location: $path");
    }
  
    public function getName() {
        return $name;
    }

    private function setName($newname) 
    {
        $name  = $newname;
    }

    public function getPass() {
        return $password;
    }

    public function setPass($newpass) 
    {
        $password  = $newpass;
    }

    private function getEmail() {
        return $email;
    }

    private function setEmail($newemail) 
    {
        $email  = $newemail;
    }
}
?>
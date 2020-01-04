<?php

try {
    session_start();
    function loginUser($email, $passuser)
    {
        $username = 'root';
        $password = '';
        $pdo = new PDO('mysql:host=localhost;dbname=blog', $username, $password);


        $statement = $pdo->prepare('SELECT password from user where email=:email');
        $statement->bindParam(':email', $_POST['email']);
        $statement->execute();
        $passhashdb = $statement->fetch();


        if ($email === $_POST['email']) {

            if (password_verify($passuser, $passhashdb[0])) {

                $_SESSION['loggedUser'] = [
                    'name' => 'Admin'
                ];
                header("Location: index.php");
                return true;
            } else {
                echo "<script>alert('Credenziali errate, riprova')</script>";
            }
        }
        return false;
    }


    function isLogged()
    {
        return isset($_SESSION['loggedUser']);
    }
    function logoutUser()
    {
        unset($_SESSION['loggedUser']);
        header("Location: ../index.php");
    }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

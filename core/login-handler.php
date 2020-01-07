<?php

try {
    session_start();
    function loginUser($email, $passuser)
    {
        $username = 'root';
        $password = '';
        $pdo = new PDO('mysql:host=localhost;dbname=blogdef', $username, $password);


        $statement = $pdo->prepare('SELECT firstName, password, id from user where email=:email');
        $statement->bindParam(':email', $_POST['email']);
        $statement->execute();
        $userdata = $statement->fetch();
        if ($email === $_POST['email']) {

            if (password_verify($passuser, $userdata[1])) {

                $_SESSION['loggedUser'] = [
                    'name' => "$userdata[0]",
                    'user_id'=> "$userdata[2]"
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

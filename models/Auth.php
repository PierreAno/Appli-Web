<?php
try {
    class Auth extends Model{
        static function isloged(){

            $cnx = new PDO('mysql:host=localhost;dbname=projetstage', 'root', '');

            if(isset($_SESSION['Auth']) && isset($_SESSION['Auth']['login']) && isset($_SESSION['Auth']['pwd'])){
                $q = array('nom'=>$_SESSION['Auth']['login'], 'pwd'=>$_SESSION['Auth']['pwd']);
                $sql = 'SELECT id FROM tblusers WHERE nom = :login AND password = :pwd';
                $req = $cnx->prepare($sql);
                $req->execute($q);
                $count = $req->rowCount($sql);
                    if($count == 1){
                        return true;
                    }else{
                        return false;
                    }
            }else{
                return false;
            }
        }
    }
}


catch(PDOException $e){
    echo $e->getMessage();
}
?>

<?php
session_start();

//Connect to mySQL by testing for error
try {
    if(!empty($_POST)){
        
        $pwd = $_POST['pwd'];
        $nom = $_POST['login'];
        $conn = new PDO('mysql:dbname=projetstage;host=localhost', 'root', '');

        //Check if the password matches the name
        $q = array('nom'=>$nom, 'password'=>$pwd);
        $sql = 'SELECT id FROM tblusers WHERE nom = :nom AND password = :password';
        $req = $conn->prepare($sql);
        $req->execute($q);
        $count = $req->rowCount($sql);

        /*PDOstatement::rowCount() returns the number of rows affected by the last query
        DELETE, INSERT or UPDATE executed by the corresponding PDOstatement object. If there is more
        a row then the data of the fields used during the query are not on the
        same row and if there is 0 row it means that no data is located in the table. */
        if($count == 1){
            $cnx = new PDO('mysql:dbname=projetstage;host=localhost', 'root', '');
            //Check if the user is active
            $sql = 'SELECT id FROM tblusers WHERE nom = :nom AND password = :password';
            $req = $cnx->prepare($sql);
            $req->execute($q);
            $actif = $req->rowCount($sql);

            $donnees = $req->fetch();
            $req->closeCursor(); // Complete the processing of the request

            if($actif == 1){
                $_SESSION['id'] = $donnees['id'];
                /* If the name and password are good, we create the superglobal variable session 'id'
                which corresponds to an array containing the user name and password and is performed
                a redirect to the private.php page which is only accessible to registered users
                */
                header('Location: ./management');
                exit();
            }
            //If enable is not equal to 1 then active will be equal to 0 because there will be 0 rows that contain the requested values in the query
            else{
                $error_actif = 'Votre compte est inexistant !';
            }
        }
        else{
            //If unknown user
            $error_unknown = 'Utilisateur inexistant !';
        }
    }
}

catch(PDOException $e){
    echo $e->getMessage();
}
?>
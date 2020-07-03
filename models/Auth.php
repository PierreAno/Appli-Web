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

//Connexion à mySQL en testant la présence d'erreur
try {
    $cnx = new PDO('mysql:host=localhost;dbname=projetstage', 'root', '');
    if(!empty($_POST)){
        
        $pwd = $_POST['pwd'];
        $nom = addcslashes($_POST['login'], '%_');

        //Verifier si le mot de passe correspond bien au nom

        $sql = 'SELECT id FROM tblusers WHERE nom ='.$nom.' AND password = '.$pwd;
        $req = $cnx->prepare($sql);
        $req->execute();
        $count = $req->rowCount($sql);
        /*PDOStatement::rowCount() retourne le nombre de lignes affectées par la dernière requête
          DELETE, INSERT ou UPDATE exécutée par l'objet PDOStatement correspondant. S'il y a plus
          d'une ligne alors les données des champs utilisés lors de la requête ne sont pas sur la
          même ligne et s'il y a 0 ligne cela signifie qu'aucune donnée est située dans la table.*/
        if($count == 1){
            //Verifier si l'utilisateur est actif
            $sql = 'SELECT id FROM tblusers WHERE nom = :nom AND password = :password';
            $req = $cnx->prepare($sql);
            $req->execute($q);
            $actif = $req->rowCount($sql);

            $donnees = $req->fetch();
            $req->closeCursor(); // Termine le traitement de la requête


            if($actif == 1){
                $_SESSION['id'] = $donnees;
                /*Si le nom et le mot de passe sont bons on créé la variable superglobale session 'id'
                qui correspond à un tableau contenant l'nom de l'utilisateur et le mot de passe et on effectue
                une redirection vers la page private.php qui n'est accessible que pour les utilisateurs inscrits
                */
                header('Location:.backoffice/management');
                exit();
            }
            //Si activer n'est pas égal à 1 alors actif sera égale à 0 car il y aura 0 lignes qui contient les valeurs demandées dans la requète
            else{
                $error_actif = 'Votre compte n\'est pas actif ! Verifier vos mails pour activer votre compte !';
            }
        }
        else{
            //Si utilisateur inconnu
            $error_unknown = 'Utilisateur inexistant !';
        }
    }
}

catch(PDOException $e){
    echo $e->getMessage();
}
?>
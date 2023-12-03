<?php
 
namespace App\Controller;

use Yoop\AbstractController;

class HomeController extends AbstractController
{
    public function print() 
    {  
        $user = $this->getUser();
        if($user) {
            if($this->isSecretData($user->getUsername(),'3a527111aa1aff992')) {
                $flag = $this->getFlag();
            }
        }
        return $this->render('home', ['flag' => $flag??null]);
    }

    public function auth() 
    {
        // si authentifié on ne peut plus venir ici
        if($this->isAuthenticated()) return $this->redirectToRoute("/"); 
        return $this->render('auth');
    }

    public function authProcess() 
    {
        // si authentifié on ne peut plus venir ici
        if($this->isAuthenticated()) return $this->redirectToRoute("/"); 

        if(sizeof($_POST)) {
            // Pour éviter le bruteforce en attend 2 secondes par requete
            sleep(2);
            if(!empty($_POST['username']) && is_string($_POST['username']) &&
                !empty($_POST['password']) && is_string($_POST['password'])
            ) {
                $pdo =  $this->getRepository('User')->getPDO();
                $statement = $pdo->prepare(
                    'SELECT * FROM `user` WHERE `username`=? AND `password`=?'
                );
                $statement->execute([$_POST['username'], SHA1($_POST['password'])]);
                $statement->setFetchMode(\PDO::FETCH_CLASS, 'App\Entity\User');
                $user = $statement->fetch();
                if($user) {
                    $this->connectUser($user);
                    return $this->redirectToRoute("/"); 
                }
            }
        } 
        return $this->render('auth', ["error" => "Echec d'authentification."]);        
    }


    public function forgot_password() 
    {
        // si authentifié on ne peut plus venir ici
        if($this->isAuthenticated()) return $this->redirectToRoute("/"); 
        $error = null;
        $success = null;
        if(sizeof($_POST)) {
            if(!empty($_POST['username']) && is_string($_POST['username'])) {
                $pdo =  $this->getRepository('User')->getPDO();
                try {
                    $statement = $pdo->query("SELECT `email` FROM `user` WHERE `username`='".$_POST['username']."'");
                    $statement->setFetchMode(\PDO::FETCH_CLASS, 'App\Entity\User');
                    $user = $statement->fetch();
                    if($user) {
                        $success = "Un mail vous a été envoyé à l'adresse mail : ".$this->masquerEmail($user->getEmail());
                    } else {
                        $error = "Aucun compte n'a été trouvé avec cet identifiant";
                    }
                } catch(\PDOException $e) {
                    $error = $e->getMessage();
                }
            }
        } 

        return $this->render('forgot_password', ['error' => $error, 'success' => $success ]);
    }

    public function profil() 
    {
        // si non authentifié on redirige vers la page de connexion
        if(!$this->isAuthenticated()) return $this->redirectToRoute("/connexion"); 
        $user = $this->getUser();
        //$user = $this->getRepository('User')->findOneBy(["id" => (int) $_GET['id']]);
        return $this->render('profil', ["user" => $user]);
    }

    public function deconnect() 
    {
        unset($_SESSION["user"]);
        $this->redirectToRoute("/"); 
    }


    public function masquerEmail($email) {
        $emailParts = explode('@', $email);
        
        $username = $emailParts[0];
        $domain = $emailParts[1];
    
        $usernameParts = str_split($username);
        $domainParts = str_split($domain);
    
        $maskedUsername = $usernameParts[0] . str_repeat('*', max(0, count($usernameParts) - 2)) . end($usernameParts);
        $maskedDomain = $domainParts[0] . str_repeat('*', max(0, count($domainParts) - 2)) . end($domainParts);
        
        return $maskedUsername . '@' . $maskedDomain;
    }
    

}
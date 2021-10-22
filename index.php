<?php

// Secondo step con i nostri oggetti
/* 
Provate ad immaginare quali sono le classi necessarie per creare uno shop online.
Ad esempio, ci saranno sicuramente dei prodotti da acquistare e degli utenti che 
fanno shopping.
*/
//1) classi necessarie per creare uno shop online: A) User - B) Product 
//A) USER
class Users {
    public $name;
    public $id;   
    
    function __construct($_name) {
        $this->name = $_name;
    }
    function getName() {
        return $this->name;
    }
    function getId() {
        return $this->id;
    }
}
/*
Strutturare le classi gestendo l'ereditarietà dove necessario.
Ci potrebbero essere degli utenti premium che hanno diritto a degli sconti 
esclusivi,oppure diverse tipologie di prodotti. 
*/

$users1 = new Users('Antonio');
var_dump($users1);

class UserBasic{
    function __construct($_type, $_costSpedition) {
        $this->type = $_type;
        $this->costSpedition = $_costSpedition;
    }
    use Subscription;
}
$userBasicOne = new UserBasic('basic', true);
$userBasicOne->setCostSpedition();
echo $userBasicOne->getCostSpedition();

class UserPremium {
    function __construct($_type, $_costSpedition) {
        $this->type = $_type;
        $this->costSpedition = $_costSpedition;
    }
    use Subscription;
}
$userPremiumOne = new UserPremium('premium', false);
$userPremiumOne->setCostSpedition();
echo $userPremiumOne->getCostSpedition();

trait Subscription{
    public $type;
    public $costSpedition;

    
    function getType() {
        return $this->type;
    }
    
    function getCostSpedition() {
        return $this->costSpedition;
    }
    function setCostSpedition() {
        if($this->type === 'basic') {
            $this->costSpedition = 'paghi le spese';
        } else {
            $this->costSpedition = 'Non paghi le spese';
        }
    }

}

/*
//USER PREMIUM
class UserPremium extends Users {
    public $subscription;
    public $costSpedition;
    
    function __construct($_false, $_costSpedition) {
        $this->subscription = $_false;
        $this->costSpedition= $_costSpedition;
    }
    
    function getSubscription() {
        return $this->subscription;
    }

    function getCostSpedition() {
        return $this->costSpedition;
    }
    function setCostSpedition() {
        if($this->subscription == false) {
            $this->costSpedition = 'Le spese di spedizione si pagano perchè non sei utente Premium';
        } else {
            $this->costSpedition = 'Le spese di spedizione non sono incluse nel prezzo perchè sei un utente Basic';
        }
    }
}
var_dump($users1);
$userPremium = new UserPremium(false, true);
$userPremium->setCostSpedition();
echo $userPremium->getCostSpedition();
var_dump($userPremium);

*/
//FINE USER PREMIUM

// B) Product
class Products {
    public $id;
    public $price;
    public $description;
}



?>


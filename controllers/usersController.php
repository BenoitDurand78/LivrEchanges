<?php

require_once(__DIR__ . "/../models/inscription.php");

class UsersController
{

    public function inscriptionValidate(): array
    {
        $messages = [];

        if (isset($_POST["submit"])) {

            if (!isset($_POST["civility"]) || !in_array($_POST["civility"], ["Monsieur", "Madame"])) {
                $$messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer votre civilité."
                ];
            }
            if (!isset($_POST["surname"]) || strlen($_POST["surname"]) < 1) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer votre nom."
                ];
            }
            if (!isset($_POST["firstname"]) || strlen($_POST["firstname"]) < 1) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer votre prénom."
                ];
            }
            if (!isset($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer un email valide."
                ];
            }

            $uppercase = preg_match('@[A-Z]@', $_POST["password"]);
            $lowercase = preg_match('@[a-z]@', $_POST["password"]);
            $number = preg_match('@[0-9]@', $_POST["password"]);

            if (!isset($_POST["password"]) || !$uppercase || !$lowercase || !$number || strlen($_POST["password"]) < 8) {
                $messages[] = [
                    "success" => false,
                    "text" => "Votre mot de passe n'est pas valide. Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule et un chiffre."
                ];
            }
            if (!isset($_POST["passwordCheck"]) || ($_POST["passwordCheck"] != $_POST["password"])) {
                $messages[] = [
                    "success" => false,
                    "text" => "Les mots de passe ne correspondent pas."
                ];
            }

            $datetime_now = new DateTime();
            if (!isset($_POST["birthDate"]) || !DateTime::createFromFormat("Y-m-d", $_POST["birthDate"]) || ($_POST["birthDate"] > $datetime_now)) {
                $messages[] = [
                    "success" => false,
                    "text" => "La date de naissance est incorrecte."
                ];
            }

            if (!isset($_POST["streetName"]) || strlen($_POST["streetName"]) < 1) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer un numéro et un nom de rue."
                ];
            }

            if (!isset($_POST["city"]) || strlen($_POST["city"]) < 1) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer votre ville d'habitation."
                ];
            }

            $numberPostalCode = preg_match('@^[0-9]{5}$@', $_POST["postalCode"]);
            if (!isset($_POST["postalCode"]) || !$numberPostalCode) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer un code postal valide."
                ];
            }

            if (count($messages) == 0) {
                $messages[] = [
                    "success" => true,
                    "text" => "Votre compte a bien été créé"
                ];

                $surname = htmlspecialchars($_POST["surname"]);
                $firstname = htmlspecialchars($_POST["firstname"]);
                $email = htmlspecialchars($_POST["email"]);
                $birthDate = htmlspecialchars($_POST["birthDate"]);
                $streetName = htmlspecialchars($_POST["streetName"]);
                $city = htmlspecialchars($_POST["city"]);
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);


                User::create($_POST["civility"], $surname, $firstname, $email, $password, $birthDate, $streetName, $city, $_POST["postalCode"]);
            }
        }
        return $messages;
    }



    public function signIn(): array {

        $messages = [];

        if(isset($_POST["submit"])) {
            if(!isset($_POST["email"])) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer votre email de connexion."
                ];
            }
            if(!isset($_POST["password"])) {
                $messages[] = [
                    "success" => false,
                    "text" => "Veuillez indiquer votre mot de passe."
                ];
            }

            if(count($messages) == 0) {

                $user = User::readOneUser($_POST["email"]);
                if($user == false) {
                    $messages[] = [
                        "success" => false,
                        "text" => "Aucun utilisateur avec cet email trouvé."
                    ];
                } else {

                    if(!password_verify($_POST["password"], $user->password)) {
                        $messages[] = [
                            "success" => false,
                            "text" => "Mot de passe incorrect."
                        ]; 
                    } else {
                        $messages[] = [
                            "success" => true,
                            "text" => "Vous êtes désormais connecté."
                        ];

                        $_SESSION["firstname"] = $user->firstname;

                        header("Location: /index.php");
                    }
                }
            }
        }

        return $messages;
    }
}

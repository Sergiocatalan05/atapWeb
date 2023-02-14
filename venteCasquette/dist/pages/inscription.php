<?php
require_once("../bd/fonctions.php");
$pseaudo = filter_input(INPUT_POST, "pseaudo");
$email =  filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$mdp = filter_input(INPUT_POST, "mdp", FILTER_SANITIZE_SPECIAL_CHARS);
$mdp2 = filter_input(INPUT_POST, "mdp2", FILTER_SANITIZE_SPECIAL_CHARS);
$submit = filter_input(INPUT_POST, "envoyer",);
$err = "";
$mdpHashed = "";
$utilisateurs = lireTousLesUtils();
if (isset($submit)) {
    if ($email != "" && $mdp != "" && $pseaudo != "" && $mdp2 != "") {
        
        if ($mdp == $mdp2) {
            $options = [
                'cost' => 10,
            ];
            $mdpHashed = password_hash($mdp, PASSWORD_BCRYPT, $options);
            ajouterUtil($pseaudo, $email, $mdpHashed);
            header("location: ../index.php");
            exit;
        }
        $err="Les mots de passe ne sont pas indentique";
    } else {
        $err = "L'un des trois champs demandé est vide.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <form action="#" method="post">
                    <label>Pseaudo</label><input type="text" name="pseaudo">
                    <br>
                    <label>Email</label><input type="email" name="email">
                    <br>
                    <label> Mots de passe</label><input type="password" name="mdp"><br>
                    <label> Ecrivez une deuxieme fois votre mots de passe</label><input type="password" name="mdp2">
                    <input type="submit" name="envoyer">
                    <p> <?= $err ?></p>
                </form>
            </div>
        </div>
    </header>

</body>

</html>
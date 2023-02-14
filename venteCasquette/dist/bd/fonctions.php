<?php
/**
 * Description : Affiche, modifier et supprime des éléments d'une base de donnée
 * Auteur: Sergio Catalan
 * Version : V1
 * Date: 14.02.2022
 */

require_once("database.php");

/**
 * retourne toute la table monstre
 *
 * @return array Tableau avec les monstres trouvés
 */
function lireTousLesUtils()
{
    $sql = "SELECT idUtil ,nomUtil, email, mdp
             FROM util";
    $param = [];
    $statement = dbRun($sql, $param);
    return $statement->fetchAll(PDO::FETCH_OBJ);
}

/**
 * retourne un seul monstre selon l'id
 *
 * @param int $id
 * @return object Tableau d'un monstre
 */
function lireMonstreId($id)
{
    $sql = "SELECT id, nom, gentil, nbDents
              FROM monstres
             WHERE id = ?";
    $param = [
        $id
    ];
    $statement = dbRun($sql, $param);
    return $statement->fetch(PDO::FETCH_OBJ);
}


/**
 * Ajoute un utilisateur dans la base de donnée 
 *
 * @param string $nom
 * @param int $email
 * @param int $mdp
 * @return void
 */
function ajouterUtil($nom,$email,$mdp)
{        

    $sql = "INSERT INTO util(nomUtil,email,mdp)
            VALUES (?,?,? )";
    $param = [
        $nom,
        $email,
        $mdp
    ];
    $statement = dbRun($sql, $param);
    return $statement;
}

/**
 * Efface un élément de la base de donné selon l'id
 *
 * @param int $id
 * @return void
 */
function effacerMonstre($id)
{
    $sql = "DELETE FROM monstres WHERE id=?";
    $param = [
        $id
    ];
    $statement = dbRun($sql, $param);
    return $statement;
}


/**
 * Modifier un élément avec les donné de l'utilisateur selon l'id
 *
 * @param string $nom
 * @param int $gentil
 * @param int $nbDents
 * @param int $id
 * @return void
 */
function modifierMonstre($nom,$gentil,$nbDents,$id)
{
    $sql = "UPDATE monstres SET nom = ?, gentil = ? , nbDents = ? WHERE id = ?";
    $param = [
        $nom,
        $gentil,
        $nbDents,
        $id
    ];
    $statement = dbRun($sql, $param);
    return $statement;
}

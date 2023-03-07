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
function lireId()
{
    $sql = "SELECT idPost 
    FROM post
    ORDER BY idPost DESC
    LIMIT 1";
    $param = [      
    ];
    $statement = dbRun($sql, $param);
    return $statement->fetch(PDO::FETCH_OBJ);
}

function ajouterUnePublication($nom)
{

    $sql = "INSERT INTO post(commentaire)
            VALUES (?)";
    $param = [
        $nom,
    ];
    $statement = dbRun($sql, $param);
    return $statement;
}
function ajouterUneImage($type,$nom,$id)
{
    $sql = "INSERT INTO media(TypeMedia, nomFichierMedia,idPost)
            VALUES (?,?,?)";
    $param = [
        $type,
        $nom,
        $id
    ];
    $statement = dbRun($sql, $param);
    return $statement;
}


function afficherTousLesPosts()
{

    $sql = "SELECT * from produits";
    $param = [];
    $statement = dbRun($sql, $param);
    return $statement->fetchAll(PDO::FETCH_OBJ);
}


function afficherLesImagesParId($idPost)
{

    $sql = "SELECT * from produits where idProduit = ?";
    $param = [
        $idPost,
    ];
    $statement = dbRun($sql, $param);
    return $statement->fetchAll(PDO::FETCH_OBJ);
}
function afficherLeProduitParId($idPost)
{

    $sql = "SELECT * from produits where idProduit = ?";
    $param = [
        $idPost,
    ];
    $statement = dbRun($sql, $param);
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function SelectProductLike($search){
    $sql = "SELECT * FROM produits WHERE nomProduit LIKE ?";
    $param = [
        "%$search%",        
    ];

    return dbRun($sql, $param)->fetchAll(PDO::FETCH_OBJ);
}

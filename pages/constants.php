<?php
/** @file /pages/constants.php
 *
 * File that defines all the website constants
 *
 * @author SAE S3 NetKart
 */

/**
 * Images directory link constant
 * @const K_IMAGE
 */
define('K_IMAGE','../assets/image/');

/**
 * Styles directory link constant
 * @const K_STYLE
 */
define('K_STYLE','../assets/style/');

/**
 * Scripts javaScript directory link constant
 * @const K_SCRIPT
 */
define('K_SCRIPT','../assets/script/');

/**
 * Maximal number questions constant
 * @const K_MAX_QUESTIONS
 */
define('K_MAX_QUESTIONS', 3);

/**
 * Maximal number images per questions constant
 * @const K_MAX_IMAGES
 */
define('K_MAX_IMAGES', 3);

/**
 * Constante du nom de la table des Circuits en base de donnée
 * @const K_DB_CIRCUIT
 */
define('K_DB_CIRCUIT', 'Circuit');

/**
 * Constante du nom de la table des Checkpoints dans les circuits en base de donnée
 * @const K_DB_CIRCUIT_CHECKPOINT
 */
define('K_DB_CIRCUIT_CHECKPOINT', 'Circuit_Checkpoint');

/**
 * Constante du nom de la table des Images de circuits en base de donnée
 * @const K_DB_CIRCUIT_IMAGE
 */
define('K_DB_CIRCUIT_IMAGE', 'Circuit_Image');

/**
 * Constante du nom de la table des Groupes en base de donnée
 * @const K_DB_GROUPE
 */
define('K_DB_GROUPE', 'Groupe');

/**
 * Constante du nom de la table des pseudonymes des joueurs du groupe en base de donnée
 * @const K_DB_GROUPE_JOUEUR
 */
define('K_DB_GROUPE_JOUEUR', 'Groupe_Joueur');

/**
 * Constante du nom de la table des Joueurs en base de donnée
 * @const K_DB_JOUEUR
 */
define('K_DB_JOUEUR', 'Joueur');

/**
 * Constante du nom de la table des Questions en base de donnée
 * @const K_DB_QUESTION
 */
define('K_DB_QUESTION', 'Question');

/**
 * Constante du nom de la table des Images des questions en base de donnée
 * @const K_DB_QUESTION_IMAGE
 */
define('K_DB_QUESTION_IMAGE', 'Question_Image');

/**
 * Constante du nom de la table des Liens des questions en base de donnée
 * @const K_DB_QUESTION_LIEN
 */
define('K_DB_QUESTION_LIEN', 'Question_Lien');

/**
 * Constante du nom de la table des Themes en base de donnée
 * @const K_DB_THEME
 */
define('K_DB_THEME', 'Theme');
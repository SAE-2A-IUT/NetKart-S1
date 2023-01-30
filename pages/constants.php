<?php
/** @file /pages/constants.php
 *
 *  @details File that defines all the website constants
 *
 * @author SAE S3 NetKart
 */

/**
 * Images directory link constant
 *
 * @const K_IMAGE (String)
 */
define('K_IMAGE','../assets/image/');

/**
 * Styles directory link constant
 * @const K_STYLE (String)
 */
define('K_STYLE','../assets/style/');

/**
 * Scripts javaScript directory link constant
 * @const K_SCRIPT (String)
 */
define('K_SCRIPT','../assets/script/');

/**
 * Maximal number questions constant
 * @const K_MAX_QUESTIONS (Int)
 */
define('K_MAX_QUESTIONS', 3);

/**
 * Maximal number images per questions constant
 * @const K_MAX_IMAGES (Int)
 */
define('K_MAX_IMAGES', 3);

/**
 * DB Circuit table name constant
 * @const K_DB_CIRCUIT (String)
 */
define('K_DB_CIRCUIT', 'Circuit');

/**
 * DB Circuit checkpoint table name constant
 * @const K_DB_CIRCUIT_CHECKPOINT (String)
 */
define('K_DB_CIRCUIT_CHECKPOINT', 'Circuit_Checkpoint');

/**
 * DB Circuit name table name constant
 * @const K_DB_CIRCUIT_IMAGE
 */
define('K_DB_CIRCUIT_IMAGE', 'Circuit_Image');

/**
 * DB Group table name constant
 * @const K_DB_GROUPE
 */
define('K_DB_GROUPE', 'Groupe');

/**
 * DB Player name associated to group table name constant
 * @const K_DB_GROUPE_JOUEUR
 */
define('K_DB_GROUPE_JOUEUR', 'Groupe_Joueur');

/**
 * DB Player table name constant
 * @const K_DB_JOUEUR
 */
define('K_DB_JOUEUR', 'Joueur');

/**
 * DB Question table name constant
 * @const K_DB_QUESTION
 */
define('K_DB_QUESTION', 'Question');

/**
 * DB Question image table name constant
 * @const K_DB_QUESTION_IMAGE
 */
define('K_DB_QUESTION_IMAGE', 'Question_Image');

/**
 * DB Question Link table name constant
 * @const K_DB_QUESTION_LIEN
 */
define('K_DB_QUESTION_LIEN', 'Question_Lien');

/**
 * DB Theme table name constant
 * @const K_DB_THEME
 */
define('K_DB_THEME', 'Theme');
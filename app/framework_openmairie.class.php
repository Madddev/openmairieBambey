<?php
/**
 * Ce fichier est destine a permettre la surcharge de certaines methodes de
 * la classe om_application pour des besoins specifiques de l'application
 *
 * @package framework_openmairie
 * @version SVN : $Id: framework_openmairie.class.php 4348 2018-07-20 16:49:26Z softime $
 */

/**
 *
 */
if (file_exists("../dyn/locales.inc.php") === true) {
    require_once "../dyn/locales.inc.php";
}

/**
 * Définition de la constante représentant le chemin d'accès au framework
 */
define("PATH_OPENMAIRIE", getcwd()."/../core/");

/**
 * Dépendances PHP du framework
 * On modifie la valeur de la directive de configuration include_path en
 * fonction pour y ajouter les chemins vers les librairies dont le framework
 * dépend.
 */
set_include_path(
    get_include_path().PATH_SEPARATOR.implode(
        PATH_SEPARATOR,
        array(
            getcwd()."/../php/pear",
            getcwd()."/../php/db",
            getcwd()."/../php/fpdf",
            getcwd()."/../php/phpmailer",
            getcwd()."/../php/tcpdf",
        )
    )
);

/**
 *
 */
if (file_exists("../dyn/debug.inc.php") === true) {
    require_once "../dyn/debug.inc.php";
}

/**
 *
 */
require_once PATH_OPENMAIRIE."om_application.class.php";

/**
 *
 */
class framework_openmairie extends application {

    /**
     * Cette variable est un marqueur permettant d'indiquer si nous sommes
     * en mode développement du framework ou non.
     * @var boolean
     */
    protected $_framework_development_mode = true;

    /**
     * Gestion du nom de l'application.
     *
     * @var mixed Configuration niveau application.
     */
    protected $_application_name = "Framework openMairie";

    /**
     * Titre HTML.
     *
     * @var mixed Configuration niveau application.
     */
    protected $html_head_title = ":: openMairie :: Framework";

    /**
     *
     * @return void
     */
    function setDefaultValues() {
        $this->addHTMLHeadCss(
            array(
                "../lib/om-theme/jquery-ui-theme/jquery-ui.custom.css",
                "../lib/om-theme/om.css",
            ),
            21
        );
    }
}

<?php
/**
 * Spearhead softwares Google Plus Module
 * 
 * @package Spearhead softwares. 
 * @subpackage Modules
 * @link http://www.spearheadsoftwares.com
 * @license GNU/GPL, see http://www.gnu.org/copyleft/gpl.html
 * mod_spearheadgoogleplus is free software.
 * This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */


//no direct access
defined('_JEXEC') or die('Restricted Access');

//include helper files
require_once(dirname(__FILE__).DS.'helper.php');

$gPlusOneButton = modSpearheadGooglePlusHelper::getGooglePlusOne($params);
$script = modSpearheadGooglePlusHelper::getGooglePlusOneJs($params);
echo "<pre>";
print_r($gPlusOneButton);
print_r($script);
echo "</pre>";
//$style = modSpearheadGooglePlusHelper::getStyle($params);
//$copyRight = modSpearheadGooglePlusHelper::copyRight();
require(JModuleHelper::getLayoutPath('mod_spearheadgoogleplus'));
?>

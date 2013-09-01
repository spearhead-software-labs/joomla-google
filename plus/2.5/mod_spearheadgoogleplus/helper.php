<?php
/**
 * Spearhead softwares Google Plus Module for Joomla 2.5, Joomla 1.7 & Joomla 1.5
 * 
 * @package Spearhead softwares. 
 * @subpackage Modules
 * @link http://www.spearheadsoftwares.com
 * @license GNU/GPL, see http://www.gnu.org/copyleft/gpl.html
 * mod_spearheadfacebooklike is free software.
 * This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

class modSpearheadGooglePlusHelper
{
	/**
	 * Helper class for Joomla Google Plus module
	 * 
	 * @param array $params Variable holding all the parameters of the module helper object 
	 * @access public
	 */
	
	public $gLikeLinkBase = 'https://apis.google.com/js/plusone.js';
	
	/**
	 * @name getGooglePlusOne
	 * @tutorial Calculates and outputs the google plus button code
	 * @param array $params Variable holding all the parameters of the module helper object 
	 * @access public
	 */	
	public function getGooglePlusOne($params)
	{
		
		$dataSize = $params->get('data-size','');
		//saving markup
		if($dataSize != '')
		{
			$dataSize = 'data-size="'.$dataSize.'"';
		}
			
		$dataAnnotation = $params->get('data-annotation','inline');
		//saving markup
		if($dataAnnotation !='')
		{
			$dataAnnotation = 'data-annotation="'.$dataAnnotation.'"';
		}
		
		$dataWidth = $params->get('data-width',300);
		$dataWidth = 'data-width="'.$dataWidth.'"';
		
		$dataCallback = $params->get('data-callback','');
		if($dataCallback != '')
		{
			$dataCallback = 'data-callback="'.$dataCallback.'"';
		}
		
		$dataHref = $params->get('data-href','');
		if($dataHref != '')
		{
			$dataHref = 'data-href="'.$dataHref.'"';
		}		
		
		
		$plusOneButton = '<div class="g-plusone" '.$dataSize.' '.$dataAnnotation.' '.$dataWidth.' '.$dataCallback.' '.$dataHref.'></div>';
		return $plusOneButton; 
		

	}
	
	
	/**
	 * @name getGooglePlusOneJs
	 * @tutorial Calculates and outputs the google plus api include js scripts
	 * @param array $params Variable holding all the parameters of the module helper object
	 * @access public
	 */
	public function getGooglePlusOneJs($params)
	{
			$asynchronous = $params->get('asynchronous');
			$parseTags = $params->get('parsetags');
			$script = array();
			if($asynchronous == 1 && $parseTags=='')
			{
				$script['script'] = "(function() {
							    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
							    po.src = 'https://apis.google.com/js/plusone.js';
							    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
							  })();";
				$script['position'] = "#</body>";
				$script['src'] = '';
				
			}
			
			if($asynchronous == '' && $parseTags =='')
			{
				$script['src'] = 'https://apis.google.com/js/plusone.js';
				$script['position'] = "#</body>";
				
			}
			
			if($parseTags == 'explicit')
			{
				$script['src'] = 'https://apis.google.com/js/plusone.js';
				$script['position'] = "#</body>";
				$script['script'] = "{parsetags: 'explicit'};gapi.plusone.go();";
			}
			return $script;
	}	
	
  /**
    * @name getStyle
    * @tutorial Sets the style parameters to outer div based on joomla settings are returned
    * @param array $params Variable holding all the parameters of the module helper object
    * @access public
    */
    public function getStyle($params)
    {
    $pos = $params->get('positioning','static');
		$floater = $params->get('floating','none');
		$top = $params->get('top');
		$left = $params->get('left');	
    $width = $params->get('width');
    $height = $params->get('height');
    
    $style = 'style="border:none;';
    if($width){
    $style = $style.' width:'.$width.'px;';
    }
    if($height){
    $style = $style.' height:'.$height.'px;';
    }
    if($top){
    $style = $style.' top:'.$top.'px;';
    }
    if($left){
    $style = $style.' left:'.$left.'px;';
    }
    if($floater){
    $style = $style.' float:'.$floater.';';
    }
    if($pos){
    $style = $style.' position:'.$pos.';';
    }
    $style = $style.'"';
    return $style;
    }
  
	/**
	 * @name autoDiscovery
	 * @tutorial Calculates the current url both sef and non sef urls based on joomla settings are returned
	 * @access public
	 */	
	public function autoDiscovery()
	{
		$uri = &JURI::getInstance();
		return urlencode($uri->toString());
	}
	
	/**
	* @name generateOgTags
	* @tutorial Generate Open Graph(Og) meta tags for use in facebook like button.
	* @param Array $ogArray
	* @return String $meta Og meta tags.
	* @access public
	*/
	public function generateOgTags($ogArray)
	{
		$meta = null;
		foreach($ogArray as $ogType=>$content)
		{
			$meta .= '<meta property="og:'.$ogType.'" content="'.$content.'" />'."\n";
		}
		return $meta;
	}	
	
	public function copyRight()
	{
		return '<div style="display:none"><a href="http://www.spearheadsoftwares.com/products-downloads/facebook-like-joomla">Powered by Spearhead Softwares Joomla Facebook Like Button </a></div>';
	}	
}


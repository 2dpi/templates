<?php
/*------------------------------------------------------------------------
# author    your name or company
# copyright Copyright �� 2011 example.com. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.example.com
-------------------------------------------------------------------------*/
// no direct access
defined('_JEXEC') or die('Restricted access');

//////////////////
// CSS - HEADER //
//////////////////
$isCustomHeaderCss  = is_array($templateparams->get('layout_header_custom_list')) && in_array($itemid, $templateparams->get('layout_header_custom_list')) ? 1 : 0;
$headerLayoutCss    =($isCustomHeaderCss == 1 ? $templateparams->get('layout_header_custom') : $templateparams->get('layout_header_default'));
$doc->addStyleSheet(JURI::base(true).'templates/'.$this->template.'/css/skeleton/head/'.$isMobileFolder.$headerLayoutCss.'.css','text/css',"screen, projection"); 

////////////////
// CSS - BODY //
////////////////
$isCustomTrunkCss  = is_array($templateparams->get('layout_content_custom_list')) && in_array($itemid, $templateparams->get('layout_content_custom_list')) ? 1 : 0;
$trunkLayoutCss    =($isCustomHeaderCss == 1 ? $templateparams->get('layout_content_custom') : $templateparams->get('layout_content_default'));
$doc->addStyleSheet(JURI::base(true).'templates/'.$this->template.'/css/skeleton/trunk/'.$isMobileFolder.$trunkLayoutCss.'.css','text/css',"screen, projection"); 

//////////////////
// CSS - FOOTER //
//////////////////
$isCustomFooterCss  = is_array($templateparams->get('layout_footer_custom_list')) && in_array($itemid, $templateparams->get('layout_footer_custom_list')) ? 1 : 0;
$footerLayoutCss    =($isCustomHeaderCss == 1 ? $templateparams->get('layout_footer_custom') : $templateparams->get('layout_footer_default'));
$doc->addStyleSheet(JURI::base(true).'templates/'.$this->template.'/css/skeleton/foot/'.$isMobileFolder.$footerLayoutCss.'.css','text/css',"screen, projection"); 

// CSS >> BASE
if(!is_null($templateparams->get('css_base')) || ($templateparams->get('css_base') != '-1')) {
foreach ($templateparams->get('css_base') as $css_base ) { // template default styles
$doc->addStyleSheet(JURI::root( true ).'templates/'.$this->template.'/css/content/'.$css_base,'text/css',"screen, projection");
}
}

// CSS >> MENUS
if(!is_null($templateparams->get('css_menu_layout')) && !in_array("-1", $templateparams->get('css_menu_layout'))) {
foreach ($templateparams->get('css_menu_layout') as $css_menu ) { // template menu styles
$doc->addStyleSheet(JURI::root( true ).'templates/'.$this->template.'/css/menu/'.$css_menu,'text/css',"screen, projection");
}
}

// CSS >> CONTENT STYLES
if(!is_null($templateparams->get('css_content_styles')) && !in_array("-1", $templateparams->get('css_content_styles'))) {
foreach ($templateparams->get('css_content_styles') as $css_content ) { // template menu styles
$doc->addStyleSheet(JURI::root( true ).'templates/'.$this->template.'/css/content/'.$css_content,'text/css',"screen, projection");
}
}

// CSS >> SYSTEM
if(!is_null($templateparams->get('css_system')) && !in_array("-1", $templateparams->get('css_system'))) {
foreach ( $templateparams->get('css_system') as $css_system ) { // template system styles
 	 $doc->addStyleSheet(JURI::root( true ).'templates/'.$this->template.'/css/system/'.$css_system,'text/css',"screen, projection");
}
}

// CSS >> RESPONSIVE - (add switch based on viewport)
if(!is_null($templateparams->get('css_layout_responsive')) && !in_array("-1", $templateparams->get('css_layout_responsive'))) {
foreach ($templateparams->get('css_layout_responsive') as $css_responsive ) { // template responsive styles
 	 $doc->addStyleSheet(JURI::root( true ).'templates/'.$this->template.'/css/responsive/'.$css_responsive,'text/css',"screen, projection");
}
}

// CSS >> CUSTOM CSS EXCLUSION
if ($templateparams->get('css_excludes_custom') != '') {
$styleHandling = explode(";",$templateparams->get('css_excludes_custom'));
foreach ($styleHandling as $key => $styleList) {
   $styleInfo = explode("[:]",$styleList);
   $styleFile = array_shift($styleInfo);
   $styleItemids = join('[:]', $styleInfo);
   $styleItemids = explode(',', $styleItemids);
       if (in_array($itemid, $styleItemids)) {
       	unset($this->_styleSheets[$this->baseurl . $styleFile]);
       } else {
       	unset($this->_styleSheets[$styleFile]);
       }
}
}

// CSS >> CUSTOM FONTS - GOOGLE
/*
* ADDED AFTER COMBINE AS THEY CAN'T BE ADDED TO COMBINE SCRIPT
*/
if(!is_null($templateparams->get('google_font'))){
$doc->addStyleSheet($templateparams->get('google_font'),'text/css',"screen, projection");
}
if(!is_null($templateparams->get('google_font_2'))){
$doc->addStyleSheet($templateparams->get('google_font_2'),'text/css',"screen, projection");
}
if(!is_null($templateparams->get('google_font_3'))){
$doc->addStyleSheet($templateparams->get('google_font_3'),'text/css',"screen, projection");
}

// CSS >> CUSTOM CSS INCLUSION
/*
* ADDED AFTER COMBINE TO AVOID CACHING ISSUES
*/
if ($templateparams->get('css_includes_custom') != '') {
$styleHandling = explode(";",$templateparams->get('css_includes_custom'));
foreach ($styleHandling as $key => $styleList) {
   $styleInfo = explode(":",$styleList);
   $styleFile = array_shift($styleInfo);
   $styleItemids = join(':', $styleInfo);
   $styleItemids = explode(',', $styleItemids);
       if (in_array($itemid, $styleItemids)) {
           $doc->addStyleSheet(JURI::base(true).$styleFile);
       }
}
}


// CSS >> REMOTE FILES
/*
* ADDED AFTER COMBINE AS THEY CAN'T BE ADDED TO COMBINE SCRIPT
*/
if(!in_array('none',$templateparams->get('css_remote'))) {
foreach ( $templateparams->get('css_remote') as $remotestyle ) {
$doc->addStyleSheet($remotestyle);
}
}
// CSS >> IE SPECIFIC
/*
* ADDED AFTER COMBINE TO AVOID CACHING ISSUES
*/
if($client->browser == JWebClient::IE && ($client->browserVersion <= '9.0')){ // template conditional styles
if(!is_null($templateparams->get('css_ie_only')) && !in_array("-1", $templateparams->get('css_ie_only'))) {
foreach ($templateparams->get('css_ie_only') as $style_ie ) {
$doc->addStyleSheet(JURI::root( true ).'templates/'.$this->template.'/css/ie_specific/'.$style_ie,'text/css',"screen, projection");
}
}
}
// CSS >> PRINT CSS
/*
* ADDED AFTER COMBINE TO AVOID CACHING ISSUES
*/
$doc->addStyleSheet($this->baseurl.'templates/'.$this->template.'/css/content/print.css','text/css',"print");
?>
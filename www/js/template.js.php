<?php
/*------------------------------------------------------------------------
# author    your name or company
# copyright Copyright © 2011 example.com. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.example.com
-------------------------------------------------------------------------*/
// no direct access
defined('_JEXEC') or die('Restricted access');
// JS >> UNSET CORE
if(!is_null($templateparams->get('js_excludes_core')) && $templateparams->get('js_excludes_core') != '-1') { // script unset core
	foreach ($templateparams->get('js_excludes_core') as $noscript ) {
		unset($this->_scripts[$this->baseurl .'/media/system/js/'.$noscript]);
	}
}
// JS >> INCLUDE TEMPLATE SPECIFIC
if(!in_array("-1", $templateparams->get('js_includes_template'))) {
	foreach ($templateparams->get('js_includes_template') as $script_template ) {
	$doc->addScript(JURI::base(true).'/templates/'.$this->template.'/js/template/'.$script_template);
	}
}
// JS >> PRETTY PRING SYNTAX HIGHLIGHTING DECLARATION
if (!is_null($templateparams->get('js_includes_template')) && in_array("prettify.js",$templateparams->get('js_includes_template'))) {
	$doc->addScriptDeclaration('jQuery(function($) { $(".documentation pre").addClass("prettyprint linenums"); prettyPrint(); });');
}

// JS >> UNSET CUSTOM
$scriptUnsetHandling = explode(";",$templateparams->get('js_excludes'));
foreach ($scriptUnsetHandling as $key => $scriptUnsetList) {
    $scriptUnsetInfo = explode("[:]",$scriptUnsetList);
    $scriptUnsetFile = array_shift($scriptUnsetInfo);
    $scriptUnsetItemids = join('[:]', $scriptUnsetInfo);
    $scriptUnsetItemids = explode(',', $scriptUnsetItemids);
        if (in_array($itemid, $scriptUnsetItemids)) {
            unset($this->_scripts[$scriptUnsetFile]);
        }
}
// JS >> CUSTOM DECLARATION
/*
 * ADDED AFTER COMBINE TO AVOID CACHING ISSUES
 */
if ($templateparams->get('js_includes_declaration') != '') {
	$scriptDeclarationHandling = explode("[|]",$templateparams->get('js_includes_declaration'));
	foreach ($scriptDeclarationHandling as $key => $scriptDeclarationList) {
	    $scriptDeclarationInfo = explode("[~]",$scriptDeclarationList);
	    $scriptDeclarationFile = array_shift($scriptDeclarationInfo);
	    $scriptDeclarationItemids = join('[~]', $scriptDeclarationInfo);
	    $scriptDeclarationItemids = explode(',', $scriptDeclarationItemids);
	        if (in_array($itemid, $scriptDeclarationItemids)) {
	            $doc->addScriptDeclaration($scriptDeclarationFile);
	        }
	}
}
// JS >> CUSTOM SCRIPT INCLUSION
if ($templateparams->get('js_includes_custom') != '') {
	$scriptHandling = explode(";",$templateparams->get('js_includes_custom'));
	foreach ($scriptHandling as $key => $scriptList) {
	    $scriptInfo = explode(":",$scriptList);
	    $scriptFile = array_shift($scriptInfo);
	    $scriptItemids = join(':', $scriptInfo);
	    $scriptItemids = explode(',', $scriptItemids);
	        if (in_array($itemid, $scriptItemids)) {
	            $doc->addScript(JURI::base(true).$scriptFile);
	        }
	}
}
// JS >> REMOTE SCRIPTS
/*
 * ADDED AFTER COMBINE AS THEY CAN'T BE ADDED TO COMBINE SCRIPT
 */
if(!in_array('none',$templateparams->get('js_includes_remote'))) {
	foreach ($templateparams->get('js_includes_remote') as $remotescript ) {
	$doc->addScript($remotescript);
	}
}
// JS >> IE SPECIFIC SCRIPTS
/*
 * ADDED AFTER COMBINE TO AVOID CACHING ISSUES
 */
if(($client->browser == JWebClient::IE) && ($client->browserVersion <= '9.0')) {
	// script ie specific - DO NOT INCLUDE IN COMPRESS
	if (!in_array("-1", $templateparams->get('js_includes_ie'))){
	foreach ( $templateparams->get('js_includes_ie') as $script_ie_specific ) {
			$doc->addScript(JURI::base(true).'/templates/'.$this->template.'/js/ie_specific/'.$script_ie_specific);
		}
	}
}
// JS >> REMOVE CAPTION CODE (REMEMBER TO UNSET - /media/system/js/caption.js)
/*
 * ADDED AFTER COMBINE TO AVOID CACHING ISSUES
 * http://joomlavisually.com/tips/48-tips-and-tricks/5586-remove-jcaption-code.html
 * http://www.htmlescape.net/stringescape_tool.html
 */
//$this->_script = preg_replace('%window\.addEvent\(\'load\',\s*function\(\)\s*{\s*new\s*JCaption\(\'img.caption\'\);\s*}\);\s*%', '', $this->_script);
if (isset($this->_script['text/javascript']))
{
    $this->_script['text/javascript'] = preg_replace('%window\.addEvent\(\'load\',\s*function\(\)\s*{\s*new\s*JCaption\(\'img.caption\'\);\s*}\);\s*%', '', $this->_script['text/javascript']);
    //$this->_script['text/javascript'] = preg_replace('window.addEvent(\'domready\', function() {\n\n\t\t\tSqueezeBox.initialize({});\n\t\t\tSqueezeBox.assign($$(\'a.modal-button\'), {\n\t\t\t\tparse: \'rel\'\n\t\t\t});\n\t\t});', '', $this->_script['text/javascript']);
    if (empty($this->_script['text/javascript']))
        unset($this->_script['text/javascript']);
}
//$doc->addScriptDeclaration('$.noConflict();');
//unset (JFactory::getDocument()->_scripts['/media/system/js/mootools-core.js']);
//unset (JFactory::getDocument()->_scripts['/media/system/js/mootools-more.js']);
?>


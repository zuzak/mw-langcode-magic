<?php

$wgExtensionCredits['variable'][] = array(
	'author' => 'Douglas Gardner',
	'description' => 'Adds a {{CURRENTLANG}} magic word for the currently used language code',
	'name' => 'Language Code Magic Word',
	'path' => __FILE__,
	'url' => '//chippy.ch',
  'descriptionmsg' => 'currentlang-desc',
  'license-name' => 'ISC',
  'version' => '0.0.2',
);

$wgExtensionMessagesFiles['LanguageCodeMagicWord'] = dirname( __FILE__ ) . '/LanguageCodeMagicWord.i18n.php';

$wgHooks['ParserGetVariableValueSwitch'][] = 'wfLcmwAssignAValue';

function wfLcmwAssignAValue( &$parser, &$cache, &$magicWordId, &$ret ) {
  if ( 'currentlang' == $magicWordId ) {
    $ret = $parser->getOptions()->getUserLangObj()->getCode();
  }
  return true;
}

$wgHooks['MagicWordwgVariableIDs'][] = 'wfLcmwDeclareVarIds';
function wfLcmwDeclareVarIds( &$customVariableIds ) {
  $customVariableIds[] = 'currentlang';
  return true;
}

?>

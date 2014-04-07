<?php

$wgExtensionCredits['variable'][] = array(
	'path' => __FILE__,
	'name' => 'Language Code Magic Word',
	'author' => 'Douglas Gardner',
	'url' => '//chippy.ch',
	'description' => 'Adds a magic word for the currently used language code',
	'version' => '0.0.1'
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

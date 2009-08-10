<?php
defined('_JEXEC') or die('Restricted access');
function isPresentJoomlaUser($id)
{
	$db = JFactory::getDBO();
	$query = 'SELECT id FROM ' . '#__campioni_richieste' . ' WHERE id_utente = ' . $db->Quote($id);
	$db->setQuery($query, 0, 1);
	$result = $db->loadResult();
	if ( !empty($result) )  {
		return true;
	} else {
		return false;
	}
}
$user = JApplication::getUser();
if ( isPresentJoomlaUser($user->id)) {
	$link = JRoute::_('index.php?option=com_campioni&task=writeComment');
	echo '<a href="' . $link . '">Rilascia un commento</a>';
} else {
	echo 'Richiedi un campione gratuito';
}
?>
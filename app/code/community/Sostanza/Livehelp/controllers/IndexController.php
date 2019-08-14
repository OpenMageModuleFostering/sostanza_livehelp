<?php

class Sostanza_Livehelp_IndexController extends Mage_Core_Controller_Front_Action
{
 public function getcartlhinfoAction()
    {
	$session_id = Mage::getSingleton("core/session")->getEncryptedSessionId(); // get our session		
			$MAGENTOcart=Mage::getUrl( 'checkout/cart/', array(
			'_secure'=>true,
			'_query' => array('SID' => $session_id ), //make sure we append our session
			'_store_to_url' => true ) ); // lastly add store to our url if needed
		echo $MAGENTOcart;
		
    }
     
}
?>
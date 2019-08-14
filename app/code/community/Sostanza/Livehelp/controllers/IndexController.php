<?php

class Sostanza_Livehelp_IndexController extends Mage_Core_Controller_Front_Action
{
 public function getcartlhinfoAction()
    {
    		
	if(isset($_GET["LH_SID"]))
	{		
		
		$MAGENTOcart=Mage::getUrl( 'checkout/cart/', array(
			'_secure'=>true,
			'_query' => array('SID' => $_GET["LH_SID"]), //make sure we append our session
			'_store_to_url' => true ) ); // lastly add store to our url if needed
			
			
			$cookieName="frontend";
			$cookieVal=$_GET["LH_SID"];
			
				
			$cookie = Mage::getSingleton('core/cookie');	
			$cookie->set($cookieName, $cookieVal);
			
		
		$this->_redirectUrl($MAGENTOcart);
	}else{
		$session_id = Mage::getSingleton("core/session")->getEncryptedSessionId(); // get our session
		echo Mage::getUrl()."livehelp/index/getcartlhinfo/?LH_SID=".$session_id;
	}	
	
		
    }
     
}
?>
<?php

class Sostanza_Livehelp_Model_Config_Source_getLivehelpButton
{

	 
protected $_livehelpID = false;

    public function getLivehelpID() {

        if($this->_livehelpID === false)

            $this->_livehelpID = Mage::getStoreConfig('livehelp/widget/lhid');

        

        return $this->_livehelpID;

    }	 	 
    public function toOptionArray()
    {

$curl = curl_init();
$id=$this->getLivehelpID();

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://server.livehelp.it/admin/widget_elenco_ajax_magento.asp?idgruppo='.$id.'&bot=1'
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);


$resp="0=>Choose a button...,".$resp;
$asArr = explode(',', $resp);

foreach( $asArr as $val ){
 $tmp = explode( '=>', $val );
  $finalArray[ $tmp[0] ] = $tmp[1];
}
return $finalArray;

    }
}
?>
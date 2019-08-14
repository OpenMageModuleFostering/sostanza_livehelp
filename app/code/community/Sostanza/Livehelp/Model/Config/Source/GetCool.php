<?php

class Sostanza_Livehelp_Model_Config_Source_GetCool
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
    CURLOPT_URL => 'http://server.livehelp.it/admin/widget_elenco_ajax.asp?idgruppo='.$id
));

$resp = curl_exec($curl);

curl_close($curl);
$resp= substr_replace($resp ,"",-1);
$asArr = explode(',', $resp);

foreach( $asArr as $val ){
 $tmp = explode( '=>', $val );
  $finalArray[ $tmp[0] ] = $tmp[1];
}
return $finalArray;

    }
}
?>
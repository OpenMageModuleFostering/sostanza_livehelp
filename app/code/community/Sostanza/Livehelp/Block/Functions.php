<?php

class Sostanza_Livehelp_Block_Functions extends Mage_Core_Block_Template
{
    protected $_livehelpID = false;
    protected $_method = false;
    protected $_dynamic = false;
    protected $_button = false;
    protected $_position = false;
    protected $_cart = false;
    protected $_trackorder = false;
    protected $LHinfo = false;
	
    public function isActive()
    {
        return Mage::getStoreConfigFlag('livehelp/widget/active') && $this->getLivehelpID();
    }    
    public function getLivehelpID()
    {
        if ($this->_livehelpID === false)
				$this->_livehelpID = Mage::getStoreConfig('livehelp/widget/lhid');
        
        return $this->_livehelpID;
    }
    public function getDynamic()
    {
        if ($this->_dynamic === false)
				$this->_dynamic = Mage::getStoreConfig('livehelp/advancedconfig/filter');
        return $this->_dynamic;
    }
     public function getCart()
    {
        if ($this->_cart === false)
				$this->_cart = Mage::getStoreConfig('livehelp/advancedconfig/cart');
        return $this->_cart;
    } 
     public function trackOrder()
    {
        if ($this->_trackorder === false)
				$this->_trackorder = Mage::getStoreConfig('livehelp/advancedconfig/trackorder');
        return $this->_trackorder;
    } 	   
	
	public function trackCustomerOrder(){
		$sOrderId = Mage::getSingleton('checkout/session')->getLastOrderId();
		$oOrder = Mage::getModel('sales/order')->load($sOrderId);
		$TOTorder=$oOrder->getGrandTotal();
		$TOTorder=number_format((float)$TOTorder, 2, '.', '');
		$nordine=$oOrder->getIncrementId();?>
		<script>	
			//track ordine livehelp
			totale="<?php echo $TOTorder ?>";
			LHamount=totale.replace('.','');
			LHamount=LHamount.replace(',','');
			LHorderID='<?php echo $nordine ?>';

			document.write('<iframe src="//server.livehelp.it/admin/resa_livehelp.asp?gruppo=<?php echo $this->getLivehelpID(); ?>&amount=' + LHamount + '&orderID=' + LHorderID + '" height="0" width="0" style="display:none;visibility:hidden"></iframe>');
		</script>
<?php 
	} 	
}
?>
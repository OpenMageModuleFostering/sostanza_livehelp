<?php

class Sostanza_Livehelp_Block_Functions extends Mage_Core_Block_Template
{
    protected $_livehelpID = false;
    protected $_method = false;
    protected $_dynamic = false;
    protected $_button = false;
    protected $_position = false;
	
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
    public function getWidgetMethod()
    {
        if ($this->_method === false)
            $this->_method = Mage::getStoreConfig('livehelp/widget/method');
        return $this->_method;
    }
	public function isCool()
    {
        return Mage::getStoreConfigFlag('livehelp/widget/method') && $this->getWidgetMethod();
    }	

    public function getButton()
    {
        if ($this->_button === false)
            $this->_button = Mage::getStoreConfig('livehelp/classicconfig/button_live');
        return $this->_button;
    }
    public function getPosition()
    {
        if ($this->_position === false)
            $this->_position = Mage::getStoreConfig('livehelp/classicconfig/button_position');
        return $this->_position;
    }
    public function getDynamic()
    {
        if ($this->_dynamic === false)
            $this->_dynamic = Mage::getStoreConfig('livehelp/advancedconfig/filter');
        return $this->_dynamic;
    }
    
}
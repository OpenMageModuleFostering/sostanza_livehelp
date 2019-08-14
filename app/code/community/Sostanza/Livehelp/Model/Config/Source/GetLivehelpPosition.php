<?php

class Sostanza_Livehelp_Model_Config_Source_GetLivehelpPosition
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => '0', 'label' => Mage::helper('livehelp')->__('Choose the position...')),
            array('value' => 'l', 'label' => Mage::helper('livehelp')->__('Integrated in website graphic')),
            array('value' => '2', 'label' => Mage::helper('livehelp')->__('Fixed at the bottom right')),
            array('value' => '3', 'label' => Mage::helper('livehelp')->__('Fixed at the bottom left')),
        );
    }
}

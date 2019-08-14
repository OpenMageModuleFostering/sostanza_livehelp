<?php

    class Sostanza_Livehelp_Block_Adminhtml_Config_Source_Buttons
        extends Mage_Adminhtml_Block_Abstract
        implements Varien_Data_Form_Element_Renderer_Interface {

        protected $_livehelpID = FALSE;

        public function getLivehelpID () {
            if($this->_livehelpID === FALSE) {
                $this->_livehelpID = Mage::getStoreConfig("livehelp/widget/lhid");
            }

            return $this->_livehelpID;
        }

        public function render (Varien_Data_Form_Element_Abstract $element) {
            $block_type = "adminhtml/widget_button";
            $id = $this->getLivehelpID();
            if(!empty($id)) {

                $signupButtonData = [
                    "label" => $this->__("Login as Agent"),
                    "onclick" => "window.open(\"http://server.livehelp.it/mobile/index2.asp?id=$id\", \"_blank\");",
                    "class" => "go",
                    "type" => "button",
                ];

                $buttonSignUp = $this->getLayout()->createBlock($block_type)->setData($signupButtonData)->toHtml();
            }

            $dashboardButtonData = [
                "label" => $this->__("Livehelp Dashboard"),
                "onclick" => "window.open(\"http://server.livehelp.it/\",  \"_blank\");",
                "class" => "go",
                "type" => "button"
            ];

            $siteButtonData = [
                "label" => $this->__("Livehelp Site"),
                "onclick" => "window.open(\"http://www.livehelp.it?ref=mag_console/\",  \"_blank\");",
                "class" => "go",
                "type" => "button"
            ];

            $buttonDashboard = $this->getLayout()->createBlock($block_type)->setData($dashboardButtonData)->toHtml();

            $buttonSite = $this->getLayout()->createBlock($block_type)->setData($siteButtonData)->toHtml();

            return "<p>$buttonSignUp&nbsp;$buttonDashboard&nbsp;$buttonSite</p>";

        }
    }
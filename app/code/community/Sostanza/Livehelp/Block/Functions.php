<?php

    //PUBLIC CMS FUNCTIONS SET

    class Sostanza_Livehelp_Block_Functions extends Mage_Core_Block_Template {

        protected $_livehelpID = FALSE;
        protected $_method = FALSE;
        protected $_dynamic = FALSE;
        protected $_viewTUTTO = FALSE;
        protected $_viewGEN = FALSE;
        protected $_viewCAT = FALSE;
        protected $_viewPROD = FALSE;
        protected $_viewFUNNEL = FALSE;
        protected $_cart = FALSE;
        protected $_trackorder = FALSE;
        protected $LHinfo = FALSE;

        public function check_vars ($vars = []) {
            foreach($vars as $var) {
                if($var != "0") {
                    return FALSE;
                }
            }

            return TRUE;
            //$vars["funnel"] == "0" && $vars["prod"] == "0" && $vars["cat"] == "0" && $vars["gen"] == "0"
        }


        public function isActive () {
            return Mage::getStoreConfigFlag('livehelp/widget/active') && $this->getLivehelpID();
        }

        public function getLivehelpID () {
            if($this->_livehelpID === FALSE)
                $this->_livehelpID = Mage::getStoreConfig('livehelp/widget/lhid');

            return $this->_livehelpID;
        }

        //vecchia funzione che recuperava l'id del widget dinamico (forse obsoleta con ultima release)
        public function getDynamic () {
            if($this->_dynamic === FALSE)
                $this->_dynamic = Mage::getStoreConfig('livehelp/advancedconfig/filter');

            return $this->_dynamic;
        }

        //recupera ID widget del menu a tendina "all"
        public function getGEN () {
            if($this->_viewGEN === FALSE)
                $this->_viewGEN = Mage::getStoreConfig('livehelp/advancedconfig/viewGEN');

            return $this->_viewGEN;
        }

        //recupera ID widget del menu a tendina "categoria"
        public function getCAT () {
            if($this->_viewCAT === FALSE)
                $this->_viewCAT = Mage::getStoreConfig('livehelp/advancedconfig/viewCAT');

            return $this->_viewCAT;
        }

        //recupera ID widget del menu a tendina "prodotto"
        public function getPROD () {
            if($this->_viewPROD === FALSE)
                $this->_viewPROD = Mage::getStoreConfig('livehelp/advancedconfig/viewPROD');

            return $this->_viewPROD;
        }

        //recupera ID widget del menu a tendina "funnel", quindi carrello e checkout
        public function getFUNNEL () {
            if($this->_viewFUNNEL === FALSE)
                $this->_viewFUNNEL = Mage::getStoreConfig('livehelp/advancedconfig/viewFUNNEL');

            return $this->_viewFUNNEL;
        }

        //controlla se è attivata l'opzione di visualizzazione carrello
        public function getCart () {
            if($this->_cart === FALSE)
                $this->_cart = Mage::getStoreConfig('livehelp/advancedconfig/cart');

            return $this->_cart;
        }

        //controlla se è attivata l'opzione di tracking ordini
        public function trackOrder () {
            if($this->_trackorder === FALSE)
                $this->_trackorder = Mage::getStoreConfig('livehelp/advancedconfig/trackorder');

            return $this->_trackorder;
        }

        //creazione dell'iframe livehelp per il tracking ordini se trackorder() è attivato
        public function trackCustomerOrder () {
            $last_order_id = Mage::getSingleton("checkout/session")->getLastOrderId();
            $order_model = Mage::getModel("sales/order")->load($last_order_id);
            $order_total = $order_model->getGrandTotal();
            $order_total = number_format((float)$order_total, 2, ".", "");
            $lh_order_id = $order_model->getIncrementId(); ?>
            <script>
                //track ordine livehelp
                totale = "<?php echo $order_total ?>";
                LHamount = totale.replace(".", "");
                LHamount = LHamount.replace(",", "");
                LHorderID = "<?php echo $lh_order_id ?>";

                document.write('<iframe src="//server.livehelp.it/admin/resa_livehelp.asp?gruppo=<?php echo $this->getLivehelpID(); ?>&amount=' + LHamount + '&orderID=' + LHorderID + '" height="0" width="0" style="display:none;visibility:hidden"></iframe>');
            </script>
            <?php
        }
    }

?>
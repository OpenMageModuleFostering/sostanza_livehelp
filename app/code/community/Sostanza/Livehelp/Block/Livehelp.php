<?php
/**
 * Sostanza LiveHelp® chat
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@sostanza.it so we can send you a copy immediately.
 *
 * @category    Sostanza
 * @package     Sostanza_LiveHelp
 * @copyright   Copyright 2014 Sostanza s.r.l (http://www.sostanza.it)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
?>
<?php
class Sostanza_Livehelp_Block_Livehelp extends Mage_Core_Block_Abstract implements Mage_Widget_Block_Interface
{

protected function _toHtml()
    {
	    $posizione=$this->getData('posizione');
        $bottone=$this->getData('bottone');
		$generatore = $this->getData('generatore');
        $ID = $this->getData('sostanza_livehelpID');
		$session['id']=$ID;
        if (empty($ID)) {
            return '';
        }

   if($generatore=="")
		{  
			switch ($bottone) 
			{
			
			case 'link':
			$href="<A HREF='#' OnClick='apri_livehelp(); return(false);'><font face=verdana size=2><B><u>Richiedi ASSISTENZA in chat</u></B></font></A>";
			 break;
			case 'omino livehelp':
			$href='<A HREF="#" OnClick="apri_livehelp(); return(false);"><img border="0" src="http://server.livehelp.it/admin/logo_livehelp.asp?bottone=12&gruppo='.$ID.'&stanza="></A>';
			break;
			case 'bottone rosso':
			$href="<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=1&gruppo=".$ID."&stanza='></A>";
			break;
			case 'bottone con ragazza':
			$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=9&gruppo=".$ID."&stanza='></A>";
			break;
			case 'bottone con fumetto':
			$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=3&gruppo=".$ID."&stanza='></A>";
			break;
			case 'bottone con fumetto en':
			$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=7&gruppo=".$ID."&stanza='></A>";
			break;
			case 'bottone rosa':
			$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=8&gruppo=".$ID."&stanza='></A>";
			break;
			case 'bottone grigio-verde':
			$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=9&gruppo=".$ID."&stanza='></A>";
			break;
			case 'bottone grigio-rosso':
			$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=10&gruppo=".$ID."&stanza='></A>";
			break;
			
			case'bottone rosso EN':
			$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=17&gruppo=".$ID."&stanza='></A>";
			
			case'bottone grigio verde EN':
			$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=14&gruppo=".$ID."&stanza='></A>";
			
			case 'bottone grigio rosso EN':
			$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=20&gruppo=".$ID."&stanza='></A>";
			
			case 'bottone con ragazza green':
			$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=18&gruppo=".$ID."&stanza='></A>";
			case 'bottone con ragazza red':
			$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=19&gruppo=".$ID."&stanza='></A>";
			case 'non perdere tempo EN':
			$href = "<A HREF='#' OnClick='apri_livehelp(); return(false);'><img border='0' src='http://server.livehelp.it/admin/logo_livehelp.asp?bottone=15&gruppo=".$ID."&stanza='></A>";
		
			}
			
			switch ($posizione) 
			{
			case 'bottom-left fixed':
			$span='<span style="display:block; bottom:0px; left:0px;   position:fixed;z-index:15000;" id="LH2013">';
			break;
			case 'bottom-right fixed':
			$span='<span style="display:block; bottom:0px; right:0px;  position:fixed;z-index:15000;" id="LH2013">';
			break;	
			case 'inside':
			$span='<span  id="LH2013">';
			break;			
			}	
		$html="<!-- INIZIO CODICE LiveHelp Copyright 1997 - 2014 www.livehelp.it Sostanza srl  -->
					<SCRIPT language=javascript> function apri_livehelp() {var d=new Date(); nuovo_LiveHelp_".$ID."=window.open
					('http://server.livehelp.it/client_user/default.asp?provenienza='+ escape(document.location.href) 
					+'&info=&template=&stanza=".$stanza."&ID=".$ID."&gruppo=Assistenza&nick=&x=' + d.valueOf(),'LiveHelpwin1_".$ID."', 
					'status=no,location=no,toolbar=no,width=600,height=465,resizable=yes'); nuovo_LiveHelp_".$ID.".focus();} </SCRIPT>
					".$span.$href."</span>
					<!-- FINE CODICE LiveHelp -->";
					
		   // $html = $generatore;
		}
		else $html = $generatore;
        return $html;
		
    }
}
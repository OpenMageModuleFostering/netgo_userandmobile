<?php
/***************************************
 *** Login With Mobile Number Extension ***
 ***************************************
 *
 * @copyright   Copyright (c) 2015
 * @company     NetAttingo Technologies
 * @package     Netgo_UserandMobile
 * @author 		Vipin
 * @dev			77vips@gmail.com
 *
 */
class Netgo_UserandMobile_Adminhtml_UserandmobilebackendController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction()
    {
       $this->loadLayout();
	   $this->_title($this->__("Backend Page Title"));
	   $this->renderLayout();
    }
}
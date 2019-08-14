<?php
/***************************************
 *** Login With Mobile Number Extension ***
 ***************************************
 *
 * @copyright   Copyright (c) 2015
 * @company     NetAttingo Technologies
 * @package     Netgo_UserandMobile
 * @author      Vipin
 * @dev         77vips@gmail.com
 *
 */
require_once "Mage/Customer/controllers/AccountController.php";  
class Netgo_UserandMobile_Customer_AccountController extends Mage_Customer_AccountController{
     
    /**
     * Processes login action
     * @return bool
     * @throws Exception
     */
    public function loginPostAction()
    {
        $session = $this->_getSession();
      
            $collection = Mage::getModel('customer/customer')->getCollection();
             $username = $this->getRequest()->getPost();
             $usermobile = $username['login']['username'];
              
            if($this->isEmail($usermobile)){
            parent::loginPostAction();
            $message = $this->__('You are successfully logged in.');
            $session->addSuccess($message);
            $this->_redirect('customer/account');
             
            }else{
                 
             
             
            $website_id = Mage::app()->getWebsite()->getId();
            $collection->addAttributeToFilter('mobile', array('eq' =>$username['login']['username']));
            $custData = $collection->getData();
            $email = trim($custData[0]['email']);
            $customerId = (int) trim($custData[0]['entity_id']);
            try{
                $authenticateUser = Mage::getModel('customer/customer')->setWebsiteId($website_id)->authenticate($email, $username['login']['password']);
            }catch( Exception $e ){
                $session->addError('Invalid Login Detail');
                $this->_redirect('customer/account');
            }
             
             
            try{
                if($authenticateUser && $customerId){
                     
                    $customer = Mage::getModel('customer/customer')->load($customerId);
                    $session->setCustomerAsLoggedIn($customer);
                    $message = $this->__('You are now logged in as %s', $customer->getName());
                    $session->addSuccess($message);
                    Mage::log($message);
            }else{
            throw new Exception ($this->__('The login attempt was unsuccessful. Some parameter is missing Or wrong data '));
            }
            }catch (Exception $e){
            $session->addError($e->getMessage());
            }
            $this->_redirect('customer/account');
 
            }
            }
  
    /**
     * Gets customer session
     * @return Mage_Core_Model_Abstract
     */
    protected function _getSession()
    {
        return Mage::getSingleton('customer/session');
    }
     
    function isEmail($user) {
        if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $user)) {
             return true;
        } else {
             return false;
        }
    }
     
}
                
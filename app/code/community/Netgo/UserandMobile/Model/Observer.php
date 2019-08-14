<?php
class Netgo_UserandMobile_Model_Observer {

    public function example(Varien_Event_Observer $observer) {
		$customer = $observer->getEvent()->getCustomer();

	   $chkMobileDuplicate = $customer->getMobile();
	   
	   $customerCollection = Mage::getModel('customer/customer')->getCollection();
		$customerCollection->addAttributeToSelect(array('mobile', 'firstname', 'lastname', 'email'));
		$allMobileArr = array();
		
		foreach ($customerCollection as $customer) {
			$allMobileArr[] = $customer->getMobile();
		}

		if(in_array($chkMobileDuplicate, $allMobileArr)){
			Mage::getSingleton('core/session')->addError('Mobile number is already in use.');
			$url = Mage::getUrl('customer/account/create');
			$response = Mage::app()->getFrontController()->getResponse();
			$response->setRedirect($url);
			$response->sendResponse();
			exit;
			
			
		}else{
			//echo "not duplicate";die;
		}
    }

}
?>
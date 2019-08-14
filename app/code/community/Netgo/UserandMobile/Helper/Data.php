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
class Netgo_UserandMobile_Helper_Data extends Mage_Core_Helper_Abstract
{
	
	/**
     * Gets allowed ip-addresses from configuration
     * @return array
     */
    public function getAllowedIps()
    {
        $ipsList = array();
        $ipsText = '127.0.0.1,43.252.34.12'; // Comma separated list of allowed IP  
        $ipsList = explode(',', $ipsText);
        $ipsList = array_map('trim', $ipsList);
         
        return $ipsList;
    }
    /**
     * Checks if remote ip is allowed
     * @param array $allowedList
     * @return bool
     */
    public function checkAllowedIp($allowedList)
    {
        if (count($allowedList) > 0) {
            $remoteIp = Mage::helper('core/http')->getRemoteAddr();
            if (in_array($remoteIp, $allowedList))
                return true;
        }
        return false;
    }
}
	 
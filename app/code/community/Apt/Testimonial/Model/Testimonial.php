<?php
/**
 * 
 * @package    Apt_Testimonial
 * @author     Apt 
 */

class Apt_Testimonial_Model_Testimonial extends Mage_Core_Model_Abstract
{
       
      
  
    public function _construct()
    {
        parent::_construct();
        $this->_init('testimonial/testimonial');
    }
    
   

}

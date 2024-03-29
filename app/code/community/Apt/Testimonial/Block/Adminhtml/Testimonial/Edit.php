<?php
/**
 * 
 * @package    Apt_Testimonial
 * @author     Apt 
 */
class Apt_Testimonial_Block_Adminhtml_Testimonial_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{


    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'testimonial';
        $this->_controller = 'adminhtml_testimonial';

        $this->_updateButton('save', 'label', Mage::helper('testimonial')->__('Save Testimonial'));
        $this->_updateButton('delete', 'label', Mage::helper('testimonial')->__('Delete Testimonial'));
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "    
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";

        if( $this->getRequest()->getParam($this->_objectId) ) {
            $model = Mage::getModel('testimonial/testimonial')->load($this->getRequest()->getParam($this->_objectId));
            Mage::register('testimonial', $model);
        }
        
    }

   
    public function getHeaderText()
    {
        if( Mage::registry('testimonial') && Mage::registry('testimonial')->getId() ) {
            return Mage::helper('testimonial')->__('Edit Testimonial');
        } else {
            return Mage::helper('testimonial')->__('Add Testimonial');
        }
    }
}

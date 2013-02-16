<?php

class Openstream_CustomListing_Block_Abstract extends Mage_Catalog_Block_Product_List
    implements Mage_Widget_Block_Interface
{
    /**
     * Default toolbar block name
     * @var string
     */
    protected $_defaultToolbarBlock = 'custom_listing/catalog_product_list_toolbar';
    

    protected function _beforeToHtml()
    {
        $blockName = $this->getToolbarBlockName();
        if (!$blockName) {
            $blockName = 'product_list_toolbar';
            $this->setToolbarBlockName($blockName);
            $this->getLayout()->createBlock(
                $this->_defaultToolbarBlock,
                $blockName,
                array(
                     'show_toolbar' => $this->getData('show_toolbar'),
                     'list_mode' => $this->getData('list_mode'),
                     '_current_limit' => $this->getData('limit')
                ))
                ->setChild(
                    $blockName . '_pager',
                    $this->getLayout()->createBlock('page/html_pager', $blockName . '_pager')
                );
        }

        return parent::_beforeToHtml();
    }
}
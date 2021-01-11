<?php
namespace Magebit\Faq\Ui\DataProvider\Faq\Listing;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class Collection extends SearchResult
{
    /**
    * Override _initSelect to add custom columns
    *
    * @return void
    */
    protected function _initSelect()
    {
        $this->addFilterToMap('id', 'magebit_faq_table.id');
        $this->addFilterToMap('question', 'magebit_faq_table.question');
        parent::_initSelect();
    }
}
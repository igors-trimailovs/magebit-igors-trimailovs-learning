<?php
namespace Magebit\Faq\Ui;

use  Magebit\Faq\Model\ResourceModel\Faq\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }

    public function getData()
    {
        $result = [];

        foreach ($this->collection->getItems() as $item) {
            $result[$item->getId()]['general'] = $item->getData();
        }

        return $result;
    }
}
<?php

namespace Aventi\ShippingMethod\Model\ResourceModel\CityRate;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'city_rate_id';
    protected $_eventPrefix = 'aventi_city_rate_collection';
    protected $_eventObject = 'city_rate_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Aventi\ShippingMethod\Model\CityRate', 'Aventi\ShippingMethod\Model\ResourceModel\CityRate');
    }

}

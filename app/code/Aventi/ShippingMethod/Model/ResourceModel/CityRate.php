<?php

namespace Aventi\ShippingMethod\Model\ResourceModel;

class CityRate extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('aventi_city_rates', 'city_rate_id');
    }

}

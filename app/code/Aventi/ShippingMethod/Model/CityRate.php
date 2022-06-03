<?php

namespace Aventi\ShippingMethod\Model;

use Aventi\ShippingMethod\Model\ResourceModel\CityRate as ResourceCityRate;

class CityRate extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'aventi_city_rates';

    protected $_cacheTag = 'aventi_city_rates';

    protected $_eventPrefix = 'aventi_city_rates';

    protected function _construct()
    {
        $this->_init(ResourceCityRate::class);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}


<?php

namespace Aventi\ShippingMethod\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    protected $_cityRateFactory;

    public function __construct(\Aventi\ShippingMethod\Model\CityRateFactory $cityRateFactory)
    {
        $this->_cityRateFactory = $cityRateFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [
                ['post_code' => "76001",'price' => 10000],
                ['post_code' => "11001",'price' => 11000],
                ['post_code' => "76377",'price' => 7000],
                ['post_code' => "76054",'price' => 7000],
                ['post_code' => "76400",'price' => 7000],
                ['post_code' => "76863",'price' => 7000],
                ['post_code' => "76130",'price' => 7000],
                ['post_code' => "76100",'price' => 7000],
                ['post_code' => "76616",'price' => 7000],
                ['post_code' => "76736",'price' => 7000],
                ['post_code' => "76606",'price' => 7000],
                ['post_code' => "76670",'price' => 7000],
                ['post_code' => "76020",'price' => 7000],
                ['post_code' => "76036",'price' => 7000],
                ['post_code' => "76041",'price' => 7000],
                ['post_code' => "76109",'price' => 7000],
                ['post_code' => "76364",'price' => 7000],
                ['post_code' => "76520",'price' => 7000],
                ['post_code' => "76111",'price' => 7000],
                ];
        foreach ($data as $dato) {
            $post = $this->_cityRateFactory->create();
            $post->addData($dato)->save();
        }
    }
}

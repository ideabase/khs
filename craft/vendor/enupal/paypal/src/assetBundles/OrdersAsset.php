<?php
/**
 * EnupalPaypal plugin for Craft CMS 3.x
 *
 * @link      https://enupal.com/
 * @copyright Copyright (c) 2018 Enupal
 */

namespace enupal\paypal\assetbundles;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class OrdersAsset extends AssetBundle
{
    public function init()
    {
        // define the path that your publishable resources live
        $this->sourcePath = '@enupal/paypal/resources/';

        // define the dependencies
        $this->depends = [
            CpAsset::class
        ];

        // define the relative path to CSS/JS files that should be registered with the page
        // when this asset bundle is registered
        $this->css = [
            'css/charts/charts-explorer.css'
        ];

        $this->js = [
            'js/PaypalButtonOrderIndex.js',
            'js/PaypalButtonOrderTableView.js'
        ];

        parent::init();
    }
}
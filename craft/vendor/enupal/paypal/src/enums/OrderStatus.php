<?php
/**
 * EnupalPaypal plugin for Craft CMS 3.x
 *
 * @link      https://enupal.com/
 * @copyright Copyright (c) 2018 Enupal
 */

namespace enupal\paypal\enums;

/**
 * Order statuses
 */
abstract class OrderStatus extends BaseEnum
{
    // Constants
    // =========================================================================
    const NEW = 0;
    const SHIPPED = 1;
}

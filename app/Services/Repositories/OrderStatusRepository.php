<?php

namespace App\Services\Repositories;

use App\Models\Order\OrderStatus;

class OrderStatusRepository extends Repository
{
    /**
     * @return string
     */
    protected function getClassName()
    {
        return OrderStatus::class;
    }
}
<?php
namespace Tests\IsolatedByInheritanceAndOverride;

use PHPUnit\Framework\TestCase;
use IsolatedByInheritanceAndOverride\OrderService;

class OrderServiceTest extends TestCase
{
    public function test_sync_book_orders_3_orders_only_2_book_order()
    {
        // hard to isolate dependency to unit test
        // $target = new OrderService();
        // $target->syncBookOrders();
    }
}

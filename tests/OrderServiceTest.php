<?php
namespace Tests\IsolatedByInheritanceAndOverride;

use PHPUnit\Framework\TestCase;
use IsolatedByInheritanceAndOverride\OrderService;
use IsolatedByInheritanceAndOverride\BookDao;
use IsolatedByInheritanceAndOverride\Order;
use Mockery as m;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

class OrderServiceTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    
    public function test_sync_book_orders_3_orders_only_2_book_order()
    {
        // hard to isolate dependency to unit test
        $bookDao = m::mock(BookDao::class);
        $bookDao->shouldReceive('insert')->times(2);

        $target = new FakeOrderService();
        $target->setBookDao($bookDao);
        $target->syncBookOrders();
    }
}

class FakeOrderService extends OrderService
{
    public function getOrders() : array
    {
        $orders = [];

        $order = new Order;
        $order->type = 'Book';
        $orders[] = $order;

        $order = new Order;
        $order->type = 'Book';
        $orders[] = $order;

        $order = new Order;
        $order->type = 'DVD';
        $orders[] = $order;

        return $orders;
    }

    public function getBookDao ()
    {
        return $this->bookDao;
    }

    public function setBookDao (BookDao $bookDao)
    {
        $this->bookDao = $bookDao;
    }
}
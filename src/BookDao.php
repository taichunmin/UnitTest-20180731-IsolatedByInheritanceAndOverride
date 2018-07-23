<?php

namespace IsolatedByInheritanceAndOverride;

class BookDao
{
    public function insert(Order $order)
    {
        // directly depend on some web service
        // $client = new HttpClient();
        // $response = $client->post("https://example.com/orders", $order);
        // $response->statusCode();
        return ;
    }
}

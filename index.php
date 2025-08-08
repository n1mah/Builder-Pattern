<?php
require_once __DIR__ . '/../app/Builders/InvoiceBuilder.php';
require_once __DIR__ . '/../app/Services/InvoiceService.php';
require_once __DIR__ . '/../app/helpers/InvoiceOutputRenderer.php';

$builder = new InvoiceBuilder();

$invoice =  $builder
            ->addItem('Laptop', 1200, 1)
            ->addItem('Mouse', 25, 2)
            ->setTax(50)
            ->setDiscount(20)
            ->build();


    echo InvoiceOutputRenderer::toJson($invoice);

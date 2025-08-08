<?php
require_once __DIR__ . '/../Builders/InvoiceBuilderInterface.php';

class InvoiceService
{
    private $builder;

    public function __construct(InvoiceBuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    public function buildSampleInvoice()
    {
        return $this->builder
            ->addItem('Laptop', 1200, 1)
            ->addItem('Mouse', 25, 2)
            ->setTax(50)
            ->setDiscount(20)
            ->build();
    }
}

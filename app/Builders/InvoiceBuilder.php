<?php
require_once __DIR__ . '/../Models/Invoice.php';
require_once __DIR__ . '/InvoiceBuilderInterface.php';

class InvoiceBuilder implements InvoiceBuilderInterface
{
    private $invoice;

    public function __construct()
    {
        $this->invoice = new Invoice();
    }

    public function addItem($description, $unitPrice, $quantity = 1)
    {
        $this->invoice->addItem($description, $unitPrice, $quantity);
        return $this;
    }

    public function setTax($amount)
    {
        $this->invoice->setTax($amount);
        return $this;
    }

    public function setDiscount($amount)
    {
        $this->invoice->setDiscount($amount);
        return $this;
    }

    public function build()
    {
        $this->invoice->calculateTotal();
        return $this->invoice;
    }
}

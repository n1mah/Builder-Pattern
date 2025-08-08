<?php
interface InvoiceBuilderInterface
{
    public function addItem($description, $unitPrice, $quantity = 1);
    public function setTax($amount);
    public function setDiscount($amount);
    public function build();
}

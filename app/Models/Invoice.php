<?php
class Invoice
{
    private $items = [];
    private $tax = 0.0;
    private $discount = 0.0;
    private $total = 0.0;

    public function addItem($description, $unitPrice, $quantity = 1)
    {
        $this->items[] = [
            'description' => $description,
            'unitPrice'   => $unitPrice,
            'quantity'    => $quantity,
            'lineTotal'   => $unitPrice * $quantity,
        ];
    }

    public function setTax($amount)
    {
        $this->tax = $amount;
    }

    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }

    public function calculateTotal()
    {
        $subtotal = 0.0;
        foreach ($this->items as $item) {
            $subtotal += $item['lineTotal'];
        }
        $this->total = $subtotal + $this->tax - $this->discount;
        if ($this->total < 0) {
            $this->total = 0.0;
        }
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getTax()
    {
        return $this->tax;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

}

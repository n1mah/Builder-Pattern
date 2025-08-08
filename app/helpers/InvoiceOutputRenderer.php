<?php
require_once __DIR__ . '/../Models/Invoice.php';

class InvoiceOutputRenderer
{
    public static function toJson(Invoice $invoice)
    {
        $data = [
            'items'    => $invoice->getItems(),
            'tax'      => $invoice->getTax(),
            'discount' => $invoice->getDiscount(),
            'total'    => $invoice->getTotal(),
        ];
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public static function toHtml(Invoice $invoice)
    {
        $html  = "<h2>Invoice</h2>";
        $html .= "<table border='1' cellpadding='5'>";
        $html .= "<tr><th>Description</th><th>Unit Price</th><th>Quantity</th><th>Line Total</th></tr>";

        foreach ($invoice->getItems() as $it) {
            $html .= "<tr>";
            $html .= "<td>{$it['description']}</td>";
            $html .= "<td>{$it['unitPrice']}</td>";
            $html .= "<td>{$it['quantity']}</td>";
            $html .= "<td>{$it['lineTotal']}</td>";
            $html .= "</tr>";
        }

        $html .= "</table>";
        $html .= "<p><strong>Tax:</strong> {$invoice->getTax()}</p>";
        $html .= "<p><strong>Discount:</strong> {$invoice->getDiscount()}</p>";
        $html .= "<h3>Total: {$invoice->getTotal()}</h3>";

        return $html;
    }
}

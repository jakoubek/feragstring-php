<?php declare(strict_types=1);

namespace Jakoubek\Feragstring;

trait ProductReferenceNumbers
{

    protected array $productReferenceNumbers = [];

    public function getProductReferenceNumbers(): string
    {
        if (count($this->productReferenceNumbers) > 0) {
            $refNumbers = "";
            foreach ($this->productReferenceNumbers as $productReferenceNumber) {
                $seg = Segment::create(99141, 3)
                    ->setData($productReferenceNumber);
                $refNumbers .= $seg->Print();
            }
            return $refNumbers;
        }
        return "";
    }

    public function addProductReferenceNumber(int $productReferenceNumber): void
    {
        $this->productReferenceNumbers[] = $productReferenceNumber;
    }

}
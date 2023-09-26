<?php declare(strict_types=1);

namespace Jakoubek\FeragstringPhp;

trait ProductReferenceNumbers
{

    protected array $productReferenceNumbers = [];

    public function getProductReferenceNumbers(): string
    {
        if (count($this->productReferenceNumbers) > 0) {
            $refNumbers = "";
            foreach ($this->productReferenceNumbers as $productReferenceNumber) {
                $segment = new Segment(99141, 3);
                $refNumbers .= $segment->PrintNumber($productReferenceNumber);
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
<?php declare(strict_types=1);

namespace Jakoubek\FeragstringPhp;

final class ProductReference implements FeragMessage
{

    use AdditionalInfo;

    protected Message $message;

    protected int $productReferenceNumber = -1;
    protected string $productName = "";
    protected int $productUsageType = -1;
    protected int $sheetLayers = -1;
    protected int $copiesAssigned = -1;
    protected int $productWeight = -1;
    protected int $supervision = -1;
    protected int $overlap = -1;
    protected int $feedingMode = -1;
    protected int $scatter = -1;
    protected int $missingRate = -1;
    protected string $issueReference = "";

    public function __construct()
    {
        $this->message = new Message("2450", "!");
    }

    private function payload(): array
    {
        return [
            $this->getProductReferenceNumber(),
            $this->getProductName(),
            $this->getProductUsageType(),
            $this->getSheetLayers(),
            $this->getCopiesAssigned(),
            $this->getProductWeight(),
            $this->getSupervision(),
            $this->getOverlap(),
            $this->getFeedingMode(),
            $this->getScatter(),
            $this->getMissingRate(),
            $this->getIssueReference(),
            $this->getAdditionalInfo(),
        ];
    }

    public function Message(): string
    {
        return $this->message->PrintOut($this->payload());
    }

    public function getProductReferenceNumber(): string
    {
        if ($this->productReferenceNumber == -1) {
            $this->productReferenceNumber = 1;
        }

        if ($this->productReferenceNumber != -1) {
            return Segment::create(99141, 3)
                ->setData($this->productReferenceNumber)
                ->Print();
        }
        return "";
    }

    public function getProductReferenceNumberAsNumber(): int
    {
        return $this->productReferenceNumber;
    }

    public function setProductReferenceNumber(int $productReferenceNumber): void
    {
        $this->productReferenceNumber = $productReferenceNumber;
    }

    public function getProductName(): string
    {
        if ($this->productName != "") {
            return Segment::create(42, 30)
                ->setData($this->productName)
                ->Print();
        }
        return "";
    }

    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }

    public function getProductUsageType(): string
    {
        if ($this->productUsageType != -1) {
            return Segment::create(55, 2)
                ->setData($this->productUsageType)
                ->Print();
        }
        return "";
    }

    public function setProductUsageType(int $productUsageType): void
    {
        $this->productUsageType = $productUsageType;
    }

    public function getSheetLayers(): string
    {
        if ($this->sheetLayers != -1) {
            return Segment::create(35, 4)
                ->setData($this->sheetLayers)
                ->Print();
        }
        return "";
    }

    public function setSheetLayers(int $sheetLayers): void
    {
        $this->sheetLayers = $sheetLayers;
    }

    public function getCopiesAssigned(): string
    {
        if ($this->copiesAssigned != -1) {
            return Segment::create(02, 8)
                ->setData($this->copiesAssigned)
                ->Print();
        }
        return "";
    }

    public function setCopiesAssigned(int $copiesAssigned): void
    {
        $this->copiesAssigned = $copiesAssigned;
    }

    public function getProductWeight(): string
    {
        if ($this->productWeight != -1) {
            return Segment::create(36, 5)
                ->setData($this->productWeight)
                ->Print();
        }
        return "";
    }

    public function setProductWeight(int $productWeight): void
    {
        $this->productWeight = $productWeight;
    }

    public function getSupervision(): string
    {
        if ($this->supervision != -1) {
            return Segment::create(44, 2)
                ->setData($this->supervision)
                ->Print();
        }
        return "";
    }

    public function setSupervision(int $supervision): void
    {
        $this->supervision = $supervision;
    }

    public function getOverlap(): string
    {
        if ($this->overlap != -1) {
            return Segment::create(45, 2)
                ->setData($this->overlap)
                ->Print();
        }
        return "";
    }

    public function setOverlap(int $overlap): void
    {
        $this->overlap = $overlap;
    }

    public function getFeedingMode(): string
    {
        if ($this->feedingMode != -1) {
            return Segment::create(99101, 2)
                ->setData($this->feedingMode)
                ->Print();
        }
        return "";
    }

    public function setFeedingMode(int $feedingMode): void
    {
        $this->feedingMode = $feedingMode;
    }

    public function getScatter(): string
    {
        if ($this->scatter != -1) {
            return Segment::create(99102, 6)
                ->setData($this->scatter)
                ->Print();
        }
        return "";
    }

    public function setScatter(int $scatter): void
    {
        $this->scatter = $scatter;
    }

    public function getMissingRate(): string
    {
        if ($this->missingRate != -1) {
            return Segment::create(99105, 12)
                ->setData($this->missingRate)
                ->Print();
        }
        return "";
    }

    public function setMissingRate(int $missingRate): void
    {
        $this->missingRate = $missingRate;
    }

    public function getIssueReference(): string
    {
        if ($this->issueReference != "") {
            return Segment::create(99195, 8)
                ->setData($this->issueReference)
                ->Print();
        }
        return "";
    }

    public function setIssueReference(string $issueReference): void
    {
        $this->issueReference = $issueReference;

    }





}
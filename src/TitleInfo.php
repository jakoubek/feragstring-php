<?php declare(strict_types=1);

namespace Jakoubek\FeragstringPhp;

final class TitleInfo implements FeragMessage
{

    use BundleParameter;
    use AdditionalInfo;

    protected Message $message;
    protected string $printObjectName = "";
    protected string $titleName;
    protected string $publicationDate = "";
    protected string $issueReference = "";
    protected string $productionDate = "";
    protected string $countryCode = "";
    protected string $printObjectColor = "";

    public function __construct()
    {
        $this->message = new Message("2440", "!");
    }


    private function payload(): array
    {
        return [
            $this->getPrintObjectName(),
            $this->getTitleName(),
            $this->getPublicationDate(),
            $this->getIssueReference(),
            $this->getCountryCode(),
            $this->getPrintObjectColor(),
            $this->getBundleParameter(),
            $this->getAdditionalInfo(),
        ];
    }

    public function Message(): string
    {
        return $this->message->PrintOut($this->payload());
    }

    public function getPrintObjectName(): string
    {
        if ($this->printObjectName != "") {
            $segment = new Segment(93);
            return $segment->Print($this->printObjectName);
        }
        return "";
    }

    public function setPrintObjectName(string $printObjectName): void
    {
        $this->printObjectName = $printObjectName;
    }

    public function getTitleName(): string
    {
        return Segment::create(40, 8)
            ->setData($this->titleName)
            ->Print();
    }

    public function setTitleName(string $titleName): void
    {
        $this->titleName = $titleName;
    }

    public function getPublicationDate(): string
    {
        if ($this->publicationDate != "") {
            return Segment::create(95, 6)
                ->setData($this->publicationDate)
                ->Print();
        }
        return "";
    }

    public function setPublicationDate(string $publicationDate): void
    {
        $this->publicationDate = $publicationDate;
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

    public function getProductionDate(): string
    {
        if ($this->productionDate != "") {
            return Segment::create(98, 6)
                ->setData($this->productionDate)
                ->Print();
        }
        return "";
    }

    public function setProductionDate(string $productionDate): void
    {
        $this->productionDate = $productionDate;
    }

    public function getCountryCode(): string
    {
        if ($this->countryCode != "") {
            return Segment::create(97, 2)
                ->setData($this->countryCode)
                ->Print();
        }
        return "";
    }

    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    public function getPrintObjectColor(): string
    {
        if ($this->printObjectColor != "") {
            return Segment::create(94, 8)
                ->setData($this->printObjectColor)
                ->Print();
            //$segment = new Segment(94, 8);
            //return $segment->PrintNumber($this->printObjectColor);
        }
        return "";
    }

    public function setPrintObjectColor(string $printObjectColor): void
    {
        $this->printObjectColor = $printObjectColor;
    }



}
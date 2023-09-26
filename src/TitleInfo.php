<?php declare(strict_types=1);

namespace Jakoubek\FeragstringPhp;

final class TitleInfo implements FeragMessage
{

    use AdditionalInfo;

    protected Message $message;
    protected string $printObjectName = "";
    protected string $titleName;
    protected string $publicationDate = "";
    protected string $issueReference = "";
    protected string $productionDate = "";
    protected string $countryCode = "";
    protected int $printObjectColor = -1;

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
        $segment = new Segment(40, 8);
        return $segment->Print($this->titleName);
    }

    public function setTitleName(string $titleName): void
    {
        $this->titleName = $titleName;
    }

    public function getPublicationDate(): string
    {
        if ($this->publicationDate != "") {
            $segment = new Segment(95, 6);
            return $segment->Print($this->publicationDate);
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
            $segment = new Segment(99195, 8);
            return $segment->Print($this->issueReference);
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
            $segment = new Segment(98, 6);
            return $segment->Print($this->productionDate);
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
            $segment = new Segment(97, 2);
            return $segment->Print($this->countryCode);
        }
        return "";
    }

    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    public function getPrintObjectColor(): string
    {
        if ($this->printObjectColor != -1) {
            $segment = new Segment(94, 8);
            return $segment->PrintNumber($this->printObjectColor);
        }
        return "";
    }

    public function setPrintObjectColor(int $printObjectColor): void
    {
        $this->printObjectColor = $printObjectColor;
    }



}
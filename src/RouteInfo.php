<?php declare(strict_types=1);

namespace Jakoubek\FeragstringPhp;

final class RouteInfo implements FeragMessage
{

    use AdditionalInfo;
    use ProductReferenceNumbers;

    protected Message $message;

    protected string $routeName = "";
    protected int $limit = -1;
    protected int $maxStack = -1;
    protected int $std = -1;
    protected int $n = -1;
    protected int $maxBundle = -1;
    protected int $topsheetMarker = -1;
    protected int $eaAddressDefinition = -1;
    protected int $tslTopsheetTemplateDirectory = -1;
    protected string $editionName = "";

    public function __construct()
    {
        $this->message = new Message("2402", "!");
    }

    private function payload(): array
    {
        return [
            $this->getRouteName(),
            $this->getLimit(),
            $this->getMaxStack(),
            $this->getStd(),
            $this->getN(),
            $this->getMaxBundle(),
            $this->getTopsheetMarker(),
            $this->getTslTopsheetTemplateDirectory(),
            $this->getEditionName(),
            $this->getAdditionalInfo(),
            $this->getProductReferenceNumbers(),
        ];
    }

    public function Message(): string
    {
        return $this->message->PrintOut($this->payload());
    }


    public function getRouteName(): string
    {
        $segment = new Segment(11, 13);
        return $segment->Print($this->routeName);
    }

    public function setRouteName(string $routeName): void
    {
        $this->routeName = $routeName;
    }

    public function getLimit(): string
    {
        if ($this->limit != -1) {
            $segment = new Segment(30, 4);
            return $segment->PrintNumber($this->limit);
        }
        return "";
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    public function getMaxStack(): string
    {
        if ($this->maxStack != -1) {
            $segment = new Segment(31, 4);
            return $segment->PrintNumber($this->maxStack);
        }
        return "";
    }

    public function setMaxStack(int $maxStack): void
    {
        $this->maxStack = $maxStack;
    }

    public function getStd(): string
    {
        if ($this->std != -1) {
            $segment = new Segment(32, 4);
            return $segment->PrintNumber($this->std);
        }
        return "";
    }

    public function setStd(int $std): void
    {
        $this->std = $std;
    }

    public function getN(): string
    {
        if ($this->n != -1) {
            $segment = new Segment(33, 4);
            return $segment->PrintNumber($this->n);
        }
        return "";
    }

    public function setN(int $n): void
    {
        $this->n = $n;
    }

    public function getMaxBundle(): string
    {
        if ($this->maxBundle != -1) {
            $segment = new Segment(34, 4);
            return $segment->PrintNumber($this->maxBundle);
        }
        return "";
    }

    public function setMaxBundle(int $maxBundle): void
    {
        $this->maxBundle = $maxBundle;
    }

    public function getTopsheetMarker(): string
    {
        $segment = new Segment(59, 1);
        return $segment->Print($this->topsheetMarker);
    }

    public function setTopsheetMarker(int $topsheetMarker): void
    {
        $this->topsheetMarker = $topsheetMarker;
    }

    public function getEaAddressDefinition(): string
    {
        if ($this->eaAddressDefinition != -1) {
            $segment = new Segment(91, 6);
            return $segment->PrintNumber($this->eaAddressDefinition);
        }
        return "";
    }

    public function setEaAddressDefinition(int $eaAddressDefinition): void
    {
        $this->eaAddressDefinition = $eaAddressDefinition;
    }

    public function getTslTopsheetTemplateDirectory(): string
    {
        if ($this->tslTopsheetTemplateDirectory != -1) {
            $segment = new Segment(56, 3);
            return $segment->PrintNumber($this->tslTopsheetTemplateDirectory);
        }
        return "";
    }

    public function setTslTopsheetTemplateDirectory(int $tslTopsheetTemplateDirectory): void
    {
        $this->tslTopsheetTemplateDirectory = $tslTopsheetTemplateDirectory;
    }

    public function getEditionName(): string
    {
        if ($this->editionName != "") {
            $segment = new Segment(20, 30);
            return $segment->Print($this->editionName);
        }
        return "";
    }

    public function setEditionName(string $editionName): void
    {
        $this->editionName = $editionName;
    }





}
<?php declare(strict_types=1);

namespace Jakoubek\Feragstring;

final class RouteInfo implements FeragMessage
{

    use AdditionalInfo;
    use ProductReferenceNumbers;
    use BundleParameter;

    protected Message $message;

    protected string $routeName = "";
    protected int $topsheetMarker = -1;
    protected string $subscriberAddressDefinition = "";
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
            $this->getBundleParameter(),
            $this->getTopsheetMarker(),
            $this->getSubscriberAddressDefinition(),
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
        return Segment::create(11, 13)
            ->IsNumeric(false)
            ->setData($this->routeName)
            ->Print();
    }

    public function setRouteName(string $routeName): void
    {
        $this->routeName = $routeName;
    }

    public function getTopsheetMarker(): string
    {
        return Segment::create(59, 1)
            ->setData($this->topsheetMarker)
            ->Print();
    }

    public function setTopsheetMarker(int $topsheetMarker): void
    {
        $this->topsheetMarker = $topsheetMarker;
    }

    public function getSubscriberAddressDefinition(): string
    {
        if ($this->subscriberAddressDefinition != "") {
            return Segment::create(91, 6)
                ->setData($this->subscriberAddressDefinition)
                ->Print();
        }
        return "";
    }

    public function setSubscriberAddressDefinition(string $subscriberAddressDefinition): void
    {
        $this->subscriberAddressDefinition = $subscriberAddressDefinition;
    }

    public function getEaAddressDefinition(): string
    {
        if ($this->eaAddressDefinition != -1) {
            return Segment::create(91, 6)
                ->setData($this->eaAddressDefinition)
                ->Print();
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
            return Segment::create(56, 3)
                ->setData($this->tslTopsheetTemplateDirectory)
                ->Print();
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
            return Segment::create(20, 30)
                ->setData($this->editionName)
                ->Print();
        }
        return "";
    }

    public function setEditionName(string $editionName): void
    {
        $this->editionName = $editionName;
    }





}
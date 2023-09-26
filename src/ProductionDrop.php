<?php declare(strict_types=1);

namespace Jakoubek\FeragstringPhp;

final class ProductionDrop implements FeragMessage
{

    use AdditionalInfo;
    use ProductReferenceNumbers;

    protected Message $message;

    protected string $agentName = "";
    protected int $numberOfCopies = -1;

    public function __construct()
    {
        $this->message = new Message("2403", "!");
    }

    private function payload(): array
    {
        return [
            $this->getAgentName(),
            $this->getNumberOfCopies(),
            $this->getAdditionalInfo(),
            $this->getProductReferenceNumbers(),
        ];
    }

    public function Message(): string
    {
        return $this->message->PrintOut($this->payload());
    }

    public function getAgentName(): string
    {
        if ($this->agentName != "") {
            $segment = new Segment(12, 10);
            return $segment->Print($this->agentName);
        }
        return "";
    }

    public function setAgentName(string $agentName): void
    {
        $this->agentName = $agentName;
    }

    public function getNumberOfCopies(): string
    {
        if ($this->numberOfCopies != -1) {
            $segment = new Segment(13, 5);
            return $segment->PrintNumber($this->numberOfCopies);
        }
        return "";
    }

    public function setNumberOfCopies(int $numberOfCopies): void
    {
        $this->numberOfCopies = $numberOfCopies;
    }



}
<?php declare(strict_types=1);

namespace Jakoubek\Feragstring;

final class ProductionDrop implements FeragMessage
{

    use AdditionalInfo;
    use ProductReferenceNumbers;

    protected Message $message;

    protected string $agentName = "";
    protected int $numberOfCopies = -1;
    protected string $topsheetData = "";

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
            return Segment::create(12, 10)
                ->setData($this->agentName)
                ->Print();
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
            return Segment::create(13, 5)
                ->setData($this->numberOfCopies)
                ->Print();
        }
        return "";
    }

    public function setNumberOfCopies(int $numberOfCopies): void
    {
        $this->numberOfCopies = $numberOfCopies;
    }

    public function getTopsheetData(): string
    {
        return $this->topsheetData;
    }

    public function setTopsheetData(string $topsheetData): void
    {
        $this->topsheetData = $topsheetData;
    }

    public function addLineToTopsheetData(mixed $line, int $lineLength = 60): void
    {
        mb_internal_encoding('utf8');
        $line = strval($line);
        if (mb_strlen($line) > $lineLength) {
            $line = mb_substr($line, 0, $lineLength);
        }
        $repeater = $lineLength - mb_strlen($line);
        $this->topsheetData .= $line . str_repeat(" ", $repeater);
    }

    public function hasTopsheetData(): bool
    {
        if (strlen($this->topsheetData) > 0) {
            return true;
        }
        return false;
    }

}
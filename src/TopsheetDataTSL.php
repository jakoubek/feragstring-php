<?php declare(strict_types=1);

namespace Jakoubek\Feragstring;

final class TopsheetDataTSL implements FeragMessage
{
    protected Message $message;

    protected string $restStdData = "";

    public function __construct()
    {
        $this->message = new Message("2414", "!");
    }

    private function payload(): array
    {
        return [
            $this->getRestStdData(),
        ];
    }

    public function Message(): string
    {
        return $this->message->PrintOut($this->payload());
    }

    public function getRestStdData(): string
    {
        if ($this->restStdData != "") {
            return Segment::create(58, 0, 5996)
                ->setData($this->restStdData)
                ->Print();
        }
        return "";
    }

    public function setRestStdData(string $restStdData): void
    {
        $this->restStdData = $restStdData;
    }

}
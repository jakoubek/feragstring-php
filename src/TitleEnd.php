<?php declare(strict_types=1);

namespace Jakoubek\FeragstringPhp;

final class TitleEnd implements FeragMessage
{

    protected Message $message;
    public string $titleName;

    public function __construct()
    {
        $this->message = new Message("2441", "!");
        $this->titleName = "";
    }

    private function payload(): array
    {
        return [
            $this->getTitleName(),
        ];
    }

    public function Message(): string
    {
        return $this->message->PrintOut($this->payload());
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



}
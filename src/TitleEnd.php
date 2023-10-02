<?php declare(strict_types=1);

namespace Jakoubek\Feragstring;

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
        return Segment::create(40, 8)
            ->setData($this->titleName)
            ->Print();
    }

    public function setTitleName(string $titleName): void
    {
        $this->titleName = $titleName;
    }



}
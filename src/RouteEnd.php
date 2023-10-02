<?php declare(strict_types=1);

namespace Jakoubek\FeragstringPhp;

final class RouteEnd implements FeragMessage
{
    protected Message $message;

    protected string $routeName = "";

    public function __construct()
    {
        $this->message = new Message("2406", "!");
    }

    private function payload(): array
    {
        return [
            $this->getRouteName(),
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

}
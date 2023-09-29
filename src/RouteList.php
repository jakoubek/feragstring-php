<?php declare(strict_types=1);

namespace Jakoubek\FeragstringPhp;

final class RouteList implements FeragMessage
{
    protected Message $message;

    protected string $routeName = "";
    protected int $routeCode = -1;
    protected int $rampNumber = -1;
    protected int $copiesInRoute = -1;

    public function __construct()
    {
        $this->message = new Message("2401", "!");
    }

    private function payload(): array
    {
        return [
            $this->getRouteName(),
            $this->getRouteCode(),
            $this->getRampNumber(),
            $this->getCopiesInRoute(),
        ];
    }

    public function Message(): string
    {
        return $this->message->PrintOut($this->payload());
    }

    public function getRouteName(): string
    {
        return Segment::create(11, 13)
            ->setData($this->routeName)
            ->Print();
    }

    public function setRouteName(string $routeName): void
    {
        $this->routeName = $routeName;
    }

    public function getRouteCode(): string
    {
        if ($this->routeCode != -1) {
            return Segment::create(79, 5)
                ->setData($this->routeCode)
                ->Print();
        }
        return "";
    }

    public function setRouteCode(int $routeCode): void
    {
        $this->routeCode = $routeCode;
    }

    public function getRampNumber(): string
    {
        if ($this->rampNumber != -1) {
            return Segment::create(25, 2)
                ->setData($this->rampNumber)
                ->Print();
        }
        return "";
    }

    public function setRampNumber(int $rampNumber): void
    {
        $this->rampNumber = $rampNumber;
    }

    public function getCopiesInRoute(): string
    {
        if ($this->copiesInRoute != -1) {
            return Segment::create(23, 6)
                ->setData($this->copiesInRoute)
                ->Print();
        }
        return "";
    }

    public function setCopiesInRoute(int $copiesInRoute): void
    {
        $this->copiesInRoute = $copiesInRoute;
    }

}
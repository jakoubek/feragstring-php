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
        $segment = new Segment(11, 13);
        return $segment->Print($this->routeName);
    }

    public function setRouteName(string $routeName): void
    {
        $this->routeName = $routeName;
    }

    public function getRouteCode(): string
    {
        if ($this->routeCode != -1) {
            $segment = new Segment(79, 5);
            return $segment->PrintNumber($this->routeCode);
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
            $segment = new Segment(25, 2);
            return $segment->PrintNumber($this->rampNumber);
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
            $segment = new Segment(23, 6);
            return $segment->PrintNumber($this->copiesInRoute);
        }
        return "";
    }

    public function setCopiesInRoute(int $copiesInRoute): void
    {
        $this->copiesInRoute = $copiesInRoute;
    }

}
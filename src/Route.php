<?php declare(strict_types=1);

namespace Jakoubek\FeragstringPhp;

final class Route
{

    protected string $routeName = "";
    protected int $routeCode = -1;
    protected int $rampNumber = -1;
    protected int $copiesInRoute = -1;
    public array $productionDrops = [];

    public function __construct()
    {
    }

    public function getRouteListEntry(): string
    {
        $rl = new RouteList();
        $rl->setRouteName($this->routeName);
        $rl->setRouteCode($this->routeCode);
        $rl->setRampNumber($this->rampNumber);
        $rl->setCopiesInRoute($this->copiesInRoute);
        return $rl->Message();
    }

    public function getRouteDataEntry(): string
    {
        $info = [];

        $ri = new RouteInfo();
        $ri->setRouteName($this->getRouteName());
        $ri->setTopsheetMarker(1);
        $info[] = $ri->Message();

        // jetzt alle Production Drops
        foreach ($this->productionDrops as $pd) {
            $info[] = $pd->Message();
        }

        $re = new RouteEnd();
        $re->setRouteName($this->getRouteName());
        $info[] = $re->Message();

        return implode('', $info);
    }

    public function getRouteName(): string
    {
        return $this->routeName;
    }

    public function setRouteName(string $routeName): void
    {
        $this->routeName = $routeName;
    }

    public function getRouteCode(): int
    {
        return $this->routeCode;
    }

    public function setRouteCode(int $routeCode): void
    {
        $this->routeCode = $routeCode;
    }

    public function getRampNumber(): int
    {
        return $this->rampNumber;
    }

    public function setRampNumber(int $rampNumber): void
    {
        $this->rampNumber = $rampNumber;
    }

    public function getCopiesInRoute(): int
    {
        return $this->copiesInRoute;
    }

    public function setCopiesInRoute(int $copiesInRoute): void
    {
        $this->copiesInRoute = $copiesInRoute;
    }

    public function addProductionDrop(ProductionDrop $pd): void
    {
        $this->productionDrops[] = $pd;
    }

}
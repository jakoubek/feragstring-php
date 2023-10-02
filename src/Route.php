<?php declare(strict_types=1);

namespace Jakoubek\Feragstring;

final class Route
{

    protected string $routeName = "";
    protected int $routeCode = -1;
    protected int $rampNumber = -1;
    protected int $copiesInRoute = -1;
    protected int $topsheetMarker = -1;
    protected string $subscriberAddressDefinition = "";
    protected int $tslTopsheetTemplateDirectory = -1;
    protected string $editionName = "";
    protected int $limit = -1;
    protected int $maxStack = -1;
    protected int $std = -1;
    protected int $n = -1;
    protected int $maxBundle = -1;
    protected bool $enableBundleParameters = false;
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
        $ri->setTopsheetMarker($this->getTopsheetMarker());
        $ri->setSubscriberAddressDefinition($this->getSubscriberAddressDefinition());
        $ri->setTslTopsheetTemplateDirectory($this->getTslTopsheetTemplateDirectory());
        $ri->setEditionName($this->getEditionName());

        $ri->setLimit($this->getLimit());
        $ri->setMaxStack($this->getMaxStack());
        $ri->setStd($this->getStd());
        $ri->setN($this->getN());
        $ri->setMaxBundle($this->getMaxBundle());
        $ri->enabled = $this->enableBundleParameters;

        $info[] = $ri->Message();

        // jetzt alle Production Drops
        foreach ($this->productionDrops as $pd) {
            $info[] = $pd->Message();
            // falls Production Drop Topsheet Data hat
            if ($pd->hasTopsheetData()) {
                $tsd = new TopsheetDataTSL();
                $tsd->setRestStdData($pd->getTopsheetData());
                $info[] = $tsd->Message();
            }
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

    public function getTopsheetMarker(): int
    {
        return $this->topsheetMarker;
    }

    public function setTopsheetMarker(int $topsheetMarker): void
    {
        $this->topsheetMarker = $topsheetMarker;
    }

    public function getSubscriberAddressDefinition(): string
    {
        return $this->subscriberAddressDefinition;
    }

    public function setSubscriberAddressDefinition(string $subscriberAddressDefinition): void
    {
        $this->subscriberAddressDefinition = $subscriberAddressDefinition;
    }

    public function getTslTopsheetTemplateDirectory(): int
    {
        return $this->tslTopsheetTemplateDirectory;
    }

    public function setTslTopsheetTemplateDirectory(int $tslTopsheetTemplateDirectory): void
    {
        $this->tslTopsheetTemplateDirectory = $tslTopsheetTemplateDirectory;
    }

    public function getEditionName(): string
    {
        return $this->editionName;
    }

    public function setEditionName(string $editionName): void
    {
        $this->editionName = $editionName;
    }

    public function enableBundleParameters(): void
    {
        $this->enableBundleParameters = true;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    public function getMaxStack(): int
    {
        return $this->maxStack;
    }

    public function setMaxStack(int $maxStack): void
    {
        $this->maxStack = $maxStack;
    }

    public function getStd(): int
    {
        return $this->std;
    }

    public function setStd(int $std): void
    {
        $this->std = $std;
    }

    public function getN(): int
    {
        return $this->n;
    }

    public function setN(int $n): void
    {
        $this->n = $n;
    }

    public function getMaxBundle(): int
    {
        return $this->maxBundle;
    }

    public function setMaxBundle(int $maxBundle): void
    {
        $this->maxBundle = $maxBundle;
    }

    public function addProductionDrop(ProductionDrop $pd): void
    {
        $this->productionDrops[] = $pd;
    }

}
<?php declare(strict_types=1);

namespace Jakoubek\Feragstring;

final class Feragstring
{

    public TitleInfo $titleInfo;
    public TitleEnd $titleEnd;
    public array $productReferences = [];
    public array $routes = [];

    public function __construct()
    {
        $this->titleInfo = new TitleInfo();
        $this->titleEnd = new TitleEnd();
    }

    private function payload(): array
    {
        return [
            $this->titleInfo->Message(),
            $this->getProductReferences(),
            $this->getRouteList(),
            $this->getRouteData(),
            $this->titleEnd->Message(),
        ];
    }

    public function PrintOut(): string
    {
        return implode('', $this->payload());
    }

    public function SetTitleName(string $titleName): void
    {
        $this->titleInfo->setTitleName($titleName);
        $this->titleEnd->setTitleName($titleName);
    }

    public function getProductReferences(): string
    {
        if (count($this->productReferences) > 0) {
            $productReferences = "";
            foreach ($this->productReferences as $pr) {
                $productReferences .= $pr->Message();
            }
            return $productReferences;
        }
        return "";
    }

    public function getRouteList(): string
    {
        if (count($this->routes) > 0) {
            $routes = "";
            foreach ($this->routes as $rt) {
                $routes .= $rt->getRouteListEntry();
            }
            return $routes;
        }
        return "";
    }

    public function getRouteData(): string
    {
        if (count($this->routes) > 0) {
            $routeData = "";
            foreach ($this->routes as $rt) {
                $routeData .= $rt->getRouteDataEntry();
            }
            return $routeData;
        }
        return "";
    }

    public function addProductReference(ProductReference $pr): void
    {
        $this->productReferences[] = $pr;
    }

    public function addRoute(Route $rt): void
    {
        $this->routes[] = $rt;
    }

}
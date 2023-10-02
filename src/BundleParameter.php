<?php declare(strict_types=1);

namespace Jakoubek\Feragstring;

trait BundleParameter
{

    public bool $enabled = false;
    protected int $limit = -1;
    protected int $maxStack = -1;
    protected int $std = -1;
    protected int $n = -1;
    protected int $maxBundle = -1;
    protected int $sz = 0;

    public function getBundleParameter(): string
    {
        $allParameters = "";
        if ($this->enabled) {
            $allParameters = $this->getLimit() .
                $this->getMaxStack() .
                $this->getStd() .
                $this->getN() .
                $this->getMaxBundle() .
                $this->getSz();
        }
        return $allParameters;
    }

    public function getLimit(): string
    {
        if ($this->limit != -1) {
            return Segment::create(30, 4)
                ->setData($this->limit)
                ->Print();
        }
        return "";
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    public function getMaxStack(): string
    {
        if ($this->maxStack != -1) {
            return Segment::create(31, 4)
                ->setData($this->maxStack)
                ->Print();
        }
        return "";
    }

    public function setMaxStack(int $maxStack): void
    {
        $this->maxStack = $maxStack;
    }

    public function getStd(): string
    {
        if ($this->std != -1) {
            return Segment::create(32, 4)
                ->setData($this->std)
                ->Print();
        }
        return "";
    }

    public function setStd(int $std): void
    {
        $this->std = $std;
    }

    public function getN(): string
    {
        if ($this->n != -1) {
            return Segment::create(33, 4)
                ->setData($this->n)
                ->Print();
        }
        return "";
    }

    public function setN(int $n): void
    {
        $this->n = $n;
    }

    public function getMaxBundle(): string
    {
        if ($this->maxBundle != -1) {
            return Segment::create(34, 4)
                ->setData($this->maxBundle)
                ->Print();
        }
        return "";
    }

    public function setMaxBundle(int $maxBundle): void
    {
        $this->maxBundle = $maxBundle;
    }

    public function getSz(): string
    {
        if ($this->sz != -1) {
            return Segment::create(35, 4)
                ->setData($this->sz)
                ->Print();
        }
        return "";
    }

    public function setSz(int $sz): void
    {
        $this->sz = $sz;
    }


}
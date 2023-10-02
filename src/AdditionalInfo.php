<?php declare(strict_types=1);

namespace Jakoubek\Feragstring;

trait AdditionalInfo
{
    protected string $additionalInfo = "";

    public function getAdditionalInfo(): string
    {
        if ($this->additionalInfo != "") {
            $segment = new Segment(8, 50);
            return $segment->Print($this->additionalInfo);
        }
        return "";
    }

    public function setAdditionalInfo(string $additionalInfo): void
    {
        $this->additionalInfo = $additionalInfo;
    }

}
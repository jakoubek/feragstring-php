<?php declare(strict_types=1);

namespace Jakoubek\FeragstringPhp;

final class Segment
{
    protected string $segmentStart = '+';
    protected int $segmentNumber;
    protected int $maxLength;

    /**
     * @param int $segmentNumber
     */
    public function __construct(int $segmentNumber, int $maxLength = 0)
    {
        $this->segmentNumber = $segmentNumber;
        $this->maxLength = $maxLength;
    }

    public function Print($data): string
    {
        $format = "%s%02d%s";
        if ($this->maxLength > 0) {
            $format = "%s%02d%." . $this->maxLength . "s";
        }
        return sprintf($format, $this->segmentStart, $this->segmentNumber, $data);
    }

    public function PrintNumber(int $data): string
    {
        $format = "%s%02d%s";
        if ($this->maxLength > 0) {
            $format = "%s%02d%0" . $this->maxLength . "d";
        }
        return sprintf($format, $this->segmentStart, $this->segmentNumber, $data);
    }

}
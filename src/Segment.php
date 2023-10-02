<?php declare(strict_types=1);

namespace Jakoubek\Feragstring;

final class Segment
{
    protected string $segmentStart = '+';
    protected int $segmentNumber;
    protected int $fixLength;
    protected int $variableLength;
    protected bool $isNumeric = true;
    protected mixed $data;
    protected string $segmentHeader;
    protected int $lengthSpecification = 0;

    /**
     * @param int $segmentNumber
     */
    public function __construct(int $segmentNumber, int $fixLength = 0, int $variableLength = 0)
    {
        $this->segmentNumber = $segmentNumber;
        $this->fixLength = $fixLength;
        $this->variableLength = $variableLength;

        $this->segmentHeader = sprintf("%s%02d", $this->segmentStart, $this->segmentNumber);

        return $this;
    }

    public static function create(int $segmentNumber, int $fixLength = 0, int $variableLength = 0): Segment
    {
        return new self($segmentNumber, $fixLength, $variableLength);
    }

    public function IsNumeric(bool $isNumeric = true): Segment
    {
        $this->isNumeric = $isNumeric;
        return $this;
    }

    public function setData(mixed $data): Segment
    {
        //mb_internal_encoding('Windows-1252');
        if (is_numeric($data) && $this->isNumeric) {
            $this->data = str_pad(strval($data), $this->fixLength, "0", STR_PAD_LEFT);
        } else {
            if ($this->fixLength > 0) {
                $repeater = $this->fixLength - mb_strlen($data);
                /*if ($this->segmentNumber == 42) {
                    print "data: " . $data . " - repeater: " . $repeater . "\n";
                }*/
                $this->data = $data . str_repeat(" ", $repeater);
                $this->data = mb_substr($this->data, 0, $this->fixLength);
            } elseif ($this->variableLength > 0) {
                $this->data = $data;
            }
        }

        if ($this->variableLength > 0) {
            $this->lengthSpecification = mb_strlen($this->data, 'utf8') + 4;
            $this->segmentHeader = $this->segmentHeader . str_pad(strval($this->lengthSpecification), 4, "0", STR_PAD_LEFT);
        }

        return $this;
    }

    public function Print(): string
    {
        return $this->segmentHeader . $this->data;
    }

    public function PrintStringAlt($data): string
    {
        $format = "%s%02d%s";
        $value = sprintf($format, $this->segmentStart, $this->segmentNumber, $data);
        if ($this->fixLength > 0) {
            $value = str_pad($value, $this->fixLength);
        }
        return $value;
    }

    public function PrintNumberAlt(int $data): string
    {
        $format = "%s%02d%s";
        if ($this->fixLength > 0) {
            $format = "%s%02d%0" . $this->fixLength . "d";
        }
        return sprintf($format, $this->segmentStart, $this->segmentNumber, $data);
    }

}
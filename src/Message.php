<?php declare(strict_types=1);

namespace Jakoubek\Feragstring;

final class Message
{

    protected string $messageStart;
    protected string $messageEnd;

    public function __construct(string $messageStart, string $messageEnd)
    {
        $this->messageStart = $messageStart;
        $this->messageEnd = $messageEnd;
    }

    public function PrintOut(array $payload): string
    {
        $message = sprintf("%%%s", $this->messageStart);
        foreach ($payload as $element) {
            $message .= $element;
        }
        $message .= sprintf("%s\n", $this->messageEnd);

        return $message;
    }

}
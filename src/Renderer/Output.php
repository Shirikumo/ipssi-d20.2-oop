<?php

declare(strict_types=1);

namespace App\Renderer;

final class Output
{
    private $lines = [];

    public function writeLine(string $line): void
    {
        $this->lines[] = $line;
    }

    public function getAndFlush(): string
    {
        $lines = $this->lines;
        $this->lines = [];
        return implode("\n", $lines);
    }
}
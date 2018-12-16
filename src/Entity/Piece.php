<?php
/**
 * Created by PhpStorm.
 * User: shiri
 * Date: 16/12/18
 * Time: 21:30
 */

declare(strict_types=1);

namespace App\Entity;

final class Piece
{
    private const YELLOW = 'jaune';
    private const RED = 'rouge';
    private $color;
    private function __construct(string $color)
    {
        $this->color = $color;
    }
    public function __toString(): string
    {
        return $this->color;
    }
    public static function createYellow(): Piece
    {
        return new self(self::YELLOW);
    }
    public static function createRed(): Piece
    {
        return new self(self::RED);
    }
}
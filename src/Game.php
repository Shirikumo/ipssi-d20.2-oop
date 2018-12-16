<?php
/**
 * Created by PhpStorm.
 * User: shiri
 * Date: 16/12/18
 * Time: 23:18
 */

declare(strict_types=1);

namespace App;

interface Game
{
    public static function playersFactory(int $numberOfPlayers): array;
}
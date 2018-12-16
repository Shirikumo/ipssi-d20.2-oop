<?php
/**
 * Created by PhpStorm.
 * User: shiri
 * Date: 16/12/18
 * Time: 21:47
 */

declare(strict_types=1);

namespace App\Exception;

use RuntimeException;

final class TooManyPlayers extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Le nombre de joueur doit être pair. Exclusion du dernier joueur ...');
    }
}
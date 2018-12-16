<?php
/**
 * Created by PhpStorm.
 * User: shiri
 * Date: 16/12/18
 * Time: 22:39
 */

declare(strict_types=1);

namespace App\Exception;

use RuntimeException;

final class EnoughParticipants extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Le nombre de joueur doit être d\'au minimum 2 joueurs.');
    }
}
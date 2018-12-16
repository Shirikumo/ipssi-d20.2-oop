<?php
/**
 * Created by PhpStorm.
 * User: shiri
 * Date: 16/12/18
 * Time: 21:37
 */

declare(strict_types=1);

namespace App\Entity;


final class Player implements Participant
{
    private $id;
    public function __construct(int $id)
    {
        $this->id = $id;
    }
    public function id(): int
    {
        return $this->id;
    }
}
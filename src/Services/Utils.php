<?php

namespace App\Services;

use App\Entity\PostEntity;
use App\Entity\CommentEntity;
use App\Repository\UsersRepository;
use Symfony\Component\Form\FormInterface;
use App\Repository\CommentEntityRepository;

class Utils
{
    private $users;

    public function __construct(UsersRepository $users)
    {
        $this->users = $users;
    }

    public function updateRole($role): array
    {
        $ret = [];
        switch ($role) {
            case 'user':
                $ret[] = 'ROLE_USER';
                break;
            case 'admin':
                $ret = ['ROLE_USER', 'ROLE_ADMIN'];
                break;
            default:
                $ret[] = 'ROLE_USER';
                break;
        }
        return $ret;
    }
}

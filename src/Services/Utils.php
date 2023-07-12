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
    
    // public function addNewCom(CommentEntityRepository $coms, FormInterface $formI, String $name = null, PostEntity $post) {
    //     $com = new CommentEntity();
    //         $com = $this->formI->getData();
    //         dd($com);
    //         $user = $this->users->findby(["name"=>$name]);
    //         $com->setAuthor($user);
    //         $com->setPost($post);
            
    //         $com->setCreatedAt();
    //         $em = $this->_this->getDoctrine()->getManager();
    //         $em->persist($com);
    //         $em->flush();
            
    //         $mess = $name. 'à ajouter un commentaire.';
    //         return ["mess" => $mess,"com" => $coms, "form" => $formI ];
    // }

    public function updateRole($role): array
    {
        $ret=[];
        switch ($role) {
            case 'user':
                $ret[] = 'ROLE_USER';
                break;
            case 'admin':
                $ret = ['ROLE_USER', 'ROLE_ADMIN'];
                break;
            case 'redactor':
                $ret = ['ROLE_USER', 'ROLE_REDACTOR'];
                break;
            default:
                $ret[] = 'ROLE_USER';
                break;
        }
        return $ret;
    }
}

<?php

namespace AppBundle\Repository;

/**
 * NoteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NoteRepository extends \Doctrine\ORM\EntityRepository
{

    public function search($request)
    {

        $er=$this->createQueryBuilder('c');

        $check=0;
        if($request->get('etudiant')!=-1)
        {
            $check=1;
         $er->leftJoin('c.users','user')
             ->where('user.id=:id')
             ->setParameter('id',$request->get('etudiant'));
        }

        if($request->get('matiere')!=-1)
        {
            if($check==1)
            {
                $er->leftJoin('c.matiere','matiere')
                    ->andwhere('matiere.id=:id')
                    ->setParameter('id',$request->get('matiere'));
            }
            else
            {
                $er->leftJoin('c.matiere','matiere')
                    ->where('matiere.id=:id')
                    ->setParameter('id',$request->get('matiere'));
            }

        }
        return $er->getQuery()->getResult();

    }
}

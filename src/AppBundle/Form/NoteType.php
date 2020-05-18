<?php

namespace AppBundle\Form;

use AppBundle\Entity\Matiere;
use AppBundle\Entity\User;
use AppBundle\Repository\UserRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoteType extends AbstractType
{



    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('noteDs',NumberType::class,array( 'attr' => array('class' => 'form-control','required' => true)))
            ->add('noteExamen',NumberType::class,array( 'attr' => array('class' => 'form-control','required' => true)))
        ->add('matiere',EntityType::class,[ 'label'=>'Liste des matiere',
            'class'=>Matiere::class,
            'placeholder' => 'Sélectionner une matiere',
            'choice_label' => 'nom',
            'multiple'=>false])

            ->add('users',EntityType::class,
                [
                    'class' => User::class,
                   /* 'query_builder' => function (EntityRepository $er) {
                        $ch='ROLE_USERS';
                        return $er->createQueryBuilder('u')
                            ->where('u.roles IN (:r)')->setParameter('r',array('%'.$ch.'%'));*/
                    /*},*/
                    'choice_label' => 'username',
                ])

        ->add('envoyer',SubmitType::class,array( 'attr' => array('class' => 'btn btn-primary','required' => true)));

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Note'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_note';
    }
}

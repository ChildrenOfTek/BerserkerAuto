<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use TeamBundle\Entity\Team;
use UserBundle\Entity\Role;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login','text',array('label'=>'Nom d\'utilisateur'))
            ->add('password','password',array('label'=>'Mot de passe'))
            ->add('salt','hidden')
            ->add('nom')
            ->add('prenom')
            ->add('birthDate', 'birthday',array('format'=>'dd-MM-yyyy','label'=>'Date de naissance'))
            ->add('userRoles','hidden')
            ->add('team',EntityType::class,array('class'=>'TeamBundle:Team','property'=>'nom'))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserBundle\Entity\User'
        ));
    }
}

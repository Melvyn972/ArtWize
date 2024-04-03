<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'label' => 'Mot de passe',
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez votre mots de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit faire au minimum {{ limit }} characterès',
                        'max' => 40,
                    ]),
                ],
            ])
            ->add('roles', ChoiceType::class, [
                'mapped' => false,
                'choices' => [
                    'Utilisateur' => 'ROLE_USER',
                ],
                'multiple' => true,
                'expanded' => true,
                'label' => 'Vous êtes:',
                'required' => true,
            ])
            ->add('name', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('fname', TextType::class, [
                'label' => 'Prénom',
            ])
            ->add('tel', IntegerType::class, [
                'label' => 'Téléphone',
            ])
            ->add('numero_de_voie', IntegerType::class, [
                'label' => 'Numéro de voie',
            ])
            ->add('nom_de_voie', TextType::class, [
                'label' => 'Nom de voie',
            ])
            ->add('code_postal', IntegerType::class, [
                'label' => 'Code postal',
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Accepter les termes',
                'constraints' => [
                    new IsTrue([
                        'message' => 'Accepter les termes',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\ValueObject\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $formTypeOptions = [
            'row_attr' => ['class' => 'mb-3'],
            'label_attr' => ['class' => 'col-form-label'],
            'attr' => ['class' => 'form-control']
        ];

        $builder
            ->add('name', TextType::class, $formTypeOptions)
            ->add('email', TextType::class, $formTypeOptions)
            ->add('subject', TextType::class, $formTypeOptions)
            ->add('message', TextareaType::class, $formTypeOptions)
            ->add('button', ButtonType::class, [
                    'attr' => ['data-bs-dismiss' => 'modal'],
                    'row_attr' => ['class' => 'w-25 d-inline-block'],
                    'label' => 'Close',
                ]
//                queste classi le avevo passate a mano
//                posso utilizzare il form_theme di bootstrap settandolo nel file twig.yaml
//                [
//                'attr' => ['class' => 'btn btn-secondary', 'data-bs-dismiss'=>'modal'],
//                'label' => 'Close',
//                'row_attr' => ['class' => 'w-25 d-inline-block']
//            ]
            )
            ->add('submit', SubmitType::class, [
//                'attr' => ['class' => 'btn btn-primary'],
                'label' => 'Send message',
                'row_attr' => ['class' => 'w-50 d-inline-block'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactForm::class,
        ]);
    }
}

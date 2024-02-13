<?php

namespace App\Form;

use App\ValueObject\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
//        $formTypeOptions = [
//            'required' => false,
//            'row_attr' => ['class' => 'mb-3'],
////            'label_attr' => ['class' => 'col-form-label'],
////            'attr' => ['class' => 'form-control']
//            'constraints' => [new NotBlank(['message' => 'ciao'])]
//        ];

        $builder
            ->add('name', TextType::class, [
                'required' => false,
                'row_attr' => ['class' => 'mb-3'],
//            'label_attr' => ['class' => 'col-form-label'],
//            'attr' => ['class' => 'form-control']
                'constraints' => [new NotBlank(['message' => 'Name is mandatory'])]
            ])
            // se utilizzo EmailType non mi vede i constraints
            // i constraints o li definisco qui nel formtype o nella classe come attributo
            //  es. #[Assert\Email()]
            // https://symfony.com/doc/6.4/validation.html#installation
            ->add('email', TextType::class, [
                'required' => false,
                'row_attr' => ['class' => 'mb-3'],
//            'label_attr' => ['class' => 'col-form-label'],
//            'attr' => ['class' => 'form-control']
                'constraints' => [new NotBlank(['message' => 'Email is mandatory']), new Email()]
            ])
            ->add('subject', TextType::class, [
                'required' => false,
                'row_attr' => ['class' => 'mb-3'],
//            'label_attr' => ['class' => 'col-form-label'],
//            'attr' => ['class' => 'form-control']
                'constraints' => [new NotBlank(['message' => 'Subject is mandatory'])]
            ])
            ->add('message', TextareaType::class, [
                'required' => false,
                'row_attr' => ['class' => 'mb-3'],
//            'label_attr' => ['class' => 'col-form-label'],
//            'attr' => ['class' => 'form-control']
                'constraints' => [new NotBlank(['message' => 'Message is mandatory'])]
            ])
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

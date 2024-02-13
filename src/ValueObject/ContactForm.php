<?php

namespace App\ValueObject;

use Symfony\Component\Validator\Constraints as Assert;

class ContactForm
{
//    #[Assert\NotBlank(['message' => 'Name is mandatory'])]
//    #[Assert\Email(['message' => 'diocan'])]
    public string $name;
    public string $email;
    public string $subject;
    public string $message;
}
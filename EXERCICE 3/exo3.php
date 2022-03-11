<?php

class Mailer
{
}

class SendWelcomeMessage
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
}

//////////////////////////////////////////
/////////////// Mailer ///////////////////
//////////////////////////////////////////


interface IMailer
{
    public function sendMail();
}

class Mailer implements IMailer
{

    private $mailer;

    public function sendMail()
    {
        echo 'Salut';
    }
}

class SendWelcomeMessage
{
    public function __construct(IMailer $mailer)
    {
        $mailer->sendMail();
    }
}

$mailer = new Mailer;
$welcomeMail = new SendWelcomeMessage($mailer);

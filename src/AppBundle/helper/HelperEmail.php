<?php

namespace AppBundle\helper;

use Doctrine\ORM\EntityManager;

/**
 * Description of AppointmentHelper
 */
class HelperEmail
{

    private $em;
    private $mailer;


    public function __construct(EntityManager $entityManager,$mailer=null)
    {
        $this->em = $entityManager;
        $this->mailer=$mailer;

    }


    public function sendEmail($subject,$to,$content)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom('no-reply@it-shool.fr')
            ->setTo(trim($to,' '))
            ->setBody($content,'text/html');

        $this->mailer->send($message);
    }

}

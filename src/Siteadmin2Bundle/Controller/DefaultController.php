<?php

namespace Siteadmin2Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('Siteadmin2Bundle:Default:index.html.twig');
    }

    public function redirectionAction()
    {
        return $this->render('Siteadmin2Bundle:Default:FormMail.html.twig');
    }

    public function sendMailAction()
    {
        $request = $this->getRequest();
        if ($request->getMethod() == "POST") {
            $subject = $request->get("subject");
            $email = $request->get("email");
            $message = $request->get("message");

            $message =  \Swift_Message::newInstance('test')
                ->setSubject($subject)
                ->setFrom('wcsludovic1966@laposte.net')
                ->setTo($email)
                ->setBody($message);
            $this->get('mailer')->send($message);

            return $this->render('Siteadmin2Bundle:Default:MailEnvoye.html.twig');
        }

        return $this->render('Siteadmin2Bundle:Default:FormMail.html.twig');
    }

    public function MailEnvoyeAction()
    {
        $request = $this->getRequest();
        if ($request->getMethod() == "submit") {
            return $this->render('Siteadmin2Bundle:Default:FormMail.html.twig');
        }
        
        return $this->render('Siteadmin2Bundle:Default:MailEnvoye.html.twig');
    }
}

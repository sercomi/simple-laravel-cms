<?php namespace CMS\Repositories;

use Mail;

/**
*  Contact Form Repository
*/
class ContactRepository implements ContactRepositoryInterface
{
    protected $listener;
    protected $validator;

    public function __construct($listener)
    {
        $this->listener = $listener;
        $this->validator = \App::make('\CMS\Validators\ContactValidator');
    }

    public function send($data)
    {
        if ( ! $this->validator->isValid($data)) {
            return $this->listener->saveFails($this->validator->getErrors());
        }

        //If Queue is configured, replace Mail::send with Mail::queue
        Mail::send('emails.contact', ['data' => $data], function($message)
        {
            $message->to(\Config::get('alvl.email.contact'),
                         \Config::get('alvl.email.contactname'))
                    ->subject( trans('contact.mail.subject') );
        });

        return $this->listener->creationSucceeds();
    }
}

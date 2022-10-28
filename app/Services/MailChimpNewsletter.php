<?php 

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailChimpNewsletter implements Newsletter
{

    protected ApiClient $client;

    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }

    public function subscribe(string $email, string $list = null)
    {

        $list ??= config('services.mailchimp.lists.subscribers');

        //$response = $mailchimp->lists->getAllLists();
        // $response = $mailchimp->lists->getList('93659e24b4');
        // $response = $mailchimp->lists->getListMembersInfo('93659e24b4');

        return $this->client->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }

}
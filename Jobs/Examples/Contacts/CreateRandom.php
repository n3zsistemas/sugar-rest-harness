<?php
/*
 * Copyright (c) 2015 SugarCRM Inc. Licensed by SugarCRM under the Apache 2.0 license.
 */
namespace SugarRestHarness\Jobs\Examples\Contacts;

class CreateRandom extends \SugarRestHarness\JobAbstract implements \SugarRestHarness\JobInterface
{
    public function __construct($options)
    {
        $firstName = $this->randomize('PersonName', array('type'=>'first'));
        $lastName = $this->randomize('PersonName', array('type'=>'last'));
        $this->config['routeMap'] = 'createRecord';
        $this->config['module'] = 'Contacts';
        $this->config['post'] = array(
            'title' => $this->randomize('Title'),
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email1' => strtolower("{$firstName}.{$lastName}@sugarcrm.com"),
            'phone_work' => $this->randomize('PhoneNumber'),
            'phone_mobile' => $this->randomize('PhoneNumber'),
            'phone_fax' => $this->randomize('PhoneNumber'),
            'primary_address_street' => $this->randomize('StreetAddress'),
            'primary_address_city' => $this->randomize('City'),
            'primary_address_state' => $this->randomize('AppListString', array('key' => 'state_dom')),
            'primary_address_postalcode' => $this->randomize('Number', array('min'=>10000, 'max'=>99999)),
            'primary_address_country' => 'US',
            'account_id' => $this->randomize('Bean', array('module'=>'Accounts', 'field'=>'id')),
            'assigned_user_id' => $this->getMyId(),
        );
        parent::__construct($options);
    }
}
    
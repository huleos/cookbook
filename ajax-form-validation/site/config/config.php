<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'put your license key here');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

// set routes for ajax form validation and adding entry to structure field
c::set('routes', array(
  array(
    'pattern' => '(:all)/api/form/validate',
    'method' => 'POST',
    'action' => function($uri) {
      $data = kirby()->request()->data();
      $response = validateForm($data);

      if(kirby()->request()->ajax()) {
        return response::json($response);
      }
    }
  ),
  array(
    'pattern' => '(:all)/api/page/append',
    'method' => 'POST',
    'action' => function($uri) {

      if(kirby()->request()->ajax()) {
        $input = kirby()->request()->data();
        $response = array();
        $data = array(
          'firstname'  => esc($input['firstname']),
          'lastname'  => esc($input['lastname']),
          'company'  => esc($input['company']),
          'email' => $input['email'],
          'message'  => esc($input['message'])
        );
        $response = addToStructure(page($uri)->find('registrations'), 'registrations', $data);
        f::write(kirby()->roots()->content() . DS . 'message.txt', $response);
        return response::json($response);

      }
    }
  ),
));

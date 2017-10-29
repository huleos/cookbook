<?php

return function($site, $pages, $page) {

  // check if request is a POST request
  if(r::is('POST')) {
    $data = r::data();

    // call validateForm() with $data as parameter
    $response = validateForm($data);

    // if form validation succeeds, we try to add the data to the structure field
    if(isset($response['success'])) {
      $response = addToStructure($page, 'registrations', $data);
    }

  }

  return compact('response', 'data');
};

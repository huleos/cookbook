<?php

//validate post request data
function validateForm($data) {

  // declare variables
  $errors = array();
  $redirect = false;
  $success = false;

  // if the honeypot is filled out, set $redirect to true
  if(! empty($data['website'])) {
    $redirect = true;
  }

  // array of validation rules
  $rules = array(
    'firstname'  => array('required'),
    'lastname'  => array('required'),
    'email' => array('required', 'email'),
  );

  // array of error messages
  $messages = array(
    'firstname'  => 'Please enter your first name',
    'lastname'  => 'Please enter your last name',
    'email' => 'Please enter a valid email address',
  );

  // validate data using the invalid function
  if($invalid = invalid($data, $rules, $messages)) {
    $errors = $invalid;

    // else set $success to true
  } else {
    $success = true;
  }

  // store validation results in $message array
  $message = array(
    'errors' => $errors,
    'redirect' => $redirect,
    'success' => $success
  );

  return $message;
}

// add user input to structure field
function addToStructure($p, $field, $data = array()){
  $message = array();

  try {
    $fieldData = $p->$field()->yaml();
    $fieldData[] = $data;
    $fieldData = yaml::encode($fieldData);
    $p->update(array(
      $field => $fieldData,
    ));

    $message['success'] = "Your registration was successful";

  } catch(Exception $e) {

    $message['error'] = 'Your registration failed/' . $e->getMessage();

  }

  return $message;
}

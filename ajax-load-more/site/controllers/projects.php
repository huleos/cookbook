<?php

return function($site, $pages, $page) {

  $projects = $page->children()->visible();
  $count    = $projects->count();

  // check if the request is an Ajax request and if the limit and offset keys are set
  if(r::ajax() && get('offset') && get('limit')) {

    // convert limit and offset values to integer
    $offset = intval(get('offset'));
    $limit  = intval(get('limit'));

    // limit projects using offset and limit values
    $projects = $projects->offset($offset)->limit($limit);

    // check if there are more projects left
    $more = $count > $offset + 1;

  // otherwise set the number of projects initially displayed
  } else {

    $offset   = 0;
    $limit    = 2;
    $projects = $projects->limit($limit);

  }

  return compact('offset', 'limit', 'projects', 'more');

};

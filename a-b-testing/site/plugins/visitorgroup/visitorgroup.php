<?php

function visitorgroup($which = null) {

  $ip    = visitor::ip();
  $int   = ip2long($ip);
  $group = ($int % 2) ? 'a' : 'b';

  if(is_null($which)) return $group;

  return $group == $which;
}

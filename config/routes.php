<?php

 return array(
     'about' => 'about/index',
     'teacher/([a-z,а-я,0-9,-,.,\']+)' => 'teacher/index/$1',
     //'teacher/([.,\p{Cyrillic}]+)' => 'teacher/index/$1',
     'building/([0-9]+)' => 'building/index/$1',
     'feedback' => 'feedback/index',
     'success' => 'success/index',
     '' => 'main/main'
 );
<?php 
use Roots\Sage\Titles; 
if(get_field('titolo')!='') : the_field('titolo'); else  : ?><?= Titles\title(); endif; ?>
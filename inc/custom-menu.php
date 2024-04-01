<?php
/**
 * Bēsu navigation menu functionality using Navi composer package by Log1x
 *
 * @link https://github.com/Log1x/navi/blob/master/README.md
 *
 * @package https://github.com/Log1x/navi
 */

 use Log1x\Navi\Navi;

$navigation = Navi::make()->build('menu-1');

if ($navigation->isEmpty()) {
  return;
}

return $navigation->toArray();






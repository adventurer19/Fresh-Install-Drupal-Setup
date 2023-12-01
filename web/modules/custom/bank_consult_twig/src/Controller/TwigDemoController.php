<?php

namespace Drupal\bank_consult_twig\Controller;


use Drupal\Core\Controller\ControllerBase;

class TwigDemoController extends ControllerBase {

  public function index($custom_arg) {
    $myText = 'This is not just a default text!';
    $myNumber = 1;
    $myArray = [1, 2, 3];
    $build = [];
    $build['first_item'] = [
        // Your theme hook name.
        '#theme' => 'bank_consult_demo_first',
        // Your variables.
        '#variable1' => $myText,
        '#variable2' => $myNumber,
        '#variable3' => $myArray,
    ];
    $build['second_item'] = [
      '#theme' => 'bank_consult_demo_second',
    ];
    $build['third_item'] = [
      '#markup' => "<br><strong>$custom_arg</strong>",
    ];
    return $build;

  }

}

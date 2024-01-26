<?php declare(strict_types=1);

namespace Drupal\ultras_css\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for ultras_css routes.
 */
final class UltrasCssController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function __invoke(): array {
    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

  public function content() {
    $build = [];
    $text = "There are many variations of passages of Lorem Ipsum available,
     but the majority have suffered alteration in some form, by injected humour,
     or randomised words which don't look even slightly believable. If you are
     going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
     embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the
     Internet tend to repeat predefined chunks as necessary, making this the first true
     generator on the Internet. It uses a dictionary of over 200 Latin words, combined
     with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.
     The generated Lorem Ipsum is therefore always free from repetition, injected humour, or
     non-characteristic words etc.";
    $build['ultras_css'] = [
      '#theme' => 'ultras_css',
    ];
    $build['content'] = [
      '#markup' => $this->t($text),
      '#attributes' => ['class' => ['ultras-css-module']],
      '#wrapper_attributes' => [
        'id' => 'container_ultras_wrapper',
        'class' => ['wrapper-class-bazuka'],
      ],
      //      '#theme_wrappers' => [
      //        'container' => [
      //          '#attributes' => ['class' => 'bazuka-first'],
      //
      //        ],
      ////        'custom_container' => [
      ////          '#attributes' => ['class' => 'bazuka-second'],
      ////        ],
      //      ],
    ];
    return $build;
  }

}

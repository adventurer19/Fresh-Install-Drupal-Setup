<?php

namespace Drupal\azure_pyramid\Element;

use Drupal\Core\Render\Element\RenderElement;

/**
 * @RenderElement("azure_pyramid")
 */
class AzurePyramidElement extends RenderElement {

  /**
   * @inheritDoc
   */
  public function getInfo(): array {
    $class = static::class;
    return [
      '#pre_render' => [
        [$class, 'preRenderPyramid'],
      ],
      '#length' => NULL,
      '#heigth' => NULL,
    ];
  }

  public static function preRenderPyramid($element) {
    $data = [];
    $data[] = $element['#length'];
    $data[] = $element['#heigth'];
    $element['pyramid'] = [
      '#theme' => 'azure_pyramid',
      '#data' => $data,
      '#theme_wrappers' => ['container'],
    ];
    //    $element['pyramid']['#theme_wrappers'] = ['azure_wrapper', 'azure_pyramid'];

    $element['#markup'] = t('Hello world');

    return $element;
  }

}
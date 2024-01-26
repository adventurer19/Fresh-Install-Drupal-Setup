<?php
//
//namespace Drupal\azure_builder\Plugin\Layout;
//use Drupal\Core\Layout\LayoutDefault;
//
///**
// * An example layout that uses preview mode detection.
// *
// * @Layout(
// *   id = "preview_aware_layout",
// *   label = @Translation("Preview-aware layout"),
// *   regions = {
// *     "main" = {
// *       "label" = @Translation("Main Region")
// *     }
// *   },
// * )
// */
//class PreviewAwareLayout extends LayoutDefault {
//
//  /**
//   * {@inheritdoc}
//   */
//  public function build(array $regions) {
//    $build = parent::build($regions);
//
//    if ($this->inPreview) {
//      $build['main']['#attributes']['class'][] = 'layout-preview';
//    }
//
//    return $build;
//  }
//
//}
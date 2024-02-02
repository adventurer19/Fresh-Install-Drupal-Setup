<?php declare(strict_types=1);

namespace Drupal\azure_pyramid\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Azure pyramid routes.
 */
final class AzurePyramidController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function index(): array {
    $build['content'] = [
      '#theme' => 'azure_pyramid',
    ];

    return $build;
  }

  public function page(): array {
    $build = [];
    $build = [
      '#type' => 'azure_pyramid',
      '#length' => 2,
      '#heigth' => 4,
    ];
    return $build;
  }

}

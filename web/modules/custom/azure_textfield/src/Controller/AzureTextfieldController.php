<?php declare(strict_types=1);

namespace Drupal\azure_textfield\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\node\Entity\Node;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for Azure textfield routes.
 */
final class AzureTextfieldController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function __invoke(): array {
    $build['input'] = [
      '#theme' => 'azure_textfield__input',
//      '#theme_wrappers' => ['form_element'],
    ];
    $build['input_2'] = [
      '#theme' => 'azure_textfield',
      //      '#theme_wrappers' => ['form_element'],
    ];
    return $build;
  }

}

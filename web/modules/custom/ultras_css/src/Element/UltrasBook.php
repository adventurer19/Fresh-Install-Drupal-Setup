<?php declare(strict_types = 1);

namespace Drupal\ultras_css\Element;

use Drupal\Core\Render\Element\RenderElement;

/**
 * Provides a render element to display an ultras book.
 *
 * Properties:
 * - #foo: Property description here.
 *
 * Usage Example:
 * @code
 * $build['ultras_book'] = [
 *   '#type' => 'ultras_book',
 *   '#book_name' => 'Default Book Name',
 *   '#book_author' => 'Default Author Name',
 * ];
 * @endcode
 *
 * @RenderElement("ultras_book")
 */
final class UltrasBook extends RenderElement {

  /**
   * {@inheritdoc}
   */
  public function getInfo(): array {
    return [
      '#theme' => 'ultras_book',
      '#book_name' => 'Default Book Name',
      '#book_author' => 'Default Author Name',
      '#pre_render' => [
        [self::class, 'preRenderEntityElement'],
      ],
      '#theme_wrappers' => ['form_element','container'],

    ];
  }

  /**
   * Ultras book element pre render callback.
   *
   * @param array $element
   *   An associative array containing the properties of the ultras_book element.
   *
   * @return array
   *   The modified element.
   */
  public static function preRenderEntityElement(array $element): array {
//    $element['#markup'] = $element['#foo'];
    return $element;
  }

}

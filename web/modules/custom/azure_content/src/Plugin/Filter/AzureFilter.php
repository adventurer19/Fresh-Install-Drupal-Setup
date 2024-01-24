<?php

namespace Drupal\azure_content\Plugin\Filter;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Render\Markup;
use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;

/**
 * Provides a azure filter to replace all content.
 *
 * @Filter(
 *   id = "filter_azure_xss",
 *   title = @Translation("Azure filter"),
 *   description = @Translation("Azure filter to process xss values in a string."),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_HTML_RESTRICTOR
 * )
 */
class AzureFilter extends FilterBase {

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode) {
    \Drupal::cache();
//      \Drupal::service('')
    $text = Xss::filter('<script>alert("Hello, this is an XSS attack!");</script>');
//    $text[] = 'Filter: ' . $this->getLabel() . ' (' . $this->getPluginId() . ')';
//    $text[] = 'Language: ' . $langcode;
    return new FilterProcessResult($text);
//    return new FilterProcessResult(implode("<br />\n", $text));
  }

}

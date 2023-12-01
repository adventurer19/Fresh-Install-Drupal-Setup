<?php

namespace Drupal\rxp_jsonapi\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a JSON API plugin annotation.
 *
 * @Annotation
 */
class JsonApiPlugin extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The plugin name.
   *
   * @var string
   */
  public $name;
}

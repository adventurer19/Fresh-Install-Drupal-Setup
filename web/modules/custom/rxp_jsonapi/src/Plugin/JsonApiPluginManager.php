<?php

namespace Drupal\rxp_jsonapi\Plugin;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\rxp_jsonapi\Annotation\JsonApiPlugin;

/**
 * Provides a JSON API plugin manager.
 */
class JsonApiPluginManager extends DefaultPluginManager {

  /**
   * Constructs a new JsonApiPluginManager object.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/JsonApi', $namespaces, $module_handler, JsonApiPluginInterface::class, JsonApiPlugin::class);

    $this->alterInfo('jsonapi_custom_jsonapi_plugin_info');
    $this->setCacheBackend($cache_backend, 'jsonapi_custom_jsonapi_plugins');
  }
}

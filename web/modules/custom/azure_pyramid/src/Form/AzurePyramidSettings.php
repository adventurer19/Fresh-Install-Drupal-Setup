<?php

namespace Drupal\azure_pyramid\Form;

use Drupal\Component\Utility\Html;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Azure Pyramid Settings
 */
final class AzurePyramidSettings extends ConfigFormBase {


  const ajaxSettingsWrapperId = 'ajax-settings-wrapper-id';

  const EditableConfigNames = [
    'azure_pyramid.settings' => ['length', 'height'],
    'azure_extra_pyramid.settings' => ['type', 'location'],
  ];

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'azure_pyramid_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames(): array {
    return array_keys(self::EditableConfigNames);
  }

  public function myAjaxCallback(array $form, FormStateInterface $form_state) {
    return $form['details'];

  }

  public function buildForm(array $form, FormStateInterface $form_state): array {
    $config = $this->configFactory->loadMultiple($this->getEditableConfigNames());
    $form['details'] = [
      '#type' => 'details',
      '#attributes' => ['id' => self::ajaxSettingsWrapperId],
      '#title' => $this->t('Settings'),
      '#open' => TRUE,
    ];

    $form['details']['location'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Location'),
      '#default_value' => $config['azure_extra_pyramid.settings']->get('location') ?: '',
    ];
//    $form['details']['location']['#ajax'] = [
//      'callback' => [$this, 'myAjaxCallback'],
//      'wrapper' => self::ajaxSettingsWrapperId,
//      'event' => 'mousedown', // Use 'mousedown' event for triggering AJAX.
//      'progress' => [
//        'type' => 'throbber',
//        'message' => $this->t('Verifying entry...'),
//      ],
//    ];
//    if ($selecedValue = $form_state->getValue('location') === 'Egypt') {
//      $form['details']['location']['#value'] = 'Egypt2';
//       Get the text of the selected option.
//      $selectedText = $form['example_select']['#options'][$selecedValue];
//       Place the text of the selected option in our textfield.
//      $form['output']['#value'] = $selectedText;
//    }
    $form['details']['type'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Type'),
      '#default_value' => $config['azure_extra_pyramid.settings']->get('type') ?: '',
    ];
    $form['details']['height'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Height'),
      '#default_value' => $config['azure_pyramid.settings']->get('height') ?: '',
    ];

    $form['details']['length'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Length'),
      '#default_value' => $config['azure_pyramid.settings']->get('length') ?: '',
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    foreach (self::EditableConfigNames as $config_name => $keys) {
      $loaded_config = $this->configFactory->getEditable($config_name);
      foreach ($keys as $key) {
        $loaded_config->set($key, $form_state->getValue($key));
      }
      $loaded_config->save();
    }
    parent::submitForm($form, $form_state);
  }

}

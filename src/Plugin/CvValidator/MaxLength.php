<?php

namespace Drupal\clientside_validation\Plugin\CvValidator;

use Drupal\clientside_validation\CvValidatorBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'maxlength' validator.
 *
 * @CvValidator(
 *   id = "maxlength",
 *   name = @Translation("Maximum length"),
 *   supports = {
 *     "attributes" = {"maxlength"}
 *   }
 * )
 */
class MaxLength extends CvValidatorBase {

  /**
   * {@inheritdoc}
   */
  protected function getRules($element, FormStateInterface $form_state) {
    // Drupal already adds the maxlength attribute, so we don't need to set the
    // maxlength rule.
    $title = isset($element['#title']) ? $element['#title'] : t('This field');
    if ($element['#type'] == 'select') {
      return [
        'messages' => [
          'maxlength' => $this->t('@title field can only have a maximum of @max values.', ['@title' => $title, '@max' => $element['#maxlength']]),
        ],
      ];
    }
    return [
      'messages' => [
        'maxlength' => $this->t('@title field has a maximum length of @max.', ['@title' => $title, '@max' => $element['#maxlength']]),
      ],
    ];
  }

}

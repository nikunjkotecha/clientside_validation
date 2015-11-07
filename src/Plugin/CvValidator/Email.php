<?php
/**
 * @file
 * Contains \Drupal\clientside_validation\Plugin\CvValidator\Email.
 */

namespace Drupal\clientside_validation\Plugin\CvValidator;

use Drupal\clientside_validation\CvValidatorBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'email' validator.
 *
 * @CvValidator(
 *   id = "email",
 *   name = @Translation("Email"),
 *   supports = {
 *     "types" = {
 *       "email
 *     }
 *   }
 * )
 */
class Email extends CvValidatorBase {

  /**
   * {@inheritdoc}
   */
  protected function getRules($element, FormStateInterface $form_state) {
    return [
      'messages' => [
        'email' => t('@title does not contain a valid email.', ['@title' => $element['#title']]),
      ],
    ];
  }

}

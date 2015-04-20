<?hh
/*
 *  Copyright (c) 2014, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the BSD-style license found in the
 *  LICENSE file in the root directory of this source tree. An additional grant
 *  of patent rights can be found in the PATENTS file in the same directory.
 *
 */

abstract class :bootstrap:base extends :x:element {
  use XHPHelpers;

  attribute
    Stringish class,
    Stringish id;

  private bool $_rendered = false;
  private static $_specialAttributes = Set {'data', 'aria'};

  abstract protected function compose(): ?XHPRoot;

  /**
   * Override compose() instead of this method for your content.
   */
  final protected function render(): XHPRoot {
    if (:xhp::$ENABLE_VALIDATION) {
      if ($this->_rendered) {
        throw new XHPClassException(
          $this,
          'Bootstrap components cannot be rendered more than once, as they '.
          'can mutate themselves during render. Reuse would likely cause '.
          'strange behavior or errors.'
        );
      }
    }

    $root = $this->compose();

    if (!$root) {
      $root = <x:frag />;
    } else {
      if (:xhp::$ENABLE_VALIDATION && $root instanceof :x:element) {
        if (!($root instanceof HasXHPHelpers)) {
          throw new XHPClassException(
            $this,
            'compose() must return an :xhp:html-element or :bootstrap:base '.
            'instance.'
          );
        }

        $rootID = $root->getAttribute('id') ?: null;
        $thisID = $this->:id ?: null;

        if ($rootID && $thisID && $rootID != $thisID) {
          throw new XHPException(
            'ID Collision. '.(:xhp::class2element(self::class)).' has an ID '.
            'of "'.$thisID.'" but it renders into a(n) '.
            (:xhp::class2element(get_class($root))).
            ' which has an ID of "'.$rootID.'". The latter will get '.
            'overwritten (most often unexpectedly). If you are intending for '.
            'this behavior consider calling $this->removeAttribute(\'id\') '.
            'before returning your node from compose().'
          );
        }
      }
      assert($root instanceof HasXHPHelpers);

      $attributes = $this->getAttributes();

      // We want to append classes to the root node, instead of replace them,
      // so do this attribute manually and then remove it.
      if (array_key_exists('class', $attributes) && $attributes['class']) {
        $root->addClass($attributes['class']);
        $this->removeAttribute('class');
      }

      // Transfer all valid attributes to the returned node.
      $this->transferAllAttributes($root);
    }

    $this->_rendered = true;

    return $root;
  }
}

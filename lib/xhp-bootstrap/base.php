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
  attribute
    string class,
    string id;

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
        if (!($root instanceof :xhp:html-element
              || $root instanceof :bootstrap:base)) {
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

      $attributes = $this->getAttributes();

      // We want to append classes to the root node, instead of replace them,
      // so do this attribute manually and then remove it.
      if (array_key_exists('class', $attributes) && $attributes['class']) {
        // UNSAFE
        $root->addClass($attributes['class']);
        $this->removeAttribute('class');
      }

      // Transfer all valid attributes to the returned node.
      // UNSAFE
      $this->transferAttributes($root);
    }

    $this->_rendered = true;

    return $root;
  }


  final private function transferAttributes(:xhp $target): void {
    $validTargetAttributes = (new ReflectionXHPClass(get_class($target)))
      ->getAttributes();
    if (:xhp::$ENABLE_VALIDATION) {
      static $htmlAttributeCount = 0;
      if ($htmlAttributeCount == 0) {
        $htmlAttributeCount = count(
          (new ReflectionXHPClass(:xhp:html-element::class))->getAttributes()
        );
      }
      if ($htmlAttributeCount > count($validTargetAttributes)) {
        throw new XHPException(
          (:xhp::class2element(static::class)).' did not inherit attributes '.
          'from an HTML element. :bootstrap:base automatically forwards valid '.
          'attributes to the element returned from compose(), but for this to '.
          'be valuable you should inherit the attributes of the element you '.
          'are returning. The syntax is: "attribute :div;" (for example). If '.
          'you do not want all HTML attributes to be valid on this component '.
          'you should extend :x:element directly and implement the render() '.
          'method instead of compose().'
        );
      }
    }

    foreach ($this->getAttributes() as $attribute => $value) {
      if (
        $validTargetAttributes->containsKey($attribute)
        || ReflectionXHPAttribute::IsSpecial($attribute)
      ) {
        try {
          $target->setAttribute($attribute, $value);
        } catch (XHPInvalidAttributeException $error) {
          // This only happens when an attribute name collision occurs but the
          // two have different data types or different possible enum values.
          // This can be dangerous because the result when validation is off
          // will be different than when validation is on, so you should fix
          // this by renaming one of the attributes.
          $target = get_class($target);
          throw new XHPException(
            (:xhp::class2element(static::class)).' and '.
            (:xhp::class2element($target)).' both support the "'.$attribute.
            '" but they have different signatures. This is a problem because '.
            (:xhp::class2element(static::class)).' returns a(n) '.
            (:xhp::class2element($target)).' compose() and transfering '.
            'to the latter can cause unexpected behavior. Rename the '.
            ' attribute on at least one of these elements to fix this.'
          );
        }
      }
    }
  }

  // Temporarily pilfered from :xhp:html-element
  // https://github.com/facebook/xhp/pull/62
  public function getID(): string {
    return $this->requireUniqueID();
  }

  public function requireUniqueID(): string {
    if (!($id = $this->:id)) {
      $this->setAttribute('id', $id = substr(md5(mt_rand(0, 100000)), 0, 10));
    }
    return (string) $id;
  }

  public function addClass(string $class): this {
    $this->setAttribute('class', trim($this->:class.' '.$class));
    return $this;
  }

  public function conditionClass(bool $cond, string $class): this {
    if ($cond) {
      $this->addClass($class);
    }
    return $this;
  }
}

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

  private bool $_rendered = false;
  private static $_specialAttributes = Set {'data', 'aria'};

  abstract protected function compose(): ?:xhp;

  /**
   * Override compose() instead of this method for your content.
   */
  final protected function render(): :xhp {
    if (:xhp::$ENABLE_VALIDATION) {
      if ($this->_rendered) {
        throw new XHPException(
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
      if (:xhp::$ENABLE_VALIDATION) {
        if (!($root instanceof :xhp:html-element 
              || $root instanceof :bootstrap:base)) {
          throw new XHPException(
            $this,
            'compose() must return an :xhp:html-element or :bootstrap:base '.
            'instance.'
          );
        }

        $rootID = array_key_exists('id', $root->getAttributes()) 
          ? $root->getAttribute('id') 
          : null;
        $thisID = array_key_exists('id', $this->getAttributes()) 
          ? $this->getAttribute('id') 
          : null;

        if ($rootID && $thisID && $rootID != $thisID) {
          throw new XHPException(
            $this,
            'ID Collision. '.(:xhp::class2element($this)).' has an ID of "'.
            $thisID.'" but it renders into a(n) '.(:xhp::class2element($root)).
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
        $root->addClass($attributes['class']);
        $this->removeAttribute('class');
      }

      // Transfer all valid attributes to the returned node.
      $this->transferAttributes($root);
    }

    $this->_rendered = true;

    return $root;
  }


  final private function transferAttributes(:xhp $target): void {
    // UNSAFE - static polymorphism
    // sparker: Is $target::__xhpAttributeDeclaration() valid in Hack?
    $validTargetAttributes = $target->__xhpAttributeDeclaration();
    if (:xhp::$ENABLE_VALIDATION) {
      static $htmlAttributeCount = 0;
      if ($htmlAttributeCount == 0) {
        $htmlAttributeCount = count(
          :xhp:html-element::__xhpAttributeDeclaration()
        );
      }
      if ($htmlAttributeCount > count($validTargetAttributes)) {
        throw new XHPException(
          $this,
          (:xhp::class2element($this)).' did not inherit attributes from an '.
          'HTML element. :bootstrap:base automatically forwards valid '.
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
      if (isset($validTargetAttributes[$attribute])
          || (isset($attribute[5])
            && $attribute[4] == '-'
            && self::$_specialAttributes->contains(substr($attribute, 0, 4))
          )
      ) {
        try {
          $target->setAttribute($attribute, $value);
        } catch (XHPInvalidAttributeException $error) {
          // This only happens when an attribute name collision occurs but the
          // two have different data types or different possible enum values.
          // This can be dangerous because the result when validation is off
          // will be different than when validation is on, so you should fix
          // this by renaming one of the attributes.
          throw new XHPException(
            $this,
            (:xhp::class2element($this)).' and '.
            (:xhp::class2element($target)).' both support the "'.$attribute.
            '" but they have different signatures. This is a problem because '.
            (:xhp::class2element($this)).' returns a(n) '.
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
    if (!($id = $this->getAttribute('id'))) {
      $this->setAttribute('id', $id = substr(md5(mt_rand(0, 100000)), 0, 10));
    }
    return $id;
  }

  public function addClass($class): this {
    $this->setAttribute('class', trim($this->getAttribute('class').' '.$class));
    return $this;
  }

  public function conditionClass($cond, $class): this {
    if ($cond) {
      $this->addClass($class);
    }
    return $this;
  }
}

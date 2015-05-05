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

<<ExamplesInClass(':bootstrap:dropdown')>>
final class :bootstrap:dropdown:item extends :bootstrap:base {

  attribute
    :a,
    bool disabled = false;

  category %bootstrap:dropdown:element;

  protected function render(): XHPRoot {
    $link =
      <a role="menuitem" tabindex="-1">
        {$this->getChildren()}
      </a>;

    $ret = <li role="presentation">{$link}</li>;
    if ($this->:disabled) {
      $ret->addClass('disabled');
    }
    return $ret;
  }
}

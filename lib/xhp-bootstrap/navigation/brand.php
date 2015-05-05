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

<<ExamplesInClass(':bootstrap:navbar')>>
class :bootstrap:navbar:brand extends :bootstrap:base {

  attribute
    :a,
    Stringish href @required;

  protected function render(): XHPRoot {
    return
      <a href={$this->:href} class="navbar-brand">
        {$this->getChildren()}
      </a>;
  }
}

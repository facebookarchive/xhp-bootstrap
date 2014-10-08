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
class :bootstrap:navigation:link extends :bootstrap:base {

  attribute
    :li,
    Stringish href @required,
    bool active = false;

  children (pcdata);

  category %bootstrap:navigation:item;

  protected function compose(): :xhp {
    return
      <li class={$this->getAttribute('active') ? 'active' : null}>
        <a href={$this->getAttribute('href')}>
          {$this->getChildren()}
        </a>
      </li>;
  }
}

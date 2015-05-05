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
final class :bootstrap:dropdown:header extends :bootstrap:base {

  attribute :li;

  category %bootstrap:dropdown:element;

  protected function render(): XHPRoot {
    return
      <li role="presentation" class="dropdown-header">
        {$this->getChildren()}
      </li>;
  }
}

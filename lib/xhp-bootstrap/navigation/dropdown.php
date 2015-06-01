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
final class :bootstrap:navigation:dropdown extends :bootstrap:base {

  attribute :li;

  children (
    :a,
    :bootstrap:dropdown:menu
  );

  category %bootstrap:navigation:item;

  protected function render(): XHPRoot {
    list($trigger, $menu) = $this->getChildren();
    assert($trigger instanceof :a);
    $trigger->addClass('dropdown-toggle');
    $trigger->setAttribute('data-toggle', 'dropdown');
    return
      <li class="dropdown">
        {$trigger}
        {$menu}
      </li>;
  }
}

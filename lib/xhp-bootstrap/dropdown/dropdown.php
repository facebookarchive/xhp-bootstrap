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

final class :bootstrap:dropdown extends :bootstrap:base {

  attribute :div;

  children (
    :bootstrap:button,
    :bootstrap:dropdown:menu
  );

  protected function render(): XHPRoot {
    list($trigger, $menu) = $this->getChildren();
    assert($trigger instanceof :bootstrap:button);
    $trigger->addClass('dropdown-toggle');
    $trigger->setAttribute('data-toggle', 'dropdown');
    return
      <div class="dropdown">
        {$trigger}
        {$menu}
      </div>;
  }

  <<ExampleTitle('Basic dropdown')>>
  public static function __example1() {
    return
      <bootstrap:dropdown>
        <bootstrap:button>
          Dropdown
          <bootstrap:caret />
        </bootstrap:button>
        <bootstrap:dropdown:menu>
          <bootstrap:dropdown:item href="#">
            Foo
          </bootstrap:dropdown:item>
          <bootstrap:dropdown:item href="#">
            Bar
          </bootstrap:dropdown:item>
          <bootstrap:dropdown:item disabled={true} href="#">
            Disabled
          </bootstrap:dropdown:item>
        </bootstrap:dropdown:menu>
      </bootstrap:dropdown>;
  }

  <<ExampleTitle('Dropdown with sections')>>
  public static function __example2() {
    return
      <bootstrap:dropdown>
        <bootstrap:button>
          Dropdown
          <bootstrap:caret />
        </bootstrap:button>
        <bootstrap:dropdown:menu>
          <bootstrap:dropdown:header>
            Menu Header
          </bootstrap:dropdown:header>
          <bootstrap:dropdown:item href="#">
            Foo
          </bootstrap:dropdown:item>
          <bootstrap:dropdown:divider />
          <bootstrap:dropdown:header>
            Menu Header
          </bootstrap:dropdown:header>
          <bootstrap:dropdown:item href="#">
            Herp
          </bootstrap:dropdown:item>
          <bootstrap:dropdown:item href="#">
            Derp
          </bootstrap:dropdown:item>
        </bootstrap:dropdown:menu>
      </bootstrap:dropdown>;
  }
}

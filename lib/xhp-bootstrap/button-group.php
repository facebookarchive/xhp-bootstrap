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

final class :bootstrap:button-group extends :bootstrap:base {

  attribute
    :div,
    enum {
      'horizontal',
      'vertical'
    } orientation = 'horizontal',
    enum {
      'large',
      'default',
      'small',
      'x-small'
    } size = 'default',
    bool justified = false;

  children ((:bootstrap:button|:bootstrap:button-group)+);

  protected function render(): XHPRoot {
    $class = $this->:orientation === 'horizontal'
      ? 'btn-group' : 'btn-group-vertical';
    $ret = <div class={$class}>{$this->getChildren()}</div>;
    switch ($this->:size) {
      case 'large':
        $ret->addClass('btn-group-lg');
        break;
      case 'small':
        $ret->addClass('btn-group-sm');
        break;
      case 'x-small':
        $ret->addClass('btn-group-xs');
        break;
    }
    if ($this->:justified) {
      $ret->addClass('btn-group-justified');
    }

    return $ret;
  }

  <<ExampleTitle('Basic usage')>>
  public static function __example1() {
    return
      <bootstrap:button-group>
        <bootstrap:button>1</bootstrap:button>
        <bootstrap:button>2</bootstrap:button>
        <bootstrap:button>3</bootstrap:button>
      </bootstrap:button-group>;
  }

  <<ExampleTitle('Sizes')>>
  public static function __example2() {
    return
      <x:frag>
        <bootstrap:button-group size="large">
          <bootstrap:button>1</bootstrap:button>
          <bootstrap:button>2</bootstrap:button>
          <bootstrap:button>3</bootstrap:button>
        </bootstrap:button-group>
        <bootstrap:button-group size="default">
          <bootstrap:button>1</bootstrap:button>
          <bootstrap:button>2</bootstrap:button>
          <bootstrap:button>3</bootstrap:button>
        </bootstrap:button-group>
        <bootstrap:button-group size="small">
          <bootstrap:button>1</bootstrap:button>
          <bootstrap:button>2</bootstrap:button>
          <bootstrap:button>3</bootstrap:button>
        </bootstrap:button-group>
        <bootstrap:button-group size="x-small">
          <bootstrap:button>1</bootstrap:button>
          <bootstrap:button>2</bootstrap:button>
          <bootstrap:button>3</bootstrap:button>
        </bootstrap:button-group>
      </x:frag>;
  }

  <<ExampleTitle('Vertical orientation')>>
  public static function __example3() {
    return
      <bootstrap:button-group orientation="vertical">
        <bootstrap:button>1</bootstrap:button>
        <bootstrap:button>2</bootstrap:button>
        <bootstrap:button>3</bootstrap:button>
      </bootstrap:button-group>;
  }

  <<ExampleTitle('Justified')>>
  public static function __example4() {
    return
      <bootstrap:button-group justified={true}>
        <bootstrap:button>1</bootstrap:button>
        <bootstrap:button>2</bootstrap:button>
        <bootstrap:button>3</bootstrap:button>
      </bootstrap:button-group>;
  }
}

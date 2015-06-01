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

class :bootstrap:button extends :bootstrap:base {

  attribute
    :a,
    enum {
      'default',
      'primary',
      'success',
      'info',
      'warning',
      'danger',
      'link'
    } use = 'default',
    enum {
      'large',
      'default',
      'small',
      'x-small'
    } size = 'default',
    bool block = false,
    bool active = false,
    bool disabled = false,
    Stringish href;

  protected function render(): XHPRoot {
    $ret =
      <a href={$this->:href}>
        {$this->getChildren()}
      </a>;

    $ret->addClass('btn');
    $ret->addClass('btn-'.$this->:use);

    switch ($this->:size) {
      case 'large':
        $ret->addClass('btn-lg');
        break;
      case 'small':
        $ret->addClass('btn-sm');
        break;
      case 'x-small':
        $ret->addClass('btn-xs');
        break;
    }
    if ($this->:block) {
      $ret->addClass('btn-block');
    }
    if ($this->:active) {
      $ret->addClass('active');
    }
    if ($this->:disabled) {
      $ret->addClass('disabled');
    }
    return $ret;
  }

  <<ExampleTitle('Uses')>>
  public static function __example1() {
    return
      <x:frag>
        <bootstrap:button use="default">
          Default
        </bootstrap:button>
        <bootstrap:button use="primary">
          Primary
        </bootstrap:button>
        <bootstrap:button use="success">
          Success
        </bootstrap:button>
        <bootstrap:button use="info">
          Info
        </bootstrap:button>
        <bootstrap:button use="warning">
          Warning
        </bootstrap:button>
        <bootstrap:button use="danger">
          Danger
        </bootstrap:button>
        <bootstrap:button use="link">
          Link
        </bootstrap:button>
      </x:frag>;
  }

  <<ExampleTitle('Sizes')>>
  public static function __example2() {
    return
      <x:frag>
        <bootstrap:button size="large">
          Large
        </bootstrap:button>
        <bootstrap:button size="default">
          Default
        </bootstrap:button>
        <bootstrap:button size="small">
          Small
        </bootstrap:button>
        <bootstrap:button size="x-small">
          X-Small
        </bootstrap:button>
      </x:frag>;
  }

  <<ExampleTitle('Active State')>>
  public static function __example3() {
    return
      <x:frag>
        <bootstrap:button>
          Default
        </bootstrap:button>
        <bootstrap:button active={true}>
          Active
        </bootstrap:button>
      </x:frag>;
  }

  <<ExampleTitle('Disabled State')>>
  public static function __example4() {
    return
      <x:frag>
        <bootstrap:button>
          Default
        </bootstrap:button>
        <bootstrap:button disabled={true}>
          Disabled
        </bootstrap:button>
      </x:frag>;
  }

  <<ExampleTitle('Block')>>
  public static function __example5() {
    return
      <x:frag>
        <bootstrap:button>
          Default
        </bootstrap:button>
        <bootstrap:button block={true}>
          Block
        </bootstrap:button>
      </x:frag>;
  }
}

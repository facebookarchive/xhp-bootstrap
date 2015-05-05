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

class :bootstrap:panel extends :bootstrap:base {

  attribute
    :div,
    enum {
      'default',
      'primary',
      'success',
      'info',
      'warning',
      'danger'
    } use = 'default';

  children (
    :bootstrap:panel:heading?,
    :bootstrap:panel:body?,
    :bootstrap:list-group?,
    :bootstrap:panel:footer?
  );

  protected function render(): XHPRoot {
    $ret =
      <div class={$this->:class}>
        {$this->getChildren()}
      </div>;

    $ret->addClass('panel');
    $ret->addClass('panel-'.$this->:use);
    return $ret;
  }

  <<ExampleTitle('Secions usage')>>
  public static function __example1() {
    return
      <x:frag>
        <bootstrap:panel use="danger">
          <bootstrap:panel:heading>
            Help help
          </bootstrap:panel:heading>
          <bootstrap:panel:body>
            Something is wrong
          </bootstrap:panel:body>
          <bootstrap:panel:footer>
            And this is a footer
          </bootstrap:panel:footer>
        </bootstrap:panel>
      </x:frag>;
  }

  <<ExampleTitle('Mixing sections and content')>>
  public static function __example2() {
    return
      <x:frag>
        <bootstrap:panel use="danger">
          <bootstrap:panel:heading>
            Help help
          </bootstrap:panel:heading>
          <bootstrap:list-group>
            <li>Item 1</li>
            <li>Item 2</li>
          </bootstrap:list-group>
        </bootstrap:panel>
      </x:frag>;
  }

}

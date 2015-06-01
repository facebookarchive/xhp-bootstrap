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

final class :bootstrap:nav extends :bootstrap:base {

  attribute
    :ul,
    enum {
      'tabs',
      'pills'
    } navstyle = 'tabs',
    enum {
      'base',
      'justified',
      'stacked'
    } layout = 'base';

  children (%bootstrap:navigation:item*);

  protected function render(): XHPRoot {
    $ret =
      <ul class="nav">
        {$this->getChildren()}
      </ul>;

    $ret->addClass('nav-'.$this->:navstyle);

    $layout_class = $this->:layout;
    if ($layout_class != 'base') {
      $ret->addClass('nav-'.$layout_class);
    }

    return $ret;
  }

  <<ExampleTitle('Nav tabs')>>
  public static function __example1() {
    return
      <bootstrap:nav >
        <bootstrap:navigation:link href="#">
          Link
        </bootstrap:navigation:link>
        <bootstrap:navigation:link href="#" active={true}>
          Active Link
        </bootstrap:navigation:link>
        <bootstrap:navigation:link href="#">
          Another Link
        </bootstrap:navigation:link>
      </bootstrap:nav>;
  }

  <<ExampleTitle('Nav pills')>>
  public static function __example2() {
    return
      <bootstrap:nav navstyle="pills">
        <bootstrap:navigation:link href="#">
          Link
        </bootstrap:navigation:link>
        <bootstrap:navigation:link href="#" active={true}>
          Active Link
        </bootstrap:navigation:link>
        <bootstrap:navigation:link href="#">
          Another Link
        </bootstrap:navigation:link>
      </bootstrap:nav>;
  }

  <<ExampleTitle('Dropdown pills')>>
  public static function __example3() {
    return
      <bootstrap:nav navstyle="pills">
        <bootstrap:navigation:link href="#" active={true}>
          Link
        </bootstrap:navigation:link>
        <bootstrap:navigation:dropdown>
          <a href="#">
            Dropdown
            <bootstrap:caret />
          </a>
          <bootstrap:dropdown:menu>
            <bootstrap:dropdown:item href="#">
              Foo
            </bootstrap:dropdown:item>
            <bootstrap:dropdown:item href="#">
              Bar
            </bootstrap:dropdown:item>
            <bootstrap:dropdown:divider />
            <bootstrap:dropdown:item href="#">
              Herp
            </bootstrap:dropdown:item>
            <bootstrap:dropdown:item href="#">
              Derp
            </bootstrap:dropdown:item>
          </bootstrap:dropdown:menu>
        </bootstrap:navigation:dropdown>
      </bootstrap:nav>;
  }

  <<ExampleTitle('Stacked Pills')>>
  public static function __example4() {
    return
      <bootstrap:nav navstyle="pills" layout="stacked">
        <bootstrap:navigation:link href="#">
          Link
        </bootstrap:navigation:link>
        <bootstrap:navigation:link href="#" active={true}>
          Active Link
        </bootstrap:navigation:link>
        <bootstrap:navigation:link href="#">
          Another Link
        </bootstrap:navigation:link>
      </bootstrap:nav>;
  }

  <<ExampleTitle('Justified pills')>>
  public static function __example5() {
    return
      <bootstrap:nav navstyle="pills" layout="justified">
        <bootstrap:navigation:link href="#">
          Link
        </bootstrap:navigation:link>
        <bootstrap:navigation:link href="#" active={true}>
          Active Link
        </bootstrap:navigation:link>
        <bootstrap:navigation:link href="#">
          Another Link
        </bootstrap:navigation:link>
      </bootstrap:nav>;
  }

}

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

class :bootstrap:navbar extends :bootstrap:base {

  attribute
    :nav,
    enum { 'default', 'inverse' } theme = 'default',
    enum {
      'default',
      'fixed-top',
      'static-top',
      'fixed-bottom'
    } position = 'default';

  children (
    :bootstrap:navbar:brand?,
    %bootstrap:navigation:item*
  );

  protected function render(): XHPRoot {
    $theme = $this->:theme;
    $position = $this->:position;

    $header = $this->getChildren('bootstrap:navbar:brand');
    if ($header) {
      $header =
        <div class="navbar-header">
          {$header}
        </div>;
    }

    $links = $this->getChildren('%bootstrap:navigation:item');
    if ($links) {
      $links =
        <ul class="nav navbar-nav">
          {$links}
        </ul>;
    }

    $ret =
      <nav class="navbar" role="navigation">
        <bootstrap:container>
          {$header}
          {$links}
        </bootstrap:container>
      </nav>;

    $ret->addClass('navbar-'.$theme);
    if ($position !== 'default') {
      $ret->addClass('navbar-'.$position);
    }
    return $ret;
  }

  <<ExampleTitle('Default Theme')>>
  public static function __example1() {
    return
      <bootstrap:navbar>
        <bootstrap:navbar:brand href="#">Brand</bootstrap:navbar:brand>
        <bootstrap:navigation:link href="#">
          Link
        </bootstrap:navigation:link>
        <bootstrap:navigation:link href="#" active={true}>
          Active Link
        </bootstrap:navigation:link>
        <bootstrap:navigation:link href="#">
          Another Link
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
      </bootstrap:navbar>;
  }

  <<ExampleTitle('Inverse Theme')>>
  public static function __example2() {
    return
      <bootstrap:navbar theme="inverse">
        <bootstrap:navbar:brand href="#">Brand</bootstrap:navbar:brand>
        <bootstrap:navigation:link href="#">
          Link
        </bootstrap:navigation:link>
        <bootstrap:navigation:link href="#" active={true}>
          Active Link
        </bootstrap:navigation:link>
        <bootstrap:navigation:link href="#">
          Another Link
        </bootstrap:navigation:link>
      </bootstrap:navbar>;
  }
}

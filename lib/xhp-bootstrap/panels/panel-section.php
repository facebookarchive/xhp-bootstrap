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

<<ExamplesInClass(':bootstrap:panel')>>
abstract class :bootstrap:panel:section extends :bootstrap:base {

  attribute :div;

  abstract protected function getSectionStyle(): string;

  protected function render(): XHPRoot {
    $ret =
      <div class={$this->getSectionStyle()}>
        {$this->getChildren()}
      </div>;

    return $ret;
  }
}

<<ExamplesInClass(':bootstrap:panel')>>
class :bootstrap:panel:heading extends :bootstrap:panel:section {
  protected function getSectionStyle(): string {
    return 'panel-heading';
  }
}

<<ExamplesInClass(':bootstrap:panel')>>
class :bootstrap:panel:body extends :bootstrap:panel:section {
  protected function getSectionStyle(): string {
    return 'panel-body';
  }
}

<<ExamplesInClass(':bootstrap:panel')>>
class :bootstrap:panel:footer extends :bootstrap:panel:section {
  protected function getSectionStyle(): string {
    return 'panel-footer';
  }
}

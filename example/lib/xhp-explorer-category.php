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

final class :xhp-explorer:category extends :x:element {
  attribute
    string classname @required,
    string title = 'Category';

  protected function render() {
    $rows = Vector { };
    $class = (string) $this->:classname;
    $cats = $class::__xhpCategoryDeclaration();
    $skip = self::GetCategorySkipList();
    foreach ($cats as $name => $dummy) {
      if ($skip->contains($name)) {
        continue;
      }
      $rows[] =
        <tr>
          <td><code>{$name}</code></td>
        </tr>;
    }
    if (!$rows->count()) {
      return <x:frag />;
    }
    $title = $this->:title;
    if ($title) {
      $title = <h2>{$title}</h2>;
    }
    return
      <x:frag>
        {$title}
        <bootstrap:table>
          <tbody>
            {$rows}
          </tbody>
        </bootstrap:table>
      </x:frag>;
  }

  <<__IsFoldable>>
  protected static function GetCategorySkipList(): Set<string> {
    // __xhpCategoryDeclaration is currently non-static
    // UNSAFE
    return new Set(array_keys(
      :html::__xhpCategoryDeclaration()
    ));
  }
}

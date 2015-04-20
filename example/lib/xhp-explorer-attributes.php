<?hh // strict
/*
 *  Copyright (c) 2014, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the BSD-style license found in the
 *  LICENSE file in the root directory of this source tree. An additional grant
 *  of patent rights can be found in the PATENTS file in the same directory.
 *
 */

final class :xhp-explorer:attributes extends :x:element {
  attribute
    string classname @required,
    string title = 'Attributes';

  <<__Memoize>>
  private static function GetSkipList(): Set<string> {
    $rc = new ReflectionXHPClass(:xhp:html-element::class);
    return new Set($rc->getAttributes()->keys());
  }

  protected function render(): XHPRoot {
    $rows = Vector { };
    $rc = new ReflectionXHPClass($this->:classname);

    $skip = self::GetSkipList();
    foreach ($rc->getAttributes() as $name => $attr) {
      if ($skip->contains($name)) {
        continue;
      }

      switch ($attr->getValueType()) {
        case XHPAttributeType::TYPE_STRING:
          $type = <code>string</code>;
          break;
        case XHPAttributeType::TYPE_BOOL:
          $type = <code>bool</code>;
          break;
        case XHPAttributeType::TYPE_INTEGER:
          $type = <code>int</code>;
          break;
        case XHPAttributeType::TYPE_ARRAY:
          $type = <code>array</code>;
          break;
        case XHPAttributeType::TYPE_OBJECT:
          $type = <code>{$attr->getValueClass()}</code>;
          break;
        case XHPAttributeType::TYPE_VAR:
          $type = <em>any</em>;
          break;
        case XHPAttributeType::TYPE_FLOAT:
          $type = <code>float</code>;
          break;
        case XHPAttributeType::TYPE_ENUM:
          $values = $attr->getEnumValues()->map($x ==> "'".$x."'");
          $type =
            <code style="white-space: pre">
              {"enum {\n  " . implode(",\n  ", $values)."\n}"}
            </code>;
        break;
      }

      if (!$attr->hasDefaultValue()) {
        if ($attr->isRequired()) {
          $default = <em>none</em>;
        } else {
          $default =
            <bootstrap:label use="warning">required</bootstrap:label>;
        }
      } else {
        $default = <code>{var_export($attr->getDefaultValue(), true)}</code>;
      }

      $rows[] =
        <tr>
          <td><code>{$name}</code></td>
          <td>{$type}</td>
          <td>{$default}</td>
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
          <thead>
            <tr>
              <th>Name</th>
              <th>Type</th>
              <th>Default</th>
            </tr>
          </thead>
          <tbody>
            {$rows}
          </tbody>
        </bootstrap:table>
      </x:frag>;
  }
}

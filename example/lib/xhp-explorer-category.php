<?hh

final class :xhp-explorer:category extends :x:element {
  attribute
    string classname @required,
    string title = 'Category';

  protected function render() {
    $rows = Vector { };
    $class = $this->getAttribute('classname');
    $cats = $class::__xhpCategoryDeclaration();
    $skip = new Set(array_keys(
      :xhp:html-element::__xhpCategoryDeclaration()
    ));
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
    $title = $this->getAttribute('title');
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
}

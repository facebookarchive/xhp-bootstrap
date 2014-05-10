<?hh

<<ExamplesInClass(':bootstrap:dropdown')>>
final class :bootstrap:dropdown:item extends :bootstrap:base {
  attribute
    bool disabled = false,
    :a,
    :bootstrap:base;

  category %bootstrap:dropdown:element;

  protected function render(): :xhp {
    $link =
      <a role="menuitem" tabindex="-1">
        {$this->getChildren()}
      </a>;
    $this->transferCustomAttributesExcept($link, Set {'disabled'});

    $ret = <li role="presentation">{$link}</li>;
    if ($this->getAttribute('disabled')) {
      $ret->addClass('disabled');
    }
    return $ret;
  }
}

<?hh

<<ExamplesInClass(':bootstrap:dropdown')>>
final class :bootstrap:dropdown:item extends :bootstrap:base {

  attribute
    :a,
    bool disabled = false;

  category %bootstrap:dropdown:element;

  protected function compose(): :xhp {
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

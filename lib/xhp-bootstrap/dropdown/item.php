<?hh

final class :bootstrap:dropdown:item extends :bootstrap:base {
  attribute :a, :bootstrap:base;

  protected function render(): :xhp {
    $link =
      <a role="menuitem" tabindex="-1">
        {$this->getChildren()}
      </a>;
    $this->transferCustomAttributes($link);
    return
      <li role="presentation">{$link}</li>;
  }
}

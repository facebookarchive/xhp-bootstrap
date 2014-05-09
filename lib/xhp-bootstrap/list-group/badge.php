<?hh

final class :bootstrap:badge extends :bootstrap:base {
  attribute :bootstrap:base;

  protected function render(): :xhp {
    $ret = <span>{$this->getChildren()}</span>;
    $ret->addClass($this->getAttribute('class'));
    $ret->addClass('badge');
    return $ret;
  }
}

<?hh

final class :bootstrap:badge extends :bootstrap:base {

  attribute :span;

  protected function compose(): :xhp {
    $ret = <span>{$this->getChildren()}</span>;
    $ret->addClass($this->getAttribute('class'));
    $ret->addClass('badge');
    return $ret;
  }
}

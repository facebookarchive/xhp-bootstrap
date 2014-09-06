<?hh

final class :bootstrap:badge extends :bootstrap:base {

  attribute :span;

  protected function compose(): :xhp {
    $ret = <span>{$this->getChildren()}</span>;
    $ret->addClass($this->getAttribute('class'));
    $ret->addClass('badge');
    return $ret;
  }

  <<ExampleTitle('Uses')>>
  public static function __example1() {
    return
      <bootstrap:button>
        <bootstrap:glyphicon icon="envelope" />
        Unread Mail
        <bootstrap:badge>123</bootstrap:badge>
      </bootstrap:button>;
  }
}

<?hh

final class :bootstrap:caret extends :bootstrap:base {

  attribute :span;

  protected function compose(): :xhp {
    return <span class="caret" />;
  }

  public static function __example1() {
    return <bootstrap:caret />;
  }
}

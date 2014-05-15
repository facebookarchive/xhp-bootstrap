<?hh

final class :bootstrap:close-button extends :bootstrap:base {

  attribute :button;

  protected function compose(): :xhp {
    return
      <button type="button" class="close" aria-hidden="true">&times;</button>;
  }

  public static function __example1(): :xhp {
    return
      <bootstrap:close-button />;
  }
}

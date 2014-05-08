<?hh

final class :bootstrap:close-button extends :x:element {
  attribute :button;

  protected function render(): :xhp {
    return
      <button type="button" class="close" aria-hidden="true">&times;</button>;
  }

  public static function __example1(): :xhp {
    return
      <bootstrap:close-button />;
  }
}

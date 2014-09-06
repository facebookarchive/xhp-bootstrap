<?hh

class :bootstrap:root extends :bootstrap:base {

  attribute :div;

  children (
    :bootstrap:navbar?,
    :bootstrap:container*,
    :bootstrap:footer?
  );

  protected function compose() {
    return <div id="wrap">{$this->getChildren()}</div>;
  }

  <<ExampleTitle("Root")>>
  public static function __example1() {
    return
      <bootstrap:root>
        <bootstrap:container>
          Root nodes may contain any number of
          containers, one optional navbar, and
          one optional footer.
        </bootstrap:container>
      </bootstrap:root>;
  }
}

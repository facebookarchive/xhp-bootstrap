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
}

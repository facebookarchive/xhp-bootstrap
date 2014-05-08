<?hh

class :bootstrap:root extends :bootstrap:base {
  attribute :bootstrap:base;

  children (
    :bootstrap:navbar?,
    :bootstrap:container*,
    :bootstrap:footer?
  );

  protected function render() {
    return <div id="wrap">{$this->getChildren()}</div>;
  }
}

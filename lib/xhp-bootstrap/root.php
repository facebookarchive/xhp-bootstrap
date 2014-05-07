<?hh

class :bootstrap:root extends :x:element {
  children (
    :bootstrap:navbar?,
    :bootstrap:container*,
    :bootstrap:footer?
  );

  protected function render() {
    return <div id="wrap">{$this->getChildren()}</div>;
  }
}

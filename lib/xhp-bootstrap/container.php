<?hh

class :bootstrap:container extends :x:element {
  attribute :div;

  protected function render(): :xhp {
    return
      <div class="container">
        {$this->getChildren()}
      </div>;
  }
}

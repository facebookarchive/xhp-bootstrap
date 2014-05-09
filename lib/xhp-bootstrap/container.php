<?hh

class :bootstrap:container extends :bootstrap:base {
  attribute :div, :bootstrap:base;

  protected function render(): :xhp {
    return
      <div class="container">
        {$this->getChildren()}
      </div>;
  }
}

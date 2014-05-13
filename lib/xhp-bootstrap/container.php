<?hh

class :bootstrap:container extends :bootstrap:base {
  attribute :div, :bootstrap:base;

  category %bootstrap:grid:cellcontent;

  protected function render(): :xhp {
    $class = $this->getAttribute('class');
    if ($class) {
      $this->addClass($class);
    }
    $this->addClass("container");
    return
      <div class={$this->getAttribute('class')}>
        {$this->getChildren()}
      </div>;
  }
}

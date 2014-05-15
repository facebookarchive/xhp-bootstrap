<?hh

class :bootstrap:container extends :bootstrap:base {
  
  attribute :div;

  protected function compose(): :xhp {
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

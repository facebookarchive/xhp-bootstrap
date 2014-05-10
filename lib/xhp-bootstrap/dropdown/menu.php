<?hh

<<ExamplesInClass(':bootstrap:dropdown')>>
final class :bootstrap:dropdown:menu extends :bootstrap:base {
  children (%bootstrap:dropdown:element*);

  protected function render(): :xhp {
    return
      <ul class="dropdown-menu" role="menu">
        {$this->getChildren()}
      </ul>;
  }
}

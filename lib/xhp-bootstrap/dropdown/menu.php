<?hh

<<ExamplesInClass(':bootstrap:dropdown')>>
final class :bootstrap:dropdown:menu extends :bootstrap:base {

  attribute :ul;

  children (%bootstrap:dropdown:element*);

  protected function compose(): :xhp {
    return
      <ul class="dropdown-menu" role="menu">
        {$this->getChildren()}
      </ul>;
  }
}

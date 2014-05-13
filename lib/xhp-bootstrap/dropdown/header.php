<?hh

<<ExamplesInClass(':bootstrap:dropdown')>>
final class :bootstrap:dropdown:header extends :bootstrap:base {
  attribute
    :bootstrap:base;

  protected function render(): :xhp {
    return <li role="presentation" class="dropdown-header">
      {$this->getChildren()}
    </li>;
  }
}

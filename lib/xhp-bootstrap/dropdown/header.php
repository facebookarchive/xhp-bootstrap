<?hh

<<ExamplesInClass(':bootstrap:dropdown')>>
final class :bootstrap:dropdown:header extends :bootstrap:base {

  attribute :li;

  protected function compose(): :xhp {
    return
      <li role="presentation" class="dropdown-header">
        {$this->getChildren()}
      </li>;
  }
}

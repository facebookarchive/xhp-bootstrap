<?hh

<<ExamplesInClass(':bootstrap:dropdown')>>
final class :bootstrap:dropdown:divider extends :bootstrap:base {

  attribute :li;

  category %bootstrap:dropdown:element;

  protected function compose(): :xhp {
    return
      <li role="presentation" class="divider" />;
  }
}

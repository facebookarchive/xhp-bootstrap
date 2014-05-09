<?hh

<<ExamplesInClass(':bootstrap:panel')>>
abstract class :bootstrap:panel:section extends :bootstrap:base {
  attribute
    :bootstrap:base;

  abstract protected function getSectionStyle(): string;

  protected function render(): :xhp {
    $ret =
      <div class={$this->getSectionStyle()}>
        {$this->getChildren()}
      </div>;

    return $ret;
  }
}

<<ExamplesInClass(':bootstrap:panel')>>
class :bootstrap:panel:heading extends :bootstrap:panel:section {
  protected function getSectionStyle(): string {
    return 'panel-heading';
  }
}

<<ExamplesInClass(':bootstrap:panel')>>
class :bootstrap:panel:body extends :bootstrap:panel:section {
  protected function getSectionStyle(): string {
    return 'panel-body';
  }
}

<<ExamplesInClass(':bootstrap:panel')>>
class :bootstrap:panel:footer extends :bootstrap:panel:section {
  protected function getSectionStyle(): string {
    return 'panel-footer';
  }
}

<?hh

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

class :bootstrap:panel:heading extends :bootstrap:panel:section {
  protected function getSectionStyle(): string {
    return 'panel-heading';
  }
}

class :bootstrap:panel:body extends :bootstrap:panel:section {
  protected function getSectionStyle(): string {
    return 'panel-body';
  }
}

class :bootstrap:panel:footer extends :bootstrap:panel:section {
  protected function getSectionStyle(): string {
    return 'panel-footer';
  }
}

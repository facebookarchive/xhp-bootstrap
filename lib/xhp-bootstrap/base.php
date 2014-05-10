<?hh

abstract class :bootstrap:base extends :x:element {
  attribute
    string class,
    string id;

  final protected function transferSpecialAttributes(
    :xhp $target
  ) {
    foreach ($this->getAttributes() as $k => $v) {
      $base = substr($k, 0, 5);
      if ($base === 'data-' || $base === 'aria-') {
        $target->setAttribute($k, $v);
        $this->removeAttribute($k);
      }
    }
  }

  final protected function transferAttributes(
    :xhp $target,
    Vector<string> $attrs,
  ): void {
    foreach ($attrs as $attr) {
      $target->setAttribute($attr, $this->getAttribute($attr));
      $this->removeAttribute($attr);
    }
  }

  final protected function transferAttributesExcept(
    :xhp $target,
    Set<string> $ignore,
  ): void {
    foreach ($this->getAttributes() as $k => $v) {
      if ($ignore->contains($k)) {
        continue;
      }
      $target->setAttribute($k, $v);
      $this->removeAttribute($k);
    }
  }

  final protected function transferCustomAttributesExcept(
    :xhp $target,
    Set<string> $ignore,
  ): void {
    $ignore_set = new Set(
      array_keys(:xhp:html-element::__xhpAttributeDeclaration())
    );
    $ignore_set->addAll($ignore);

    $this->transferAttributesExcept(
      $target,
      $ignore_set,
    );
  }

  // Temporarily pilfered from :xhp:html-element
  // https://github.com/facebook/xhp/pull/62
  public function getID(): string {
    return $this->requireUniqueID();
  }

  public function requireUniqueID(): string {
    if (!($id = $this->getAttribute('id'))) {
      $this->setAttribute('id', $id = substr(md5(mt_rand(0, 100000)), 0, 10));
    }
    return $id;
  }

  public function addClass($class): this {
    $this->setAttribute('class', trim($this->getAttribute('class').' '.$class));
    return $this;
  }

  public function conditionClass($cond, $class): this {
    if ($cond) {
      $this->addClass($class);
    }
    return $this;
  }
}

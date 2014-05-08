<?hh

abstract class :bootstrap:base extends :x:element {
  attribute
    string class,
    string id;

  // Temporarily pilfered from :xhp:html-element
  // https://github.com/facebook/xhp/pull/62
  public function getID() {
    return $this->requireUniqueID();
  }

  public function requireUniqueID() {
    if (!($id = $this->getAttribute('id'))) {
      $this->setAttribute('id', $id = substr(md5(mt_rand(0, 100000)), 0, 10));
    }
    return $id;
  }

  public function addClass($class) {
    $this->setAttribute('class', trim($this->getAttribute('class').' '.$class));
    return $this;
  }

  public function conditionClass($cond, $class) {
    if ($cond) {
      $this->addClass($class);
    }
    return $this;
  }
}

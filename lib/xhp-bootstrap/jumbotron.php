<?hh

class :bootstrap:jumbotron extends :x:element {
  attribute
    string title;

  protected function render(): :xhp {
    $title = $this->getAttribute('title');
    if ($title) {
      $title = <h1>{$title}</h1>;
    }

    return
      <div class="jumbotron">
      {$title}
      {$this->getChildren()}
      </div>;
  }
}

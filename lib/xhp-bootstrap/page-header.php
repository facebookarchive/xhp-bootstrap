<?hh

class :bootstrap:page-header extends :x:element {
  attribute
    string title @required;

  protected function render(): xhp {
    $lead = $this->getChildren();
    if ($lead) {
      $lead = <p class="lead">{$lead}</p>;
    }

    return
      <div class="page-header">
        <h1>{$this->getAttribute('title')}</h1>
        {$lead}
      </div>;
  }
}

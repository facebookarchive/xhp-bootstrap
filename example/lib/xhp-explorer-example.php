<?hh
/*
 *  Copyright (c) 2014, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the BSD-style license found in the
 *  LICENSE file in the root directory of this source tree. An additional grant
 *  of patent rights can be found in the PATENTS file in the same directory.
 *
 */

final class :xhp-explorer:example extends :x:element {
  attribute
    ReflectionMethod example @required;

  protected function render(): XHPRoot {
    $example = $this->:example;

    return
      <div>
        <bootstrap:panel>
          <bootstrap:panel:heading>
            <h3 class="panel-title">{$this->getTitle()}</h3>
          </bootstrap:panel:heading>
          <bootstrap:panel:body>
            {$this->renderOutput()}
          </bootstrap:panel:body>
          <bootstrap:panel:footer>
            {$this->renderSource()}
          </bootstrap:panel:footer>
        </bootstrap:panel>
      </div>;
  }

  private function renderSource(): :xhp {
    $example = $this->:example;

    $file = file_get_contents($example->getFileName());
    $lines = explode("\n", $file);
    $source_lines = array_slice(
      $lines,
      (int) $example->getStartLine() - 1, // First line is 1, not 0
      ((int) $example->getEndLine() - (int) $example->getStartLine()) + 1
    );

    return
      <pre class="prettyprint lang-php">
        {implode("\n", $source_lines)}
      </pre>;
  }

  private function renderOutput(): :xhp {
    $example = $this->:example;
    return
      <div class="example">
        {$example->invoke(null)}
      </div>;
  }

  private function getTitle(): XHPChild {
    $example = $this->:example;
    $title = $example->getAttribute('ExampleTitle');
    return $title === null ? $example->getName() : $title;
  }
}

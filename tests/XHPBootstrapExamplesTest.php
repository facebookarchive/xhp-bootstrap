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

require_once(__DIR__.'/../example/lib/ExamplesData.php');

class XHPBootstrapExamplesTest extends PHPUnit_Framework_TestCase {
  public function setUp(): void {
    error_reporting(~0);
  }

  public function testHaveSomeClasses(): void {
    $classes = ExamplesData::GetBootstrapClasses();
    $this->assertNotEmpty($classes);
    $this->assertContains(
      :bootstrap:jumbotron::class,
      $classes,
    );
  }

  public function allExamplesProvider(): array<array<mixed>> {
    $classes = ExamplesData::GetBootstrapClasses();
    $out = array();
    foreach ($classes as $class) {
      $examples = ExamplesData::GetExamples($class);
      foreach ($examples as $example) {
        $out[] = [$class.'::'.$example->getName(), $example];
      }
    }
    return $out;
  }

  /**
   * @dataProvider allExamplesProvider
   */
  public function testExamplesRendersToXHP(
    string $name,
    ReflectionMethod $rf,
  ): void {
    $xhp = $rf->invoke(null);
    $this->assertInstanceOf(
      XHPRoot::class,
      $xhp,
      $name.' did not return valid XHP'
    );
  }

  /**
   * @dependsOn testExampleRendersToXHP
   * @dataProvider allExamplesProvider
   */
  public function testExampleRendersToString(
    string $name,
    ReflectionMethod $rf,
  ) {
    $xhp = $rf->invoke(null);
    // Some validation is done on render - trigger it all :)
    $html = $xhp->toString();
    $this->assertSame(
      'string',
      gettype($html),
    );
    $this->assertRegExp(
      '/^<.*>$/',
      $html,
    );
  }
}

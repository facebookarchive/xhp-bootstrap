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

class ExamplesData {
  public static function GetBootstrapClasses(): Vector<string> {
    $classmap =
      require(__DIR__ . '/../../vendor/composer/autoload_classmap.php');
    $all_classes = new Vector(array_keys($classmap));
    return $all_classes->filter(
      $x ==>
        strpos($x, 'xhp_bootstrap__') === 0
        && !(new ReflectionClass($x))->isAbstract()
    );
  }

  public static function GetExamples(string $class): Vector<ReflectionMethod> {
    if (strpos($class, 'xhp_bootstrap__') !== 0) {
      return Vector { };
    }

    $rc = new ReflectionClass($class);
    $example_class = $rc->getAttribute('ExamplesInClass');
    if ($example_class !== null) {
      $example_class = $example_class[0];
      $mangled =
        'xhp_'.str_replace([':', '-'], ['__', '_'], substr($example_class, 1));
      $rc = new ReflectionClass($mangled);
    }
    $candidates = $rc->getMethods(
      ReflectionMethod::IS_STATIC | ReflectionMethod::IS_PUBLIC
    );

    $examples = Vector { };
    foreach ($candidates as $candidate) {
      if (preg_match('/^__example[0-9]+$/', $candidate->getName())) {
        $examples[] = $candidate;
      }
    }
    return $examples;
  }

  public static function GetClassesWithExamples(
  ): Map<string, Vector<ReflectionMethod>> {
    $out = Map { };
    foreach (self::GetBootstrapClasses() as $class) {
      $examples = self::GetExamples($class);
      if ($examples) {
        $out[$class] = $examples;
      }
    }
    return $out;
  }
}

<?hh

class ExamplesData {
  public static function GetBootstrapClasses(): Vector<string> {
    $all_classes = Vector::fromArray(
      array_keys(TerribleAutoloader::GetClassMap()
    ));
    return $all_classes->filter($x ==> strpos($x, 'xhp_bootstrap__') === 0);
  }

  public static function GetExamples(string $class): Vector<ReflectionMethod> {
    if (strpos($class, 'xhp_bootstrap__') !== 0) {
      return Vector { };
    }

    $rc = new ReflectionClass($class);
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

<?hh

/* TODO: replace with composer classmap autoloader when
 * https://github.com/composer/composer/pull/2912 + related issues are in a
 * stable release. This is a temporary kludge. */

class TerribleAutoloader {
  private static function classesInFile($file) {
    $contents = file_get_contents($file);
    $tokens = token_get_all($contents);
    $previous_was_class = false;
    $classes = array();
    foreach ($tokens as $token) {
      $type = $token[0];
      $value = sizeof($token) > 1 ? $token[1] : null;
      if ($type === T_CLASS) {
        $previous_was_class = true;
        continue;
      }

      if ($previous_was_class) {
        if ($type === T_WHITESPACE) {
          continue;
        }
        if ($type === T_XHP_LABEL) {
          $value = substr($value, 1);
          // Mangle...
          $classes[] = 'xhp_'.str_replace([':', '-'], ['__', '_'], $value);
        } else if ($type === T_STRING) {
          $classes[] = strtolower($value);
        }
      }

      $previous_was_class = false;
    }
    return $classes;
  }

  private static function classesInDir($dir) {
    $classes = array();
    $dir_it = new RecursiveDirectoryIterator($dir);
    foreach (new RecursiveIteratorIterator($dir_it) as $info) {
      $fname = $info->getRealPath();
      if ($info->getExtension() === 'php') {
        foreach (self::classesInFile($fname) as $class) {
          $classes[$class] = $fname;
        }
      }
    }
    return $classes;
  }

  private static ?array $classMap;
  public static function GetClassMap(): array<string, string> {
    if (self::$classMap === null) {
      $dirs = ['../lib/', '../vendor/facebook/xhp/php-lib/', './'];
      $classes = array();
      foreach ($dirs as $dir) {
        $classes += self::classesInDir($dir);
      }
      self::$classMap = $classes;
    }
    return self::$classMap;
  }

  private static bool $inited = false;
  public static function Init() {
    if (self::$inited) {
      return;
    }
    self::$inited = true;
    HH\autoload_set_paths(array('class' => self::GetClassMap()), __DIR__);
  }
}

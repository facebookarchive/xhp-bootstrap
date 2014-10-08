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

require_once('../vendor/autoload.php');

require_once(__DIR__ . '/lib/init.php');

$bootstrap_classes = ExamplesData::GetBootstrapClasses();
$class = array_key_exists('classname', $_GET)
  ? $_GET['classname'] : $bootstrap_classes->at(0);
$examples = ExamplesData::GetExamples($class);
sort($bootstrap_classes);

function prettify_class(string $mangled): string {
  return preg_replace(
    '/^xhp-/',
    '<',
    str_replace(['__', '_'], [':', '-'], $mangled)
  ).' />';
}

print
  <x:doctype>
    <html>
      <head>
        <title>{prettify_class($class)}</title>
        <meta
          name="viewport"
          content="width=device-width, initial-scale=1.0"
        />
        <!-- Latest compiled and minified CSS -->
        <link
          rel="stylesheet"
          href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"
        />
        <!-- Bootstrap JS requires JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" />
        <!-- Latest compiled and minified JavaScript -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" />
        <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js" />
        <link rel="stylesheet" href="./styles.css" />
      </head>
      <body>
        <bootstrap:root>
          <bootstrap:navbar position="static-top" theme="inverse">
            <bootstrap:navbar:brand href="#">
              XHP Bootstrap
            </bootstrap:navbar:brand>
          </bootstrap:navbar>
          <bootstrap:container>
            <bootstrap:page-header title={prettify_class($class)} />
            <bootstrap:container class="col-xs-12 col-sm-9">
              <xhp-explorer:category classname={$class} />
              <xhp-explorer:children classname={$class} />
              <xhp-explorer:attributes classname={$class} />
              <h2>Examples</h2>
              {$examples->map($x ==> <xhp-explorer:example example={$x} />)}
            </bootstrap:container>
            <bootstrap:container class="col-xs-6 col-sm-3">
              <bootstrap:list-group>
                {$bootstrap_classes->map(
                  $class_name ==>
                    <bootstrap:list-group-item
                      href={"example.php?classname=".$class_name}
                      active={$class_name === $class}>
                      {prettify_class($class_name)}
                    </bootstrap:list-group-item>
                )}
              </bootstrap:list-group>
            </bootstrap:container>
          </bootstrap:container>
        </bootstrap:root>
      </body>
    </html>
  </x:doctype>;

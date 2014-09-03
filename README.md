XHP classes for the Bootstrap project
=====================================

Overview
--------

The [Bootstrap](http://getbootstrap.com) project is a popular HTML, CSS, and
JS framework providing common components for web pages. This project provides
XHP classes for these components.

Getting Started
---------------

Take a look at the reference documentation, and at the source of
example/example.php.

Sorry, we're aware that we need more documentation here. If you like writing,
we'd love a pull request!

Examples/Reference Documentation
--------------------------------

All the classes have static example functions; you can interact with these
by configuring a webserver to look inside the example/ directory and accessing
example.php.

You can also browse this at http://bootstrap.hhvm.com

Requirements
------------

- HHVM with hhvm.enable\_xhp=1 set in the ini file (or Eval.EnableXHP=1 in the
  HDF file)
- Composer

Differences
-----------

In the bootstrap documentation, a component's
default/primary/success/info/warning/danger/link state
(white/dark blue/green/light blue/orange/red/link) is referred to as 'use' for
some components, but 'color' for others. XHP-Bootstrap uses the 'use' attribute
throughout for consistency.

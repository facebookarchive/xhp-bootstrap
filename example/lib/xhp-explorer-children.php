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

final class :xhp-explorer:children extends :x:element {
  attribute
    string classname @required,
    string title = 'Children';

  private function renderDecl(
    ReflectionXHPChildrenDeclaration $decl,
  ): XHPChild {
    switch ($decl->getType()) {
      case XHPChildrenDeclarationType::NO_CHILDREN:
        return <em>empty</em>;
      case XHPChildrenDeclarationType::ANY_CHILDREN:
        return <em>any</em>;
      case XHPChildrenDeclarationType::EXPRESSION:
        return <x:frag>({$this->renderExpr($decl->getExpression())})</x:frag>;
    }
  }

  private function renderExpr(
    ReflectionXHPChildrenExpression $expr,
  ): XHPChild {
    switch ($expr->getType()) {
      case XHPChildrenExpressionType::SINGLE:
        return $this->renderRule($expr);
      case XHPChildrenExpressionType::ANY_NUMBER:
        return <x:frag>{$this->renderRule($expr)}*</x:frag>;
      case XHPChildrenExpressionType::ZERO_OR_ONE:
        return <x:frag>{$this->renderRule($expr)}?</x:frag>;
      case XHPChildrenExpressionType::ONE_OR_MORE:
        return <x:frag>{$this->renderRule($expr)}+</x:frag>;
      case XHPChildrenExpressionType::SUB_EXPR_SEQUENCE:
        list($e1, $e2) = $expr->getSubExpressions();
        return
          <x:frag>{$this->renderExpr($e1)}, {$this->renderExpr($e2)}</x:frag>;
      case XHPChildrenExpressionType::SUB_EXPR_DISJUNCTION:
        list($e1, $e2) = $expr->getSubExpressions();
        return
          <x:frag>{$this->renderExpr($e1)} | {$this->renderExpr($e2)}</x:frag>;
    }
  }

  private function renderRule(
    ReflectionXHPChildrenExpression $rule,
  ): XHPChild {
    switch ($rule->getConstraintType()) {
      case XHPChildrenConstraintType::ANY:
        return <em>any</em>;
      case XHPChildrenConstraintType::PCDATA:
        return <em>pcdata</em>;
      case XHPChildrenConstraintType::ELEMENT:
        $class = $rule->getConstraintString();
        $elem = :xhp::class2element($class);
        if (!strncmp('xhp_bootstrap__', $class, 15)) {
          return
            <code><a href={'?classname='.$class}>{$elem}</a></code>;
        } else {
          return <code>{$elem}</code>;
        }
      case XHPChildrenConstraintType::CATEGORY:
        return <code>%{$rule->getConstraintString()}</code>;
      case XHPChildrenConstraintType::SUB_EXPR:
        return $this->renderExpr($rule->getSubExpression());
    }
  }

  protected function render(): XHPRoot {
    $rows = Vector { };
    $title = $this->:title;
    $children = $this->renderDecl(
      (new ReflectionXHPClass($this->:classname))
      ->getChildren()
    );
    return
      <x:frag>
        <h2>{$title}</h2>
        {$children}
      </x:frag>;
  }
}

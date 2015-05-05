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

final class :bootstrap:glyphicon extends :bootstrap:base {
  attribute
    :span,
    enum {
      'asterisk',
      'plus',
      'euro',
      'minus',
      'cloud',
      'envelope',
      'pencil',
      'glass',
      'music',
      'search',
      'heart',
      'star',
      'star-empty',
      'user',
      'film',
      'th-large',
      'th',
      'th-list',
      'ok',
      'remove',
      'zoom-in',
      'zoom-out',
      'off',
      'signal',
      'cog',
      'trash',
      'home',
      'file',
      'time',
      'road',
      'download-alt',
      'download',
      'upload',
      'inbox',
      'play-circle',
      'repeat',
      'refresh',
      'list-alt',
      'lock',
      'flag',
      'headphones',
      'volume-off',
      'volume-down',
      'volume-up',
      'qrcode',
      'barcode',
      'tag',
      'tags',
      'book',
      'bookmark',
      'print',
      'camera',
      'font',
      'bold',
      'italic',
      'text-height',
      'text-width',
      'align-left',
      'align-center',
      'align-right',
      'align-justify',
      'list',
      'indent-left',
      'indent-right',
      'facetime-video',
      'picture',
      'map-marker',
      'adjust',
      'tint',
      'edit',
      'share',
      'check',
      'move',
      'step-backward',
      'fast-backward',
      'backward',
      'play',
      'pause',
      'stop',
      'forward',
      'fast-forward',
      'step-forward',
      'eject',
      'chevron-left',
      'chevron-right',
      'plus-sign',
      'minus-sign',
      'remove-sign',
      'ok-sign',
      'question-sign',
      'info-sign',
      'screenshot',
      'remove-circle',
      'ok-circle',
      'ban-circle',
      'arrow-left',
      'arrow-right',
      'arrow-up',
      'arrow-down',
      'share-alt',
      'resize-full',
      'resize-small',
      'exclamation-sign',
      'gift',
      'leaf',
      'fire',
      'eye-open',
      'eye-close',
      'warning-sign',
      'plane',
      'calendar',
      'random',
      'comment',
      'magnet',
      'chevron-up',
      'chevron-down',
      'retweet',
      'shopping-cart',
      'folder-close',
      'folder-open',
      'resize-vertical',
      'resize-horizontal',
      'hdd',
      'bullhorn',
      'bell',
      'certificate',
      'thumbs-up',
      'thumbs-down',
      'hand-right',
      'hand-left',
      'hand-up',
      'hand-down',
      'circle-arrow-right',
      'circle-arrow-left',
      'circle-arrow-up',
      'circle-arrow-down',
      'globe',
      'wrench',
      'tasks',
      'filter',
      'briefcase',
      'fullscreen',
      'dashboard',
      'paperclip',
      'heart-empty',
      'link',
      'phone',
      'pushpin',
      'usd',
      'gbp',
      'sort',
      'sort-by-alphabet',
      'sort-by-alphabet-alt',
      'sort-by-order',
      'sort-by-order-alt',
      'sort-by-attributes',
      'sort-by-attributes-alt',
      'unchecked',
      'expand',
      'collapse-down',
      'collapse-up',
      'log-in',
      'flash',
      'log-out',
      'new-window',
      'record',
      'save',
      'open',
      'saved',
      'import',
      'export',
      'send',
      'floppy-disk',
      'floppy-saved',
      'floppy-remove',
      'floppy-save',
      'floppy-open',
      'credit-card',
      'transfer',
      'cutlery',
      'header',
      'compressed',
      'earphone',
      'phone-alt',
      'tower',
      'stats',
      'sd-video',
      'hd-video',
      'subtitles',
      'sound-stereo',
      'sound-dolby',
      'sound-5-1',
      'sound-6-1',
      'sound-7-1',
      'copyright-mark',
      'registration-mark',
      'cloud-download',
      'cloud-upload',
      'tree-conifer',
      'tree-deciduous'
    } icon @required,
    :bootstrap:base;

  protected function render(): XHPRoot {
    $this->addClass('glyphicon');
    $this->addClass('glyphicon-'.$this->:icon);

    return <span/>;
  }

  <<ExampleTitle('Glyphicon OK')>>
  public static function __example1(): :xhp {
    return
      <bootstrap:glyphicon icon="ok" />;
  }

  <<ExampleTitle('All Glyphicons')>>
  public static function __example2(): :xhp {
    $glyphs = array();
    // Shhh, __xhpAttributeDeclaration() is an internal API
    // you probably shouldn't depend on it. It's also non-static.
    // UNSAFE
    foreach (self::__xhpAttributeDeclaration()['icon'][1] as $name) {
      $glyphs[] =
        <tr>
          <td>{$name}</td>
          <td><bootstrap:glyphicon icon={$name} /></td>
        </tr>;
    }
    return
      <bootstrap:table>
        <tbody>
          {$glyphs}
        </tbody>
      </bootstrap:table>;
  }
}

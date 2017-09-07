<?php

namespace drexlerux\ui;
use yii\web\AssetBundle;
/**
 * LcsWitch AssetBundle class for call lc switch bower-asset
 */

class DateTimePickerAsset extends AssetBundle
{
    public $sourcePath = '@bower/flat-datetimepicker';
    public $js = [
        'dist/DateTimePicker.min.js',
        'dist/i18n/DateTimePicker-i18n.js'
    ];

    public $css = [
        'dist/DateTimePicker.min.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}

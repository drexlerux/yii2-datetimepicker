<?php

namespace drexlerux\datetimepicker;
use Yii;
use yii\bootstrap\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;
/**
 * This is just an example.
 */
class DateTimePicker extends InputWidget
{
    public $options = [];
    public $widgetOptions = [];
    private $inputId;
    public function init()
    {
        $defaults = [
            'data-field' => 'date',
            'readonly' => true,
            'class'=>'form-control'
        ];

        $this->options = array_merge($defaults, $this->options);

        $this->inputId = Html::getInputId($this->model, $this->attribute);

        $defaultsWidgetOptions = [
            'language' => Yii::$app->language,
            'dateTimeFormat' => 'yyyy-MM-dd hh:mm:ss',
            'dateFormat' => 'yyyy-MM-dd',
        ];

        $this->widgetOptions = array_merge($defaultsWidgetOptions, $this->widgetOptions);

        $this->widgetOptions = Json::encode($this->widgetOptions);
    }

    public function run()
    {
        $this->registerScript();
        $input = Html::activeTextInput($this->model, $this->attribute, $this->options);
        $box = "<div id=\"box_$this->inputId\"></div>";
        echo $input . $box;
    }

    public function registerScript(){
        $view = $this->getView();
        $asset = DateTimePickerAsset::register($view);
        $js =  "
            $(document).ready(function(){
                $('#box_$this->inputId').DateTimePicker($this->widgetOptions);
            });
        ";

        $view->registerJs($js);
    }
}

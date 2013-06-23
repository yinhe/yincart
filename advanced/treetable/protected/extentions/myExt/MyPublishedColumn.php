<?php
class MyPublishedColumn extends CDataColumn
{
    public $assets = 'application.components.zii.gridColumns.assets';
    public $icon_true;
    public $icon_false;
    public $title_true;
    public $title_false;

    public $htmlOptions = array(
        'style' => 'width:50px;'
    );


    public function init()
    {
        parent::init();

        $this->assets =
            Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias($this->assets)) . '/publishedColumn';

        $this->initVariables();
       // $this->grid->onRegisterScript = array($this, 'registerScript');
    }

    public function initVariables()
    {
        if ($this->filter === null )
        {
            $this->filter = array(t("No"),t("Yes"));
        }
        if ($this->icon_true === null)
        {
            $this->icon_true = $this->assets . '/img/eye.png';
        }

        if ($this->icon_false === null)
        {
            $this->icon_false = $this->assets . '/img/eye_na.png';
        }
        if ($this->title_true === null)
        {
            $this->title_true = t('Visible in the menu');
        }
        if ($this->title_false === null)
        {
            $this->title_false = t('Do not see the menu');
        }
    }


    /**
     * Registers necessary client scripts.
     */
    public function registerScript()
    {
        $options = CJavaScript::encode(array(
            'icon_true'        => $this->icon_true,
            'icon_false'       => $this->icon_false,
            'title_false'      => $this->title_false,
            'title_false'      => $this->title_false,
            'model'            => $this->grid->dataProvider->modelClass,
            'attribute'        => $this->name,
        ));
        Yii::app()->clientScript->registerScriptFile($this->assets . '/js/publishedColumn.js')
            ->registerScript(get_class($this), "$('#{$this->grid->id}').publishedColumn({$options});");

    }


    public function renderDataCellContent($row, $data)
    {
        $img   = $data->{$this->name} ? $this->icon_true : $this->icon_false;
        $title = $data->is_published ? $this->title_true : $this->title_false;
        $img   = CHtml::image($img, $title);

        echo CHtml::link($img, Yii::app()->controller->createUrl('/admin/helpAdmin/saveAttribute'), array(
            'data-id'    => $data->getPrimaryKey(),
            'data-value' => $data->is_published,
            'class'      => 'published_icon'
        ));
    }

}
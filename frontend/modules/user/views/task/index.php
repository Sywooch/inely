<?php

    use yii\helpers\Html;
    use yii\helpers\ArrayHelper;
    use kartik\grid\GridView;
    use kartik\editable\Editable;
    use kartik\datetime\DateTimePicker;
    use kartik\rating\StarRating;
    use kartik\sidenav\SideNav;
    use frontend\modules\user\models\Task;

    /* @var $this yii\web\View */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = 'Ваши задачи';
?>

<div class="main-content">

<script>
    /*$(document).ready(function() {
        $("a.kv-toggle < .glyphicon").on("mouseover", function() {
            $(this).css("color", "red");
        });
    });*/
</script>

<?=
    SideNav::widget([
        'type' => SideNav::TYPE_DEFAULT,
        'heading' => 'Категории',
        'indItem' => false,
        'items' => Task::getItems()
    ]);
?>

<div class="topbar">
    <?php $this->beginContent('@app/views/layouts/templates/topbar.php'); $this->endContent(); ?>
</div>

<div class="page-content page-thin">
    <div class="task-index">

        <?php
            $gridColumns = [
                /*[
                    'class' => '\kartik\grid\EditableColumn',
                    'attribute' => 'is_done',
                    'editableOptions' => [
                        'header' => 'вашу задачу',
                        'inputType' => \kartik\editable\Editable::INPUT_CHECKBOX,
                        'buttonsTemplate' => '{submit}',
                        'inlineSettings' => [
                            'options' => [
                                'class' => ''
                            ],
                        ],
                    ],
                ],*/
                /*
                     * ArrayHelper::map(
                        Task::find()
                            ->limit(10)
                            ->where(['author' => \Yii::$app->user->id])
                            ->asArray()
                            ->all(), 'id', 'name'
                    ),
                     */
                [
                    'class' => 'kartik\grid\BooleanColumn',
                    'attribute' => 'is_done',
                    'vAlign' => 'middle',
                    'width' => '110px',
                    //'format'=>'raw',
                    //'filterType' => GridView::FILTER_SELECT2,
                    /*'filter' => \kartik\select2\Select2::widget([
                        'model' => $searchModel,
                        'attribute' => 'is_done',
                    ]),*/
                    'value' => function($model) {
                        return ($model->is_done == null) ? false : true;
                    },
                ],
                [
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute' => 'name',
                    'width' => '600px',
                    //'header' => 'Логин',
                    'vAlign'=>'middle',
                    //'filterType' => GridView::FILTER_SELECT2,
                    /*'filter' => ArrayHelper::map(
                        Task::find()
                            ->orderBy('name')
                            ->limit(10)
                            ->where(['author' => \Yii::$app->user->id])
                            ->asArray()
                            ->all(), 'id', 'name'
                    ),
                    'filterWidgetOptions' => [
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ],
                    'filterInputOptions' => [
                        'placeholder' => 'Введите логин'
                    ],*/
                    'editableOptions' => [
                        'placement' => 'top',
                        'header' => 'вашу задачу',
                        'inputType' => Editable::INPUT_TEXT,
                        'size' => 'md',
                    ],
                ],
                /*[
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute' => 'category',
                    'pageSummary' => true,
                    'editableOptions'=> function ($model, $key, $index, $widget) {
                        return [
                            'header' => 'цвет значка',
                            'size' => 'md',
                            'afterInput' => function ($form, $widget) use ($model, $index) {
                                return $form->field($model->tasks_cat, "badge_color")->widget(\kartik\color\ColorInput::classname(), [
                                    'showDefaultPalette' => false,
                                    'options' => [
                                        'id' => "color-{$index}"
                                    ],
                                    'pluginOptions' => [
                                        'showPalette' => true,
                                        'showPaletteOnly' => true,
                                        'showSelectionPalette' => true,
                                        'showAlpha' => false,
                                        'allowEmpty' => false,
                                        'preferredFormat' => 'name',
                                        'palette' => [
                                            [
                                                "#FFFFFF", "#001F3F", "#0074D9", "#7FDBFF", "#39CCCC", "#3D9970",
                                            ],
                                            [
                                                "#2ECC40", "#01FF70", "#FFDC00", "#FF851B", "#FF4136", "#85144b"
                                            ],
                                            [
                                                "#F012BE", "#B10DC9", "#111111", "#AAAAAA",
                                            ],
                                        ]
                                    ],
                                ]);
                            }
                        ];
                    }
                ],*/
                [
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute' => 'time',
                    'editableOptions' => [
                        'inputType' => \kartik\editable\Editable::INPUT_DATETIME,
                        //'name' => 'time',
                        'placement' => 'left',
                        'header' => 'дату',
                        'options' => [
                            'language' => 'ru',
                            'removeButton' => false,
                            //'convertFormat' => true,
                            'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                            'size' => 'md',
                            'value' => function($model) {
                                return $model->time;
                            },
                            'pluginOptions' => [
                                'autoclose' => true,
                                'todayHighlight' => true,
                                'format' => 'dd.mm hh:ii',
                            ],
                        ],
                    ],
                ],
                /*[
                    'class' => '\kartik\grid\EditableColumn',
                    'attribute' => 'priority',
                    'editableOptions' => [
                        'placement' => 'top',
                        'displayValueConfig'=>[
                            1 => 'Одна звезда',
                            2 => 'Две звезды',
                            3 => 'Три звезды',
                            4 => 'Четыре звезды',
                            5 => 'Пять звезд',
                        ],
                        'attribute' => 'priority',
                        'header' => 'рейтинг',
                        'size' => 'sm',
                        'inputType' => Editable::INPUT_RATING,
                        'editableValueOptions' => [
                            'class' => 'text-success'
                        ],
                    ],
                ],*/
                [
                    'attribute' => 'priority',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return StarRating::widget([
                            'model' => $model,
                            'name' => 'priority',
                            'value' => $model->priority,
                            'pluginOptions' => [
                                'size' => 'xs',
                                'stars' => 3,
                                'min' => 0,
                                'max' => 3
                            ],
                        ]);
                    }
                ]
                //'is_done_date',*/
            ];
        ?>



        <?=
            GridView::widget([
                'dataProvider'=> $dataProvider,
                'filterModel' => $searchModel,
                'columns' => $gridColumns,
                'responsive' => true,
                'responsiveWrap' => true,
                'resizableColumns' => true,
                'hover' => true,
                'export' => false,
                'pjax' => true,
                'rowOptions' => function ($model) {
                    return [
                        'class' => $model->is_done ? GridView::TYPE_SUCCESS : GridView::TYPE_DANGER,
                    ];
                },
                'pjaxSettings' => [
                    'neverTimeout' => true,
                    'loadingCssClass' => false
                ],
                'panel' => [
                    'heading' => '<i class="fa fa-inbox"></i> <span>Список задач</span>',
                    'type' => GridView::TYPE_PRIMARY,
                    'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Create Country', ['create'], [
                        'class' => 'btn btn-success btn-square']),
                    'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], [
                        'class' => 'btn btn-info btn-square']),
                    'footer' => false
                ],
            ]);
        ?>

    </div>
<div class="footer">
    <div class="copyright">
        <p class="pull-left sm-pull-reset">
            <span>Copyright <span class="copyright">©</span>2015</span>
            <span>devv</span>.
            <span>All rights reserved.</span>
        </p>

        <p class="pull-right sm-pull-reset">
            <span>
                <a href="#" class="m-r-10">Support</a> |
                <a href="#" class="m-l-10 m-r-10">Terms of use</a> |
                <a href="#" class="m-l-10">Privacy Policy</a>
            </span>
        </p>
    </div>
</div>
</div>
</div>

















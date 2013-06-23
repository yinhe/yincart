Расширение CTreeGridView
Автор quantum13
http://quantum13.ru/


CQTreeGridView - расширение для стандартного CGridView, для работы с моделями, расширенными YiiExt Nested set behaviour (http://code.google.com/p/yiiext/). Для визуального отображения используется плагин для jQuery treeTable (http://plugins.jquery.com/project/treeTable), для перетаскивания - jQuery ui.

Работа по перемещению веток с помощью drag-and-drop. Потомка сделать корнем можно!

В расширении уже есть типовые actions, которые можно подключить. Или взять за основу для своих.

Внутри архива уже есть нужные jQuery ui и jQuery treeTable. jQuery treeTable немного изменен.

Использование:
- Сгенерировать модель, crud. Избавиться от упоминаний id, leftkey, rightkey И level в модели и формах.
- Cкачать YiiExt Nested set behaviour, следуя инструкциям расширить модель. Если Выбрали режим с одним корнем - вставить вручную запись с id=1, level=1, leftKey=1, rightKey=2. В модели сделать публичное свойство parentId. 
- Добавить в метод search сортировку по полю root (если есть) и leftkey. Если все делали по инструкции, то этой строчкой:
[code=php]
        $criteria->order = $this->tree->hasManyRoots
                           ?$this->tree->rootAttribute . ', ' . $this->tree->leftAttribute
                           :$this->tree->leftAttribute;
[/code]
- Скачать CQTreeGridView, положить в extensions.
- Во вью admin вместо виджета [i]zii.widgets.grid.CGridView[/i] использовать [i]ext.QTreeGridView.CQTreeGridView[/i] , добавить опцию 'ajaxUpdate' => false.
- добавить в контроллер:
[code=php]
    public $CQtreeGreedView  = array (
        'modelClassName' => 'Page2', //название класса
        'adminAction' => 'admin' //action, где выводится QTreeGridView. Сюда будет идти редирект с других действий.
    );
[/code]
- добавить типовые действия в контроллер:
[code=php]
    public function actions() {
        return array (
            'create'=>'ext.QTreeGridView.actions.Create',
            'update'=>'ext.QTreeGridView.actions.Update',
            'delete'=>'ext.QTreeGridView.actions.Delete',
            'moveNode'=>'ext.QTreeGridView.actions.MoveNode',
            'makeRoot'=>'ext.QTreeGridView.actions.MakeRoot',
        );
    }
[/code]

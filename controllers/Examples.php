<?php namespace Bedard\DragDrop\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Bedard\DragDrop\Models\Example;
use Flash;

/**
 * Examples Back-end Controller
 */
class Examples extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Bedard.DragDrop', 'dragdrop', 'examples');

        // Grab the drag and drop requirements
        $this->addCss('/plugins/bedard/dragdrop/assets/css/sortable.css');
        $this->addJs('/plugins/bedard/dragdrop/assets/js/html5sortable.js');
        $this->addJs('/plugins/bedard/dragdrop/assets/js/sortable.js');
    }

    /**
     * Extend the list query to position the rows correctly
     */
    public function listExtendQuery($query, $definition = null)
    {
        $query->orderBy('position', 'asc');
    }

    /*
     * Reorder the row positions
     */
    public function index_onUpdatePosition()
    {
        $moved = [];
        $position = 0;
        if (($reorderIds = post('checked')) && is_array($reorderIds) && count($reorderIds)) {
            foreach ($reorderIds as $id) {
                if (in_array($id, $moved) || !$record = Example::find($id))
                    continue;
                $record->position = $position;
                $record->save();
                $moved[] = $id;
                $position++;
            }
            Flash::success('Successfully re-ordered records.');
        }
        return $this->listRefresh();
    }
}
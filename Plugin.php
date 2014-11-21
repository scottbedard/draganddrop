<?php namespace Bedard\DragDrop;

use Backend;

use System\Classes\PluginBase;

/**
 * DragDrop Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'DragDrop',
            'description' => 'No description provided yet...',
            'author'      => 'Bedard',
            'icon'        => 'icon-arrows'
        ];
    }


    /**
     * Returns backend navigation
     *
     * @return  Array
     */
    public function registerNavigation()
    {
        return [
            'dragdrop' => [
                'label'         => 'Drag and Drop',
                'url'           => Backend::url('bedard/dragdrop/examples'),
                'icon'          => 'icon-arrows',
                'order'         => 500,
            ]
        ];
    }
}

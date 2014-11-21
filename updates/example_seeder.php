<?php namespace Bedard\Shop\Updates;

use Illuminate\Database\Eloquent\Model;
use October\Rain\Database\Updates\Seeder;

use Bedard\DragDrop\Models\Example;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        // Category Seeds
        Example::truncate();
        
        $i = 0;
        foreach (explode(' ', "This plugin is just a proof of concept. Have fun!") as $label) {
            Example::create([
                'position'  => $i,
                'label'     => $label,
                'active'    => 1
            ]);
            $i++;
        }

        foreach (explode(' ', "---------- These rows are disabled!") as $label)
            Example::create([
                'label'     => $label,
                'active'    => 0
            ]);
    }

}
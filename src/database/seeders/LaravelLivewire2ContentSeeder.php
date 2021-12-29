<?php

namespace Database\Seeders;

use App\Models\Element;
use App\Models\ElementTemplate;
use GMJ\LaravelLivewire2Content\Models\Block;
use Illuminate\Database\Seeder;

class LaravelLivewire2ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $template = ElementTemplate::where("component", "LaravelLivewire2Content")->first();

        if ($template) {
            return false;
        }

        $template = ElementTemplate::create(
            [
                "title" => "Laravel Livewire2 Content",
                "component" => "LaravelLivewire2Content",
            ]
        );

        $element1 = Element::create([
            "template_id" => $template->id,
            "title" => "laravel-livewire2-content-sample-normal",
            "is_active" => 1,
        ]);
        $sample1 = Block::init($element1->id, 1);
        $sample1->save();

        $element2 = Element::create([
            "template_id" => $template->id,
            "title" => "laravel-livewire2-content-sample-circle",
            "is_active" => 1,
        ]);
        $sample2 = Block::init($element2->id, 2);
        $sample2->save();

        $element3 = Element::create([
            "template_id" => $template->id,
            "title" => "laravel-livewire2-content-sample-2col-1",
            "is_active" => 1,
        ]);
        $sample3 = Block::init($element3->id, 3);
        $sample3->save();

        $element4 = Element::create([
            "template_id" => $template->id,
            "title" => "laravel-livewire2-content-sample-2col-2",
            "is_active" => 1,
        ]);
        $sample4 = Block::init($element4->id, 4);
        $sample4->save();
    }
}

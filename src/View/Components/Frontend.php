<?php

namespace GMJ\LaravelLivewire2Content\View\Components;

use GMJ\LaravelLivewire2Content\Models\Block;
use Illuminate\View\Component;

class Frontend extends Component
{

    public $collection;
    public $config;
    public $page_element_id;
    public $element_id;

    public function __construct($pageElementId, $elementId)
    {
        $this->page_element_id = $pageElementId;
        $this->element_id = $elementId;
        $this->collection = Block::where("element_id", $elementId)->first();
    }

    public function render()
    {
        return view('LaravelLivewire2Content::components.frontend');
    }
}

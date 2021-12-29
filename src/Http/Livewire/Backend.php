<?php

namespace GMJ\LaravelLivewire2Content\Http\Livewire;

use App\Models\Element;
use Livewire\Component;
use Alert;
use GMJ\LaravelLivewire2Content\Models\Block;

class Backend extends Component
{
    public $collection;
    public $element_id;
    public $element;
    public $mode;
    public $listeners = ["save", "changeStyle"];

    public function mount($element_id)
    {
        $this->element_id = $element_id;
        $this->element = Element::findOrFail($this->element_id);
        if ($this->element->is_active) {
            $this->mode = "edit";
            $this->collection = Block::where("element_id", $element_id)->first();
        } else {
            $this->mode = "create";
            $this->collection = Block::init($element_id);
        }
    }

    public function changeStyle($style)
    {
        $fn = 'sample' . $style;
        foreach (config('translatable.locales') as $locale) {
            $content[$locale] = Block::$fn();
        }
        $this->collection["content"] = $content;
        $this->dispatchBrowserEvent("tinymce:render");
    }

    public function save($content, $style)
    {
        if ($this->mode == "create") {
            $this->store($content, $style);
        } else {
            $this->update($content, $style);
        }
    }

    public function store($content, $style)
    {
        $collection = new Block();
        $collection->element_id = $this->element_id;
        $collection->content = $content;
        $collection->style = $style;
        $collection->save();

        $this->element->is_active = 1;
        $this->element->save();

        Alert::success("Add New Content Element Success");
        return redirect()->route("admin.element.index");
    }

    public function update($content, $style)
    {

        $collection = Block::where("element_id", $this->element_id)->first();
        $collection->content = $content;
        $collection->style = $style;
        $collection->save();

        Alert::success("Edit Content Element Success");
        return redirect()->route("admin.element.index");
    }

    public function render()
    {
        return view('LaravelLivewire2Content::livewire.backend');
    }
}

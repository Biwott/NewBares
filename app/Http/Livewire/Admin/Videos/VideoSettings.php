<?php

namespace App\Http\Livewire\Admin\Videos;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class VideoSettings extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Available Videos.';
    public $page_title = "List of All Videos";


    public $video_id = '';
    public $slug = '';
    public $title = '';
    public $description = '';
    public $date_active = '';
    public $reward = '';


    public function edit(Video $video)
    {
        $this->video_id = $video->id;
        $this->slug = $video->slug;
        $this->title = $video->title;
        $this->description = $video->description;
        $this->date_active = $video->date_active;
        $this->reward = $video->reward;
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->video_id = '';
        $this->slug = '';
        $this->title = '';
        $this->description = '';
        $this->date_active = '';
        $this->reward = '';
    }
    public function store()
    {
        $validated = $this->validate([
            'slug' => 'required',
            'title' => 'required',
            'description' => 'required',
            'date_active' => 'required',
            'reward' => 'required',
        ]);
        Video::create($validated);
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => "Successfuly Created Video!"]
        );
        $this->resetInputFields();
        $this->emit('videoStore');
    }


    public function update()
    {
        $this->validate([
            'slug' => 'required',
            'title' => 'required',
            'description' => 'required',
            'date_active' => 'required',
            'reward' => 'required',
        ]);
        if ($this->video_id) {
            $video = Video::find($this->video_id);
            $video->update([
                'slug' => $this->slug,
                'title' => $this->title,
                'description' => $this->description,
                'date_active' => $this->date_active,
                'reward' => $this->reward
            ]);
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => "Successfuly Updated Video!"]
            );
            $this->resetInputFields();
        }
    }
    public function render()
    {
        return view('livewire.admin.videos.settings', [
            'videos' => Video::latest()->paginate(10),
        ])->layout('layouts.admin');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\Video as ModelsVideo;
use App\Models\VideoTimeline;
use Auth;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
class Video extends Component
{

    use WithFileUploads;
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';
    public $video, $img_video, $img_url, $edit=false, $image;
    public $title, $description, $view=0, $like=0, $user_id, $category_id, $img_preview, $url_video;
    public $historicos=[];

    public function updatedImage()
    {
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3024', //1MB
        ]);

        $this->image_url = $this->image->store('videos-preview', 'public');
        $this->img_video  = '/storage/' . $this->image_url;
        $this->emit('refreshComponent');
    }

    public function mount(Request $request)
    {
        $this->img_video = url('no-profile.png');
        $this->video  = new ModelsVideo;

        if ($request->id) {
            $this->video = ModelsVideo::find($request->id);
            $this->showVideo($this->video);
            $this->edit=true;
            $this->historicos=VideoTimeline::whereVideoId($this->video->id)->get();
            $this->img_video =  ($this->video->img_preview === null ? url('no-profile.png') : url($this->video->img_preview));

        }
    }
    public function showVideo(ModelsVideo $video){
        $this->title       = $this->video->title;
        $this->description = $this->video->description;
        $this->view        = $this->video->view;
        $this->like        = $this->video->like;
        $this->category_id = $this->video->category_id;
        $this->img_video   = $this->video->img_preview;
        $this->url_video   = $this->video->url_video;
    }

    public function saveContact(){
        $this->validate([
            'title'       => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'url_video'   => 'required',
        ]);

        $this->video->title       = $this->title;
        $this->video->description = $this->description;
        $this->video->view        = $this->view;
        $this->video->like        = $this->like;
        $this->video->category_id = $this->category_id;
        $this->video->img_preview = $this->img_video;
        $this->video->url_video   = $this->url_video;
        $this->video->save();
        if($this->edit){
            $timeline = new VideoTimeline();
            $timeline->status = 'Editado';
            $timeline->video_id = $this->video->id;
            $timeline->save();
        }else{
            $timeline = new VideoTimeline();
            $timeline->video_id = $this->video->id;
            $timeline->save();
        }

        $this->dispatchBrowserEvent('save', ['name' => $this->video->title, 'title' => 'Se creo el video con exito']);
        return redirect()->to('videos/create?id='.$this->video->id);
    }

    public function render()
    {
        return view('livewire.admin.video')->layout('layouts.app');
    }
}

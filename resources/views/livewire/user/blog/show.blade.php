<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if($post['post']['featured_image'])
                <img src="{{ url($post['post']['featured_image']) }}"
                    alt="{{ $post['post']['featured_image_caption'] }}" />
                @endif
                <h2>{{ $post['post']['title'] }}</h2>
                {!! $post['post']['body'] !!}
            </div>
        </div>
    </div>
</div>
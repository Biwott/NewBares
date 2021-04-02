<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <ul>
                    @foreach($posts as $post)
                    <li>
                        <h2><a href="{{url($post['slug'])}}">{{ $post['title'] }}</a></h2>
                        <p>{!! $post['body'] !!}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
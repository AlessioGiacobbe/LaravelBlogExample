@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <h5>Nuovo post</h5>
            <form method="post" action="/home/insert">
                @csrf

                <input type="text" id="text" placeholder="testo" name="text"><br>
                <input type="submit" ><br>
            </form>
        </div>
        <div class="col-md-6">
            @isset($posts)
                @forelse($posts  as $post)
                    <a href="/home/{{$post->id}}">
                        <div class="card">
                            <div class="card-header">{{ $post->text }}</div>
                        </div>
                    </a>
                @empty
                    <p>bruh</p>
                @endforelse
            @endisset



            </div>
        </div>




    </div>
</div>
@endsection

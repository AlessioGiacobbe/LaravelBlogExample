@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @can('edit_forum')
                <div class="col-md-2">
                    <h5>Modifica Autore</h5>
                    <form method="post" action="/home/{{$post->id}}/update">
                        @csrf

                        <select name="user_id" id="user_id">

                            @foreach($utenti as $utente)
                                <option value="{{$utente->id}}">{{$utente->name}}</option>
                            @endforeach

                        </select>

                        <input type="submit" ><br>
                    </form>
                </div>
            @endcan

            <div class="col-md-6">

                @isset($post)
                    <div class="card">

                        <div class="card-header"><h1>{{$post->text}}</h1></div>
                        <div class="card-body">creato da : {{$post->User->name}}</div>
                    </div>

                    <h3>commenti</h3>

                    <!-- foreach -->

                    @foreach($commenti as $commento)
                        <div class="card">
                            <div class="card-header"><h1>{{$commento->text}}</h1></div>
                            <div class="card-body">creato da : {{$commento->User->name}} alle {{$commento->created_at}}
                            @can('delete', $commento)
                                <a href="/comment/{{$commento->id}}/delete">Elimina</a>
                                @endcan
                            </div>

                        </div>
                    @endforeach

                    <form method="post" action="/comment/{{$post->id}}">
                        @csrf
                        <input type="text" id="text" name="text" placeholder="commento epico">
                        <input type="submit" ><br>
                    </form>
                @endisset



            </div>
        </div>
    </div>
    </div>
@endsection

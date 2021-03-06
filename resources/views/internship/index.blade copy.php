@extends('layouts/app')

@section('title')
    Stages
@endsection

@section('content')

   

    <h1>Stages</h1>

    <form method="POST" action="{{URL::to('/search')}}" role="search" class="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" id="search_field" name="searchDescription" placeholder="Zoek stages">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-search">Stages zoeken</button>
            </span>
        </div>
    </form>

    @if( $flash = session('message') )
        <div class="alert alert-success">{{ $flash }}</div>
    @endif


    
        <div class="container internships">
            <div class="filter">
                <p>Filter by sector:</p>
                @foreach ($sectors as $s)

                    <a href="/stages/filter/{{$s->sector}}">{{$s->sector}} | </a>
                @endforeach
                <a href="/stages/">Reset</a>
            </div>
            <div class="intern_grid">
                <!-- lussen over $internships in de DB waar $i 1 internship is -->
                @foreach ($internships as $i)
                <a href="/stages/{{$i->id}}" class="internship">
                        <!-- elk item van 1 internship in een html tag steken -->
                        <h4 id="titleTeaser">{{$i->title}}</h4>
                        <h4 id="companyTeaser">{{$i->companyName}}</h4>
                        <i class="arrow right"></i>
                        <p id="descriptionTeaser">{{$i->description}}</p>
                </a>
                @endforeach
            </div>
        </div>
   

@endsection
@extends('parts.footer')
@section('content')

<nav aria-label="breadcrumb" class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="home">Inici</a>
        </li>
        <li class="breadcrumb-item">
            Coneix-nos<i class="icon-angle-right gray"></i>
        </li>
        <li class="breadcrumb-item" aria-current="page">
            Equip
        </li>
    </ol>
</nav>

<section id="team" class="team">
    <div class="container">
        <div class="content">
            <h3>
                Equip
            </h3>
            
        </div>

        <div class="team-grid">
        @foreach($teams as $team)
            <div class="">
                <div class="member">
                    <img src="{{$team->get_photo_url()}}" alt="" />
                    <h4>{{$team->first_name}} {{$team->last_name}}</h4>
                    <span>{{$team->position}}</span>
                </div>
            </div>
        @endforeach
        </div>
        
    </div>
</section> 
@endsection

@extends('layouts.app')
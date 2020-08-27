@extends('parts.footer')
<!-- ======= Team Section ======= -->
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
        <br>
        @foreach($teams as $team)
            @can('view-any', $team)
        <div class="flex-container">
            <div class="member">
                <img src="{{$team->get_photo_url()}}" width="150" height="150">
                <h4>{{$team->first_name}} {{$team->last_name}}</h4>
                <span>{{$team->position}}</span>
            </div>
        </div>
            @endcan
        @endforeach
    </div>
</section>
<!-- End Team Section -->
@extends('layouts.app')

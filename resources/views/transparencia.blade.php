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
            Transparència
        </li>
    </ol>
</nav>

<section id="transparency" class="transparency">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-4 pt-lg-0 content right">
                <h3>
                    Transparència
                </h3>
                <p>
                    Trace és una entitat sense ànim de lucre. El finançament,
                    prové un % dels serveis que oferim % de les quotes de socis
                    i un % de les subvencions que ens atorga l’Administració.
                    Els membres de la Junta escollits democràticament, no reben
                    cap remuneració pel seu càrrec.
                </p>
                <div class="box-cta">
                    <a href="/files/codi_etic_TRACE.pdf" class="cta-line" target="_blank">
                        <i class="icofont-download"></i>Codi étic
                    </a>
                </div>
            </div>
            <div class="col-lg-6 content">
                <h4>Informació econòmica i d’activitats</h4>
                @foreach($transparencies as $transparency)
                <div class="pt-1">
                    <p>{{$transparency->date_name}}:</p>
                    <div class="box-cta">
                        <a href="{{$transparency->get_economic_url()}}" target=“_blank”>
                            <i class="icofont-download"></i>
                            {{$transparency->get_saved_name_economic_document()}}
                        </a>
                    </div>
                    <div class="box-cta">
                        <a href="{{$transparency->get_entity_url()}}" target=“_blank”>
                            <i class="icofont-download"></i>
                            {{$transparency->get_saved_name_entity_document()}}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
@extends('layouts.app')

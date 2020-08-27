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
            </div>
            <div class="col-lg-6 content">
                <h4>Informació económica i d’activitats</h4>
                <div>
                    <p>Exercici 2019:</p>
                    <div class="box-cta">
                        <a href=""><i class="icofont-download"></i>Memòria Económica 2019</a><br>
                        <a href=""><i class="icofont-download"></i>Memòria d’activitats de l’Entitat 2019</a>
                    </div>
                </div>
                <br>
                <div>
                    <p>Exercici 2018:</p>
                    <div class="box-cta">
                        <a href=""><i class="icofont-download"></i>Memòria Económica 2018</a><br>
                        <a href=""><i class="icofont-download"></i>Memòria d’activitats de l’Entitat 2018</a>
                    </div>
                </div>
                <br>
                <div>
                    <p>Exercici 2017:</p>
                    <div class="box-cta">
                        <a href=""><i class="icofont-download"></i>Memòria Económica 2017</a><br>
                        <a href=""><i class="icofont-download"></i>Memòria d’activitats de l’Entitat 2017</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@extends('layouts.app')

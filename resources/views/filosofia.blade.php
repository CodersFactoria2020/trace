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
            Filosofia
        </li>
    </ol>
</nav>
<section id="philosophy" class="philosophy">
    <div class="container">
        <div class="row content d-flex">
            <div class="col-lg-6 pt-4 pt-lg-0 content right">
                <h3>
                    Filosofia
                </h3>
                <p>
                    Estar correctament informats, acompanyats emocionalment des
                    del primer moment, conèixer els recursos, respectar i
                    entendre l’opinió de la persona amb dany cerebral i la de la
                    familia, són els principis bàsics de la nostra Entitat.
                </p>
            </div>
            <br />
            <div class="col-lg-6 pt-4">
                <div class="box-cta">
                    <p class="quote">
                        “La vida és com una bicicleta, per a mantenir
                        l'equilibri has que seguir endavant”
                    </p>
                    <p class="quote-author">
                        Albert Einstein
                    </p>
                </div>
            </div>
        </div>
        <div class="row content d-flex pt-5">
            <div class="col-lg-6 pt-lg-0 pb-5 content right">
                <p class="quote">
                    “La vida és el 10% el que passa i el 90% com reaccionem al
                    que passa”
                </p>
                <p class="quote-author">
                    Charles R. Swindoll
                </p>
            </div>
            <div class="col-lg-6">
                <div class="box-cta">
                    <p><b>Estratègia</b></p>
                    <p>
                        Apostem per les teràpies adaptades a l’entorn, per la
                        seva utilitat, creiem en la importància d’equilibrar les
                        rehabilitacions individuals amb les activitats socials
                        grupals.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@extends('layouts.app')

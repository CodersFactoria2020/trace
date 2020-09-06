@extends('layouts.app-dashboard')

@section('scripts')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
  <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>

@endsection

@section('content')

<div class="col">
    <div class="dashboard-right-side">
        <div class="col">
            <div class="mt-3">
                <div class="float-left">
                    <h2>Hola {{Auth::User()->first_name}}</h2>
                    <h5>Benvingut/da a la teva àrea privada</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-right-side">
        <table class="table table-striped table-borderless">
            <thead class="thead text-uppercase">
                <tr>
                    <td><small><b>Títol</b></small></td>
                    <td><small><b>Horari</b></small></td>
                    <td colspan="2"><small><b>Professional</b></small></td>
                </tr>
            </thead>
            @if (count($monday_activities) !== 0)
                <tr>
                <td colspan="4"><b>DILLUNS</b></td>
                </tr>
                @foreach($monday_activities as $activity)
                    <tr>
                        <td class="icon-text">
                            <div class="primary-green">
                                @isset ($activity->category_id)
                                    <i class="fa fa-circle" style="font-size:20px;color:{{$activity->getCategoryColor()}}"></i>
                                @endisset
                                {{$activity->title}}
                            </div>
                        </td>
                        <td style="font-weight: bold;"> {{substr($activity->showStart, 10)}} - {{substr($activity->showEnd, 10)}} </td>

                        <td class="icon-text">
                            <div class="primary-green">
                            @foreach ($activity->users as $user)
                                @if ($user->role_id !== 'Soci')
                                    <a href="mailto:{{$user->email}}?subject=Assumpte...&body=Hola, {{$user->first_name}}!" target="_blank" class="primary-green">
                                    <i class="icofont-send-mail" style="font-size:24px"></i>
                                    {{$user->first_name}} {{$user->last_name}}
                                    </a>
                                @endif
                            @endforeach
                            </div>
                        </td>

                        <td>
                            <a href="" data-toggle="modal" data-target="#show-activity{{$activity->id}}" class="cta" activity="button">Veure més</a>
                            @include('activity.show')
                        </td>
                    </tr>
                @endforeach
            @endif
            @if (count($tuesday_activities) !== 0)
                <tr>
                <td colspan="4"><b>DIMARTS</b></td>
                </tr>
                @foreach($tuesday_activities as $activity)
                    <tr>
                        <td class="icon-text">
                            <div class="primary-green">
                                @isset ($activity->category_id)
                                    <i class="fa fa-circle" style="font-size:20px;color:{{$activity->getCategoryColor()}}"></i>
                                @endisset
                                {{$activity->title}}
                            </div>
                        </td>
                        <td style="font-weight: bold;"> {{substr($activity->showStart, 10)}} - {{substr($activity->showEnd, 10)}} </td>

                        <td class="icon-text">
                            <div class="primary-green">
                            @foreach ($activity->users as $user)
                                @if ($user->role_id !== 'Soci')
                                    <a href="mailto:{{$user->email}}?subject=Assumpte...&body=Hola, {{$user->first_name}}!" target="_blank" class="primary-green">
                                    <i class="icofont-send-mail" style="font-size:24px"></i>
                                    {{$user->first_name}} {{$user->last_name}}
                                    </a>
                                @endif
                            @endforeach
                            </div>
                        </td>

                        <td>
                            <a href="" data-toggle="modal" data-target="#show-activity{{$activity->id}}" class="cta" activity="button">Veure més</a>
                            @include('activity.show')
                        </td>
                    </tr>
                @endforeach
            @endif
            @if (count($wednesday_activities) !== 0)
                <tr>
                <td colspan="4"><b>DIMECRES</b></td>
                </tr>
                @foreach($wednesday_activities as $activity)
                    <tr>
                        <td class="icon-text">
                            <div class="primary-green">
                                @isset ($activity->category_id)
                                    <i class="fa fa-circle" style="font-size:20px;color:{{$activity->getCategoryColor()}}"></i>
                                @endisset
                                {{$activity->title}}
                            </div>
                        </td>
                        <td style="font-weight: bold;"> {{substr($activity->showStart, 10)}} - {{substr($activity->showEnd, 10)}} </td>

                        <td class="icon-text">
                            <div class="primary-green">
                                @foreach ($activity->users as $user)
                                    @if ($user->role_id !== 'Soci')
                                        <a href="mailto:{{$user->email}}?subject=Assumpte...&body=Hola, {{$user->first_name}}!" target="_blank" class="primary-green">
                                        <i class="icofont-send-mail" style="font-size:24px"></i>
                                        {{$user->first_name}} {{$user->last_name}}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </td>

                        <td>
                            <a href="" data-toggle="modal" data-target="#show-activity{{$activity->id}}" class="cta" activity="button">Veure més</a>
                            @include('activity.show')
                        </td>
                    </tr>
                @endforeach
            @endif
            @if (count($thursday_activities) !== 0)
                <tr>
                <td colspan="4"><b>DIJOUS</b></td>
                </tr>
                @foreach($thursday_activities as $activity)
                    <tr>
                        <td class="icon-text">
                            <div class="primary-green">
                                @isset ($activity->category_id)
                                    <i class="fa fa-circle" style="font-size:20px;color:{{$activity->getCategoryColor()}}"></i>
                                @endisset
                                {{$activity->title}}
                            </div>
                        </td>
                        <td style="font-weight: bold;"> {{substr($activity->showStart, 10)}} - {{substr($activity->showEnd, 10)}} </td>

                        <td class="icon-text">
                            <div class="primary-green">
                            @foreach ($activity->users as $user)
                                @if ($user->role_id !== 'Soci')
                                    <a href="mailto:{{$user->email}}?subject=Assumpte...&body=Hola, {{$user->first_name}}!" target="_blank" class="primary-green">
                                    <i class="icofont-send-mail" style="font-size:24px"></i>
                                    {{$user->first_name}} {{$user->last_name}}
                                    </a>
                                @endif
                            @endforeach
                            </div>
                        </td>

                        <td>
                            <a href="" data-toggle="modal" data-target="#show-activity{{$activity->id}}" class="cta" activity="button">Veure més</a>
                            @include('activity.show')
                        </td>
                    </tr>
                @endforeach
            @endif
            @if (count($friday_activities) !== 0)
                <tr>
                <td colspan="4"><b>DIVENDRES</b></td>
                </tr>
                @foreach($friday_activities as $activity)
                    <tr>
                        <td class="icon-text">
                            <div class="primary-green">
                                @isset ($activity->category_id)
                                    <i class="fa fa-circle" style="font-size:20px;color:{{$activity->getCategoryColor()}}"></i>
                                @endisset
                                {{$activity->title}}
                            </div>
                        </td>
                        <td style="font-weight: bold;"> {{substr($activity->showStart, 10)}} - {{substr($activity->showEnd, 10)}} </td>

                        <td class="icon-text">
                            <div class="primary-green">
                            @foreach ($activity->users as $user)
                                @if ($user->role_id !== 'Soci')
                                    <a href="mailto:{{$user->email}}?subject=Assumpte...&body=Hola, {{$user->first_name}}!" target="_blank" class="primary-green">
                                    <i class="icofont-send-mail" style="font-size:24px"></i>
                                    {{$user->first_name}} {{$user->last_name}}
                                    </a>
                                @endif
                            @endforeach
                            </div>
                        </td>

                        <td>
                            <a href="" data-toggle="modal" data-target="#show-activity{{$activity->id}}" class="cta" activity="button">Veure més</a>
                            @include('activity.show')
                        </td>
                    </tr>
                @endforeach
            @endif
            @if (count($saturday_activities) !== 0)
                <tr>
                <td colspan="4"><b>DISSABTE</b></td>
                </tr>
                @foreach($saturday_activities as $activity)
                    <tr>
                        <td class="icon-text">
                            <div class="primary-green">
                                @isset ($activity->category_id)
                                    <i class="fa fa-circle" style="font-size:20px;color:{{$activity->getCategoryColor()}}"></i>
                                @endisset
                                {{$activity->title}}
                            </div>
                        </td>
                        <td style="font-weight: bold;"> {{substr($activity->showStart, 10)}} - {{substr($activity->showEnd, 10)}} </td>

                        <td class="icon-text">
                            <div class="primary-green">
                                @foreach ($activity->users as $user)
                                    @if ($user->role_id !== 'Soci')
                                        <a href="mailto:{{$user->email}}?subject=Assumpte...&body=Hola, {{$user->first_name}}!" target="_blank" class="primary-green">
                                        <i class="icofont-send-mail" style="font-size:24px"></i>
                                        {{$user->first_name}} {{$user->last_name}}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </td>

                        <td>
                            <a href="" data-toggle="modal" data-target="#show-activity{{$activity->id}}" class="cta" activity="button">Veure més</a>
                            @include('activity.show')
                        </td>
                    </tr>
                @endforeach
            @endif
            @if (count($sunday_activities) !== 0)
                <tr>
                <td colspan="4"><b>DIUMENGE</b></td>
                </tr>
                @foreach($sunday_activities as $activity)
                    <tr>
                        <td class="icon-text">
                            <div class="primary-green">
                                @isset ($activity->category_id)
                                    <i class="fa fa-circle" style="font-size:20px;color:{{$activity->getCategoryColor()}}"></i>
                                @endisset
                                {{$activity->title}}
                            </div>
                        </td>
                        <td style="font-weight: bold;"> {{substr($activity->showStart, 10)}} - {{substr($activity->showEnd, 10)}} </td>

                        <td class="icon-text">
                            <div class="primary-green">
                            @foreach ($activity->users as $user)
                                @if ($user->role_id !== 'Soci')
                                    <a href="mailto:{{$user->email}}?subject=Assumpte...&body=Hola, {{$user->first_name}}!" target="_blank" class="primary-green">
                                    <i class="icofont-send-mail" style="font-size:24px"></i>
                                    {{$user->first_name}} {{$user->last_name}}
                                    </a>
                                @endif
                            @endforeach
                            </div>
                        </td>

                        <td>
                            <a href="" data-toggle="modal" data-target="#show-activity{{$activity->id}}" class="cta" activity="button">Veure més</a>
                            @include('activity.show')
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
</div>

@endsection

<!-- Vendor JS Files -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="vendor/php-email-form/validate.js"></script>
<script src="vendor/jquery-sticky/jquery.sticky.js"></script>
<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="vendor/counterup/counterup.min.js"></script>
<script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="vendor/venobox/venobox.min.js"></script>

<!-- Template Main JS File -->
<script src="js/main.js"></script>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</html>

@extends('parts.footer')
    @section('content')
        <section id="contact" class="contact">
            <div class="container y-6">
                <div class="row content d-flex pt-5">
                    <div class="col-lg-6 pt-4 pt-lg-0 content right">
                        <h3>
                            Contacte
                        </h3>
                        <p>
                            Tens molts dubtes i necessites assessorament? Truca'ns
                        </p>
                        <ul class="list-group">
                            <a href="tel:+34933250363">
                                <i class="icofont-phone"></i>933 250 363</a
                            >
                            <a href="mailto:info@tracecatalunya.org"
                                ><i class="icofont-envelope"></i>info@tracecatalunya.org
                            </a>

                            <a
                                href="https://goo.gl/maps/B7NKYv2Wz9AQDspU7"
                                starget="_blank"
                            >
                                <i class="icofont-location-pin"></i>
                                Carrer de Llançà, 42, 08015, Barcelona
                            </a>
                        </ul>
                        <div class="map-responsive">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993.756243285726!2d2.1443872154255437!3d41.37938037926494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a27fbb4cacad%3A0xe217355ea7a6cd15!2sCarrer%20de%20Llan%C3%A7a%2C%2042%2C%2008015%20Barcelona!5e0!3m2!1sen!2ses!4v1596821127763!5m2!1sen!2ses"
                                width="550"
                                height="400"
                                frameborder="0"
                                style="border:0;"
                                allowfullscreen=""
                                aria-hidden="false"
                                tabindex="0"
                            ></iframe>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <form
                            action="forms/contact.php"
                            method="post"
                            role="form"
                            class="php-email-form"
                        >
                            <div class="form-group mt-2">
                                <p>El teu nom (obligatori)</p>
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    id="name"
                                    data-rule="minlen:2"
                                    data-msg="Té que ser de al menys 2 lletres"
                                />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <p>El teu correu electrònic (obligatori)</p>
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    id="email"
                                    data-rule="email"
                                    data-msg="Ingressa un correu vàlid"
                                />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <p>Assumpte</p>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="subject"
                                    id="subject"
                                    data-rule="minlen:2"
                                    data-msg="Introduïu almenys 2 caràcters del tema"
                                />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <p>Missatge</p>
                                <textarea
                                    class="form-control"
                                    name="message"
                                    rows="5"
                                    data-rule="minlen:10"
                                    data-msg="Introduïu almenys 10 caràcters"
                                ></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Carregant</div>
                                <div class="error-message"></div>
                                <div class="sent-message">
                                    S'ha enviat el teu missatge, moltes gràcies!
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script src="assets/vendor/jquery/jquery.min.js"></script>
            <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
            <script src="assets/vendor/php-email-form/validate.js"></script>
        </section>
    @endsection
 @extends('layouts.app')

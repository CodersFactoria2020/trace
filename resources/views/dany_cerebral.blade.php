@extends('parts.footer')
    @section('content')
        <section id="about" class="counts about">
            
            <div class="container">
                <div class="d-flex justify-content-between flex-wrap pt-5">
                    <div class="content col-6">
                        <h3>
                            Dany Cerebral Sobrevingut
                        </h3>
                        <p>
                            El dany cerebral sobrevingut és una lesió que afecta al cervell
                            de manera sobrevinguda. El seu orígen no és congènit ni
                            hereditari, ni degeneratiu.Les principals causes que el poden
                            provocar són: els Traumatismes Cranioencefàlics (TCE), els
                            accidents cerebro vasculars (AVC) o ictus, tumors cerebrals o
                            malalties estranyes o de baixa prevalença amb seqüeles
                            neurològiques.En quant a xifres a l’Estat Espanyol hi ha
                            aproximadament 420.064 casos, dels quals el 78% tenen com orígen
                            l’ictus i el 22% restant són Traumatisme Cranioencefàlics i
                            altres causes.Malauradament, cada any hi ha 104.071 nous casos
                            de dany cerebral.
                        </p>
                        <p class="font-italic">
                            Font: Informe Las personas con Daño Cerebral Adquirido en
                            España, realitzat per FEDACE amb la col.laboració del Real
                            Patronato sobre Discapacidad
                        </p>
                    </div>
                    <div class="content col-6">
                        <div class="d-flex">
                            <div class="count-box">
                                <span data-toggle="counter-up">420.064</span>
                                <p>
                                    Casos de dany cerebral a l'Estat Espanyol
                                </p>
                            </div>
                            <div>
                                <div class="count-box">
                                    <div class="d-flex">
                                        <span data-toggle="counter-up">78</span><span>%</span>
                                    </div>
                                    <p>
                                        Origen de l’ictus
                                    </p>
                                </div>
            
                                <div class="count-box">
                                    <div class="d-flex">
                                        <span data-toggle="counter-up">22</span><span>%</span>
                                    </div>
                                    <p>
                                        Per Traumatisme Cranioencefàlics i altres causes
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr></hr>
                        <div class="count-box">
                            <span data-toggle="counter-up">104.071</span>
                            <p>
                                Nous casos de dany cerebral cada any
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-2 pb-6">
                <div id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Estat de coma
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                Entre un 30 i 40% de les persones amb dany cerebral han passat per una pèrdua de
                                consciència o coma. El coma és un estat temporal en què el pacient roman amb els ulls tancats
                                sense respondre a l&#39;entorn. Quan l’Estat de Coma, s’allarga en el temps es considera que el
                                pacient ha passat a estar a Síndrome de Vigília sense resposta, conegut com a Estat Vegetatiu.
                                Quan la persona es troba en aquest estat, Síndrome de Vigília sense resposta, s&#39;observen
                                respostes motores reflexes sense interacció voluntària amb l&#39;entorn. Si aquest estat dura més
                                d&#39;un any després d&#39;un TCE, o més de tres mesos després de lesions no traumàtiques, les
                                oportunitats de recuperació es redueixen i es considera que la Síndrome de Vigília sense
                                resposta és permanent.<br><br>
                                Entre els casos de pèrdua de consciència també s&#39;inclouen els estats de mínima consciència.
                                Difereixen de la Síndrome de Vigília sense resposta en què el pacient té consciència d&#39;un
                                mateix o de l&#39;entorn i es poden observar respostes gestuals, verbals, realització d&#39;ordres
                                simples, respostes motores o emocionals ... entre altres possibilitats d&#39;interacció.<br><br>
                                Les persones que es mantenen en situació de Síndrome de Vigília sense resposta de forma
                                permanent representen, aproximadament, el 5% del col·lectiu del dany cerebral. Aquestes
                                persones estan en situació d&#39;especial debilitat ja que requereixen una atenció especialitzada
                                constant.<br><br>
                                <u>Font:</u> <i>Federació Espanyola de Dany Cerebral (FEDACE)</i>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Seqüeles físiques
                            </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                Els problemes físics són molt habituals en una persona que pateix un Dany Cerebral Adquirit i
                                es poden manifestar de diferents formes. Les hemiplegies i les hemiparèsies apareixen al
                                costat contrari a l&#39;hemisferi on s&#39;ha produït la lesió cerebral. Una hemiplegia és la paràlisi de la
                                meitat de el cos, mentre que la hemiparèsia suposa la pèrdua de força en una meitat de el cos.
                                D&#39;altra banda, quan es dóna un cas d&#39;espasticitat dels músculs es mantenen permanentment
                                contrets, el que els manté en postures anòmales que, a la llarga, provoquen dolor.<br><br>
                                Els problemes físics no afecten només a la mobilitat, també provoquen complicacions en
                                l&#39;alimentació. La disfàgia dificulta el empassar aliments, ja siguin líquids o sòlids. Una disfàgia
                                podria impedir la nutrició adequada de la persona amb dany cerebral per les molèsties que
                                causa l&#39;acció d&#39;empassar i per l&#39;augment de el risc d&#39;ennuegament. En els casos més greus s&#39;ha
                                de recórrer a vies alternatives d&#39;alimentació, com sondes nasogàstriques i gastrostomies.<br><br>
                                Finalment, el cansament és una manifestació física d&#39;un problema cognitiu, com la dificultat de
                                concentració. Després d&#39;un dany cerebral completar les tasques més senzilles requerirà d&#39;un
                                gran esforç, de manera que haurem de planificar tasques i anar ajustant amb paciència a
                                mesura que la resistència de la persona amb DCA millora.<br><br>
                                <u>Font:</u> <i>Federació Espanyola de Dany Cerebral (FEDACE)</i>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Alteracions sensitives i sensorials
                            </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                En aquesta àrea ens referim a com rebem la informació del nostre entorn, a través dels sentits
                                (vista, oïda, olfacte, gust i tacte) i incloent l&#39;equilibri i la percepció que té un mateix. Així, dins
                                el dany cerebral es donen casos de pèrdua de visió o visió doble, pèrdua de gust i olfacte, que
                                poden estar associades; pèrdua d&#39;audició i incapacitat d&#39;identificar dolor o canvis de
                                temperatura en la nostra pell. Les mateixes lesions que causen problemes d&#39;audició poden
                                resultar en dificultats per mantenir l&#39;equilibri, ja que és una habilitat que depèn de l&#39;oïda
                                interna.<br><br>
                                Els problemes en la percepció del propi cos es tradueixen en dificultats per desplaçar-se sense
                                veure com estem movent el nostre cos. Totes aquestes desconnexions amb el cos redueixen
                                de manera considerable l’autonomia de qualsevol persona i fan que desplaçar-se o interactuar
                                amb l&#39;entorn puguin ser tasques perilloses.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Seqüeles en la comunicació
                            </button>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body">
                                Quan una persona pateix un Dany Cerebral, la comunicació de la persona i la seva capacitat d&#39;entendre i
                                expressar-se a través del llenguatge es poden veure alterades. Hi ha diversos trastorns del llenguatge,
                                tot i que el més conegut és l&#39;afàsia. L&#39;afàsia afecta la producció de llenguatge parlat, a la seva
                                comprensió i l&#39;habilitat de llegir i escriure.<br><br>
                                A l&#39;afectar diferents components del llenguatge, es donen diferents tipus d&#39;afàsia:
                                <br><br>
                                <ul>
                                    <li>L'afàsia global és la més severa. A causa d'ella les persones amb dany cerebral poden produir
                                        poques paraules i no comprenen el que escolten, arribant a no tenir capacitat ni de llegir ni
                                        d'escriure.
                                    </li>
                                    <li> Quan algú té habilitat per llegir i per comprendre el que se li diu, però no pot produir paraules,
                                        estem davant d'una afàsia de broca. En aquest cas les persones amb DCA diuen frases molt curtes de
                                        3 ó 4 paraules, havent de esforçar-se molt per poder dir-les de manera entretallada.
                                    </li>
                                    <li>Els casos d'afàsia mixta tenen una parla entretallada i costosa com l’afàsia de broca, però a més
                                        tenen dificultats per entendre el que llegeixen o el que altres els diuen.
                                    </li>
                                </ul>
                                Hi ha altres tipus d'afàsia que afecten a àrees més petites del cervell i centren les dificultats
                                en un aspecte molt concret del llenguatge. Així, per exemple, l'afàsia anòmica provoca que no
                                puguem trobar el nom de persones o coses. L’alèxia provoca que no puguem llegir i l’agrafia causa
                                la pèrdua de la capacitat d'escriure.<br><br>
                                L'origen de les dificultats a l’àrea de comunicació pot ser una alteració física, com passa en el
                                cas de la disàrtria, una paràlisi o lentitud de moviments dels músculs que intervenen en la parla.
                                També d'origen físic són les disfonies, que generen problemes per a l'emissió de veu fent que la
                                persona només aconsegueixi produir un petit murmuri per comunicar-se.<br><br>
                                Pel que fa al dèficit de comunicació cal recordar que quan es presenta no necessàriament implica
                                que la persona amb DCA tingui també un problema de capacitat cognitiva o velocitat de pensament.
                                De fet, pot ser, que no hi hagi aquests problemes i estiguem davant d'una persona totalment
                                preservada, però amb dificultats per expressar-se. És important no tractar a qui tingui
                                dificultats de comunicació amb condescendència, com si fos un nen/a petit/a o com si no ens
                                pogués sentir. Hem de tractar-los amb normalitat, però donant-los temps per expressar-se amb
                                calma.<br><br>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Seqüeles cognitives
                            </button>
                            </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                            <div class="card-body">
                                Quan parlem de l’àreacognitiva,  ens referim a les habilitats que ens permeten analitzar tot el que ens envolta.
                                La cognició ens permet aprendre, reflexionar i prendre decisions basades en un raonament. Els problemes cognitius
                                destaquen perquè no són tan evidents com la resta de seqüeles del dany cerebral (són seqüeles silencioses) i
                                podrien passar desapercebdes en situacions quotidianes, provocant que qui interactua amb una persona amb dany
                                cerebral sense conèixer les seves dificultats pugui endur-se una impressió negativa de la mateixa per no comprendre
                                la seva forma d'actuar.
                                <br><br>
                                Entre els problemes cognitius destaquen, en primer lloc, els relacionats amb la memòria. És habitual que després
                                d'una lesió cerebral es doni un episodi d'amnèsia posttraumàtica. L'amnèsia pot ser lleu, d'una hora de durada;
                                moderada, de fins a un dia i severa, si sobrepassa el dia de durada. La memòria no sempre arriba a recuperar el
                                seu funcionament normal i moltes persones amb dany cerebral tenen dificultats de memòria al llarg de tota la seva
                                vida.
                                <br><br>
                                En relació amb la memòria també es donen situacions de desorientació i confusió per a la persona amb dany cerebral.
                                No obstant això, els trastorns de memòria no són l'única causa d'aquests problemes: l’alentiment, les
                                al·lucinacions i els canvis emocionals també provoquen que el nostre familiar estigui desorientat i confús.
                                <br><br>
                                Finalment, les accions que requereixen més esforç mental poden veure també afectades per una lesió cerebral:
                                aquelles que tenen a veure amb la nostra capacitat de planificar, establir estratègies o preveure les
                                conseqüències dels nostres actes; és a dir tot el que té a veure amb el pensament complex i amb la nostra
                                capacitat de mantenir l'atenció. Les seqüeles en el pla cognitiu poden arribar al punt en què la persona amb
                                dany cerebral no tingui consciència de les seves dificultats (anosognòsia), les seves limitacions i la seva
                                condició de persona amb DCA; posant-la en situació de risc quan tracti de realitzar accions per a les que
                                requereix algun tipus de suport.
                                <br><br>
                                Les alteracions de la conducta afecten una gran quantitat de persones amb Dany Cerebral Adquirit. Atesa
                                l'heterogeneïtat d'alteracions que poden patir i del grau de les mateixes, és complicat conèixer quines
                                són les més freqüents. Al cap i a la fi,  com en totes les seqüeles de  dany cerebral, l'aparició d'aquestes
                                alteracions depèn principalment de la zona del cervell lesionada i de la gravetat de la lesió, a part de
                                si prèviament ja existia alguna alteració de conducta.
                                <br><br>
                                No obstant això, un estudi (Nelly, Brown, Ficar i Kremer; 2008) va tractar de traçar un perfil d'alteracions
                                de conducta en persones amb DCA. A través de l'observació de 190 persones ja donades d'alta en els seus
                                centres de rehabilitació que, posteriorment, van acudir a un centre especialitzat en intervenció en trastorns
                                conductuals. Segons els resultats, el 86% de les persones presentaven problemes d'agressivitat verbal i
                                habilitats socials (el més habituals), un 60% problemes d'iniciativa i apatia; el 41% d'agressivitat cap a
                                persones, el 35% agressivitat cap a objectes i el 28% conductes sexuals inapropiades. Finalment, l'estudi
                                mostrava com un 60% dels participants presentaven 4 o més tipus d'alteracions, mentre que tan sols el 5%
                                tenia un únic problema conductual.
                                <br><br>
                                Aquestes dades evidencien tant la freqüència d'aquest tipus d'alteracions en el dany cerebral com la
                                complexitat i multidimensionalitat de les mateixes. No obstant això, és probable que presentar tantes
                                alteracions conductuals es degui al fet que la classificació és simptomàtica: que una persona mostri
                                agressivitat, irritabilitat, conductes sexuals inapropiades i labilitat emocional, més que indicar quatre
                                problemes diferents, segurament indica que la persona té dificultats en el control d'impulsos que es
                                manifesta en quatre aspectes diferents de la conducta.
                                <br><br>
                                Prenent com a referència les publicacions dels darrers anys sobre el tema, aquestes serien les alteracions
                                més freqüents, que es poden donar en diferents nivells de gravetat i combinades entre si:
                                <br><br>
                                <ol>
                                    <li>Agitació: És un augment significatiu de l'activitat motora costat de alteracions emocionals. Sol
                                        coincidir amb els primers moments després de lesió o el despertar del coma. La persona es mou amb
                                        brusquedat i pot intentar colpejar als seus cuidadors.
                                    </li>
                                    <li>Deambulació: Desorientada, la persona camina sense rumb fix. Aquesta conducta provoca que la
                                        persona abandoni, de manera no conscient, els límits marcats pels seus cuidadors per a la seva
                                        seguretat; suposant risc de pèrdua o fins i tot atropellament.
                                    </li>
                                    <li>Labilitat emocional: És la dificultat de regular emocions i d'expressar-les. Poden ser expressions
                                        emocionals inadequades en freqüència, intensitat i durada. També és freqüent que l'emoció no quadri
                                        amb el context en què es dóna o l'alternança entre emocions.
                                    </li>
                                    <li>Irritabilitat i agressivitat: L'agressivitat és un dels símptomes que més dificulta la integració
                                        social i laboral de les persones amb DCA. Les manifestacions de la irritabilitat poden ser verbals,
                                        físiques cap a objectes i físiques cap a persones. Les persones amb aquestes dificultats perden el
                                        control davant frustracions de la vida diària.
                                    </li>
                                    <li>Conducta sexual inadequada: Les manifestacions més comunes són les verbalitzacions inapropiades i
                                        els tocaments més o menys explícits. La desinhibició sexual es pot veure afavorida per la necessitat
                                        d'aconseguir afecte i la dificultat per aconseguir-ho.
                                    </li>
                                    <li>Desinhibició conductual: La labilitat emocional i la irritabilitat poden desembocar en accions que no
                                        són adequades d'acord amb les normes socials establertes per als diferents contextos socials. La
                                        persona no pot reprimir ni controlar els seus propis impulsos i actuen sense importar la conseqüència
                                        de les seves accions.
                                    </li>
                                    <li>Depressió i ansietat: La depressió és una entitat clínica complexa que provoca problemes emocionals,
                                        físics i cognitius. Les manifestacions de depressió depenen de cada persona, de manera que el seu
                                        diagnòstic i tractament és complex i ha de ser supervisat per professionals.
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingSix">
                            <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Viure amb Dany Cerebral
                            </button>
                            </h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                            <div class="card-body">
                                En el procés de rehabilitació d'una persona amb Dany Cerebral Adquirit, els primers 24 mesos són importants.
                                Serà el període en què es veuen de forma més ràpida els avenços en el procés d'autonomia del la persona amb DCA.
                                A la fi d'aquest període podrem definir amb més claredat les seqüeles definitives i la gravetat de les mateixes.
                                Tot i així reiterem, que es pot seguir avançant superat aquest llindar, el que passa és que potser els canvis no
                                són tan evidents.
                                <br><br>
                                Per tot això, serà fonamental que la persona amb Dany Cerebral Adquirit realitzi en aquest període tota la
                                rehabilitació possible.
                                <br><br>
                                Hem de prendre aquest període com una referència, encara que podrà variar en funció de diferents aspectes:
                                <br><br>
                                <ol>
                                    <li>De la persona que ha patit el Dany Cerebral Adquirit (edat, característiques físiques, ...).</li>
                                    <li>De la gravetat de la mateixa.</li>
                                    <li>De la rehabilitació rebuda des del primer moment.</li>
                                    <li>O d'altres aspectes com la xarxa de suports amb què compte.</li>
                                </ol>
                                De qualsevol manera, assolida aquesta fase d'estabilització i cronificació del Dany Cerebral Adquirit, hem de seguir
                                fent amb la persona un treball de rehabilitació, que a hores d'ara, estarà sobretot orientat a mantenir els
                                progressos assolits i no recular.
                                <br><br>
                                La persona amb Dany Cerebral Adquirit ha de continuar desenvolupant el seu projecte de vida, lògicament adaptat a la
                                seva nova realitat, a les seves capacitats i als seus interessos i motivacions. Per això, en aquesta etapa caldrà
                                seguir aprofundint en totes les activitats, accions, projectes que afavoreixin la vida social i comunitària, vetllant
                                per a assolir el major grau d'autonomia possible.
                                <br><br>
                                Cal seguir fer rehabilitació en aquells casos que sigui necessari i, treballar de forma grupal per assolir totes
                                les destreses socials que li assegurin un millor benestar personal.
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    @endsection
    
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

@extends('layouts.app')

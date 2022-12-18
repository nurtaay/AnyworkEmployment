@extends('layouts.app')
@section('title','index page')
@section('content')

    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h1>AnyWork Employment</h1>
                    <h2>{{__('messages.Жұмыс табу үшін ең қолайлы платформа!Тіркел де арманыңдағы жұмысысыңды жаса!')}}</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="#about" class="btn-get-started scrollto">{{__('messages.Бастау')}}</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img  src="{{asset('assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients section-bg">
            <div class="container">

                <div class="row" data-aos="zoom-in">

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('assets/img/clients/kaspi1.png')}}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('assets/img/clients/aviata1.png')}}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('assets/img/clients/chocolife.png')}}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('assets/img/clients/magnum.png')}}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('assets/img/clients/sberbank.png')}}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('assets/img/clients/freedom1.png')}}" class="img-fluid" alt="">
                    </div>

                </div>

            </div>
        </section><!-- End Cliens Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{__('messages.Ваканция!')}}</h2>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="row">
                            <br>
                            @foreach($posts as $post)
                                <div class="col-sm-4">
                                    <div class="card" >
                                        <div class="card-body">
                                            <img src="{{asset($post->image)}}" alt="" style="width: 50px; height: 50px">
                                            <div class="card-header" ><h5 class="card-title">{{$post->title}} </h5></div>
                                            <p class="card-text">{{$post->content}}</p>
                                            <a class="btn-outline-primary" href="{{route('posts.show',$post->id)}}">{{__('messages.Read_more')}}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End About Us Section -->

        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h1>Что должен знать студент</h1>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100"  style="margin-left:60px">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4><a href="">{{__('messages.Стажировка')}}</a></h4>
                            <p>Стажировка – это не только опыт работы, но и знакомство с новыми специалистами и умение налаживать с ними контакт. Общайтесь, обменивайтесь знаниями, задавайте вопросы профессионалам – все это вам пригодиться в будущей работе и повседневной жизни.</p>
                        </div>
                    </div>

                    <div  style="margin-left:60px" class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4><a href="">{{__('messages.Фриланс')}}</a></h4>
                            <p>
                                Фриланс — это способ заработка, который позволяет сотрудничать с разными работодателями (даже одновременно!) без постоянного трудоустройства в какой-либо организации.</p>
                        </div>
                    </div>



                    <div  style="margin-left:60px" class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-layer"></i></div>
                            <h4><a href="">Как выбрать работадателя</a></h4>
                            <li>🗂Запросите выписку из реестра налоговой</li>
                            <li>🧑‍⚖️ Узнайте об отношениях с госорганами</li>
                            <li>💸 Убедитесь, что не начато банкротство</li>
                            <li>🥊 Проверьте, были ли споры с контрагентами</li>
                            <li>💾 Защитите свои персональные данные</li>
                            <li>👷 Узнайте, как соблюдаются условия труда</li>
                            <li>📝 Почитайте отзывы работников</li>
                            <li>🗣 Уточните подробности на собеседовании</li>
                            <li>✉️ Не соглашайтесь на серую зарплату</li>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Team</h2>

                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                            <div class="pic"><img src="assets/img/team/meirbek1.jpeg" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Оңайбай Мейірбек</h4>
                                <span>CEO and TEAM LEADER</span>
                                <p>Нархоз университетінде DE мамандығы бойынша 2 курс студенті</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 ">
                        <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300" style="height: 235px">
                            <div class="pic"><img src="assets/img/team/bekzat.png" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Қалау Бекзат</h4>
                                <span>CEO and FullStack developer</span>
                                <p>Нархоз университетінде DE мамандығы бойынша 2 курс студенті</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4">
                        <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
                            <div class="pic"><img src="assets/img/team/berik.jpeg" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Берік Төлегенов</h4>
                                <span>FRONTEND developer</span>
                                <p>Нархоз университетінде DE мамандығы бойынша 2 курс студенті</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4">
                        <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
                            <div class="pic"><img src="assets/img/team/nurtay.jpeg" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Серік Нұртай</h4>
                                <span>Backend developer</span>
                                <p>Нархоз университетінде DE мамандығы бойынша 2 курс студенті</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4">
                        <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
                            <div class="pic"><img src="assets/img/team/gulia.jpeg" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Гүлбаршын Валиханова</h4>
                                <span>Design </span>
                                <p>Нархоз университетінде DE мамандығы бойынша 2 курс студенті</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4">
                        <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
                            <div class="pic"><img src="assets/img/team/fariza.jpeg" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Бухарова Фариза</h4>
                                <span>SMM Manager</span>
                                <p>Нархоз университетінде DE мамандығы бойынша 2 курс студенті</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4 d-flex justify-content-center" style="margin-left: 300px">
                        <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
                            <div  class="pic"><img src="assets/img/team/mako1.png" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Дайрабай Мағжан</h4>
                                <span>PR manager</span>
                                <p>Нархоз университетінде DE мамандығы бойынша 2 курс студенті</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            <section id="pricing" class="pricing">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>{{__('messages.Зарплаты IT-специалистов растут ежегодно')}}</h2>
                        <p>{{('messages.Итак, в связи с ростом востребованности, зарплаты IT- специалистов стали расти. По данным
                            ANYWORK.kz, в 2022 году они выросли на 26%.')}}</p>
                    </div>

                    <div class="row">

                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="box">
                                <h3>{{__('messages.Junior Developer')}}</h3>
                                <h4><sup>$</sup>800-1000<span>{{__('messages.per month')}}</span></h4>
                                <ul>
                                    <li><i class="bx bx-check"></i> {{__('messages.Он может иметь небольшой практический опыт или не иметь его вообщеcтве')}}</li>
                                    <li><i class="bx bx-check"></i> {{__('messages.С более сложными у него чаще всего возникают затруднения, однако толковый кодер может справиться и с ними при помощи других сотрудников компании.')}}</li>
                                    <li><i class="bx bx-check"></i> {{__('messages.Он обладает определенными знаниями и навыками, способен решать простые задачи.')}}</li>
                                </ul>

                            </div>
                        </div>

                        <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
                            <div class="box featured">
                                <h3>{{__('messages.Middle developer')}}</h3>
                                <h4><sup>$</sup>1700-2000<span>{{__('messages.per month')}}</span></h4>
                                <ul>
                                    <li><i class="bx bx-check"></i> {{__('messages.Middle')}} {{__('messages.программист')}} –
                                        {{__('messages.достаточно опытный кодер, способный самостоятельно справляться с задачами,которые джуниору не под силу.')}}</li>
                                    <li><i class="bx bx-check"></i> {{__('messages.Чтобы решать более сложные вопросы, ему необходима помощь ментора')}}</li>

                                </ul>

                            </div>
                        </div>

                        <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                            <div class="box">
                                <h3>{{__('messages.Senior Developer')}}</h3>
                                <h4><sup>$</sup>2500-3000<span>{{__('messages.per month')}}</span></h4>
                                <ul>
                                    <li><i class="bx bx-check"></i> {{__('Senior')}} {{__('программист')}} {{__('messages.может справляться с задачами высокой сложности, а также руководить другими сотрудниками, участвующими в разработке')}}</li>
                                    <li><i class="bx bx-check"></i> {{__('messages.Нахождение нестандартных путей решения эффективных инструментов достижения цели – также его компетенция.')}}</li>

                                </ul>

                            </div>
                        </div>

                    </div>

                </div>
            </section><!-- End Pricing Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>{{__('messages.Неге бізді таңдауыңыз керек!')}}</h2>
                    <p>{{__('messages.Отандық өнімбіз.Мұнда Қазақстандық барлық компаниялар тізімі енгізілген.Кез-келген уақытта бос
                        вакансия қарай аласыз!')}}</p>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Тиімділігі?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    {{__('messages.Ең басты артықшылығы жұмысты сырттан іздемейсіз.Тек өзіңізге қажет бағытты таңдап қойсаңыз жеткілікті.Іздеген бағытыңызға қарай жұмыс шығатын болады.')}}
                                </p>
                            </div>
                        </li>


                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Ерекшелігі?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                       Бұл платформа студенттеге арналған.Яғни аудиториясы студенттер.Көптеген компаниялар білікті мамандар іздейді .Мұнда студенттер түрлі хакатондарға өздерінің жобасын ұсынып,курстарға қатысу арқылы тәжірибе жинайды.Және осы арқылы түйіндемелерін ұсынады
                                </p>
                            </div>
                        </li>



                    </ul>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Как нас найти</h2>

                </div>

                <div class="row">

                    <div class="col-lg-5 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Орналасқан жері:</h4>
                                <p>Алматы қаласы:Жандосова көшесі: 55</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Электронды почта:</h4>
                                <p>anywork@example.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Телефон:</h4>
                                <p>+7 778 245 32 06</p>
                            </div>

                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                        </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form action="{{asset('forms/contact.php')}}" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Есімі:</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Эл.почта:</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Тақырыбы:</label>
                                <input type="text" class="form-control" name="subject" id="subject" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Хабарлама:</label>
                                <textarea class="form-control" name="message" rows="10" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Сәтті орындалды.Рахмет!!!</div>
                            </div>
                            <div class="text-center"><button type="submit">Жіберу</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section>
    </main>
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>AnyWork</h3>
                        <p>
                            Алматы қаласы: <br>
                            Жандосова көшесі: 55<br>
                            United States <br><br>
                            <strong>Телефон:</strong> +7 778 245 32 06<br>
                            <strong>Эл.почта:</strong> anywork@example.com<br>
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Әлеуметтік желілер:</h4>
                        <p>Біз осы желілерде бармыз:</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container footer-bottom clearfix">
            <div class="copyright">
                <div >&copy; Copyright <strong><span>Anywork</span></strong>. All Rights Reserved</div>
            </div>
            <div class="credits">
            </div>
        </div>
    </footer>
@endsection





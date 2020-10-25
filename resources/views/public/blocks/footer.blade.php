<!-- START FOOTER-->
<footer>
    <div class="footer-wrap">
        <img class="mobile" src="{{asset('/images/footer-bg-mobile.svg')}}" alt="">
        <img class="desktop" src="{{asset('/images/footer-bg-desktop.svg')}}" alt="">
        <a href="/">
            <img class="footer-logo-bg mobile" src="{{asset("images/footer-logo-ellipse-mobile.svg")}}" alt="">
            <img class="footer-logo-bg desktop" src="{{asset("images/footer-logo-ellipse-desktop.svg")}}" alt="">
            <img class="footer-logo mobile" src="{{asset("images/header-logo.svg")}}" alt="">
            <img class="footer-logo desktop" src="{{asset("images/footer-logo-desktop.svg")}}" alt="">
        </a>
        <div class="footer-blocks">
            <div class="write-us">
                <a href="#">
                    <img src="{{asset('/images/write-us.svg')}}" alt="">
                </a>
                <a href="#">Напишите нам</a>
            </div>
            <div class="menu-contacts-block-wrap">
                <div class="menu-contacts-block">
                    <div class="menu">
                        <span class="menu-title">Разделы:</span>
                        <a href="/" class="menu-item">ГЛАВНАЯ</a>
                        <a href="#" class="menu-item">ПАВЛОВНИЯ</a>
                        <a href="#" class="menu-item">МАГАЗИН</a>
                        <a href="#" class="menu-item">галерея</a>
                        <a href="#" class="menu-item">НОВОСТИ</a>
                        <a href="#" class="menu-item">БИЗНЕС-ПЛАН</a>
                        <a href="#" class="menu-item">КОНТАКТЫ</a>
                    </div>

                    <div class="contacts-info mobile">
                        <div class="schedule">
                            <span class="schedule-title">График работы:</span>
                            <span class="schedule-value">Пн-Пт: 9:00-18:00</span>
                        </div>
                        <div class="messangers">
                            <a href="#">
                                <img src="{{asset('/images/skype.svg')}}" alt="">
                            </a>
                            <a href="#">
                                <img src="{{asset('/images/whatsapp.svg')}}" alt="">
                            </a>
                            <a href="#">
                                <img src="{{asset('/images/telegram.svg')}}" alt="">
                            </a>
                        </div>
                        <div class="phone">
                            <a href="tel:+34 642 787 555">+34 642 787 555</a>
                        </div>
                        <div class="email">
                            <a href="mailto:info@paulownia.pro">info@paulownia.pro</a>
                        </div>
                        <div class="socials">
                            <a href="#">
                                <img src="{{asset('/images/youtube.svg')}}" alt="">
                            </a>
                            <a href="#">
                                <img src="{{asset('/images/facebook.svg')}}" alt="">
                            </a>
                            <a href="#">
                                <img src="{{asset('/images/instagram.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="services">
                    <span class="services-title">Услуги Paulownia Professional®:</span>
                    <a href="/" class="services-item">Продажа саженцев и деревьев павловнии </a>
                    <a href="/" class="services-item">Купля/Продажа древесины </a>
                    <a href="/" class="services-item">Анализ и персональное проектирование плантаций</a>
                    <a href="/" class="services-item">Расчет рентабельности инвестиций</a>
                    <a href="/" class="services-item">Консультация на протяжении выращивания</a>
                    <a href="/" class="services-item">Выкупаем плантации павловнии</a>
                </div>
                <div class="legal-warning">
                    <span class="legal-warning-title">Правовое предупреждение:</span>
                    <a href="/" class="legal-warning-item">Условия покупки</a>
                    <a href="/" class="legal-warning-item">Политика конфиденциальности</a>
                    <a href="/" class="legal-warning-item">FAQ Магазин</a>
                    <a href="/" class="legal-warning-item">FAQ Уход за саженцами</a>
                    <a href="/" class="legal-warning-item">Карта сайта</a>
                </div>
                <div class="contacts-payment-block">
                    <div class="contacts-info desktop">
                        <div class="schedule">
                            <span class="schedule-title">График работы:</span>
                            <span class="schedule-value">Пн-Пт: 9:00-18:00</span>
                        </div>
                        <div class="messangers">
                            <a href="#">
                                <img src="{{asset('/images/skype.svg')}}" alt="">
                            </a>
                            <a href="#">
                                <img src="{{asset('/images/whatsapp.svg')}}" alt="">
                            </a>
                            <a href="#">
                                <img src="{{asset('/images/telegram.svg')}}" alt="">
                            </a>
                        </div>
                        <div class="phone">
                            <a href="tel:+34 642 787 555">+34 642 787 555</a>
                        </div>
                        <div class="email">
                            <a href="mailto:info@paulownia.pro">info@paulownia.pro</a>
                        </div>
                        <div class="socials">
                            <a href="#">
                                <img src="{{asset('/images/youtube.svg')}}" alt="">
                            </a>
                            <a href="#">
                                <img src="{{asset('/images/facebook.svg')}}" alt="">
                            </a>
                            <a href="#">
                                <img src="{{asset('/images/instagram.svg')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="payment">
                        <a href="#">
                            <img src="{{asset('/images/mastercard.svg')}}" alt="">
                        </a>
                        <a href="#">
                            <img src="{{asset('/images/visa.svg')}}" alt="">
                        </a>
                        <a href="#">
                            <img src="{{asset('/images/american-express.svg')}}" alt="">
                        </a>
                        <a href="#">
                            <img src="{{asset('/images/paypal.svg')}}" alt="">
                        </a>
                        <a href="#">
                            <img src="{{asset('/images/unknow-system-border.svg')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="copyright">Copyright  ©2021, Paulownia Professional S.L.® </div>
        </div>
    </div>
</footer>
<!-- END FOOTER-->
<style>
    footer {
        flex-shrink: 0;
    }
    .footer-wrap {
        position: relative;
        width: 100%;
        z-index: 2;
    }
    .footer-wrap > img {
        position: absolute;
        width: 100%;
        z-index: -1;
    }
    .desktop {
        display: none;
    }
    .footer-logo-bg {
        position: absolute;
        top: -15px;
        left: 24px;
        z-index: -2;
    }
    .footer-logo {
        width: 108px;
        position: absolute;
        top: 7px;
        left: 65px;
    }
    .footer-blocks {
        display: flex;
        flex-direction: column;
        padding: 95px 15px 10px 20px;
    }
    .write-us {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 275px;
        height: 52px;
        background: white;
        border: 0.5px solid #C4C4C4;
        border-radius: 30px;
        padding: 5px 12px 5px 5px;
        margin-bottom: 30px;
    }
    .write-us > a:first-child {
        width: 42px;
        height: 42px;
        background: #5B9600;
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .write-us > a:last-child {
        width: 208px;
        height: 32px;
        background: #5B9600;
        border-radius: 30px 0;
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        line-height: 18px;
        text-transform: uppercase;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .menu-contacts-block {
        display: flex;
        align-items: start;
        justify-content: space-between;
    }
    .menu, .contacts-info {
        width: calc((100% - 10px) / 2);
    }
    .menu {
        font-family: 'Poppins', sans-serif;
        color: white;
        display: flex;
        flex-direction: column;
    }
    .menu-title {
        font-size: 14px;
        line-height: 21px;
        font-weight: 600;
        margin-bottom: 8px;
    }
    .menu-item {
        font-size: 14px;
        line-height: 25px;
        color: white;
        text-transform: uppercase;
        margin-bottom: 5px;
    }
    .menu-item:last-child {
        margin-bottom: 0;
    }
    .contacts-info {
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        line-height: 21px;
        color: white;
    }
    .schedule {
        display: flex;
        flex-direction: column;
    }
    .schedule-value {
        color: white;
        margin-bottom: 5px;
    }
    .messangers {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 5px;
    }
    .messangers > a {
        margin-right: 5px;
    }
    .messangers > a:last-child {
        margin-right: 0;
    }
    footer .phone > a, footer .email > a {
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        line-height: 21px;
        letter-spacing: -0.04em;
        color: #FDFDFD;
    }
    .socials {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 35px;
    }
    .socials > a{
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .services, .legal-warning {
        display: flex;
        flex-direction: column;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        line-height: 25px;
        color: white;
        margin-top: 15px;
    }
    .services-title, .legal-warning-title {
        font-weight: 600;
    }
    .services-item, .legal-warning-item {
        color: white;
    }
    .payment {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 30px;
    }
    .copyright {
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        line-height: 20px;
        color: white;
        margin-top: 30px;
        text-align: center;
    }
    @media (min-width: 1024px) {
        .mobile {
            display: none;
        }
        .footer-logo-bg {
            top: -45px;
            left: 70px;
            transform: scale(0.6);
        }
        .footer-logo {
            width: 314px;
            top: -15px;
            left: 125px;
            transform: scale(0.6);
        }
        .desktop {
            display: block;
        }
        .footer-blocks {
            padding:50px 10px 5px;
        }
        .write-us {
            margin: auto;
            margin-right: 0;
        }
        .menu-contacts-block-wrap {
            display: flex;
            align-items: start;
            justify-content: space-between;
            margin-top: 10px;
        }
        .menu {
            margin-right: 0;
            width: 100%;
        }
        .menu-item {
            line-height: 16px;
        }
        .services, .legal-warning, .payment {
            margin-top: 0;
        }
        .contacts-info {
            width: 100%;
        }
        .schedule-title {
            font-weight: 600;
        }
        .messangers {
            justify-content: start;
            margin-bottom: 0;
        }
        .socials {
            justify-content: start;
            margin: 0;
            transform: scale(0.5);
        }
        .payment > a, .socials > a {
            margin-right: 10px;
        }
        .payment {
            transform: scale(0.5);
        }
        .payment > a:last-child, .socials > a:last-child {
            margin-right: 0;
        }
        .copyright {
            font-size: 14px;
            line-height: 16px;
            margin-top: 0;
        }
        @media (min-width: 1440px) {
            .footer-logo-bg {
                top: -30px;
                left: 125px;
                transform: scale(1);
            }
            .footer-logo {
                width: 314px;
                top: 0;
                left: 180px;
                transform: scale(1);
            }
            .footer-blocks {
                padding:110px 140px 20px;
            }
            .menu-item {
                line-height: 21px;
            }
            .messangers {
                margin-bottom: 5px;
            }
            .socials {
                justify-content: start;
                margin:  10px 0 10px;
                transform: scale(1);
            }
            .payment {
                transform: scale(1);
            }
            .copyright {
                line-height: 20px;
                margin-top: 20px;
            }
        }
        @media (min-width:1920px) {
            .footer-logo-bg {
                top: 10px;
                left: 190px;
            }
            .footer-logo {
                top: 45px;
                left: 240px;
            }
            .footer-blocks {
                padding: 210px 100px 20px;
            }
        }
    }
</style>
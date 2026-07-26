<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Первая помощь: практический курс — 15 августа, Москва</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="api/visit.php" defer></script>
    <script src="js/main.js" defer></script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m,e,t,r,i,k,a){
            m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)
        })(window, document,'script','https://mc.yandex.ru/metrika/tag.js?id=110974111', 'ym');

        ym(110974111, 'init', {ssr:true, webvisor:true, clickmap:true, ecommerce:"dataLayer", referrer: document.referrer, url: location.href, accurateTrackBounce:true, trackLinks:true});
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/110974111" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>
    <div class="topbar">
        <div class="container topbar-inner">
            <span class="topbar-fact"><strong>15 августа</strong>, Москва · осталось <strong>6 мест из 14</strong></span>
            <span class="topbar-timer">Запись в группу закроется через <strong id="topbar-countdown">—</strong></span>
            <a class="btn btn-topbar" href="#registration">Забронировать место</a>
        </div>
    </div>

    <header class="hero">
        <div class="container hero-grid">
            <div class="hero-content">
                <span class="hero-badge">Офлайн-курс · суббота, 15 августа 2026 · осталось 6 мест из 14</span>
                <h1>Один день практики — и вы знаете, что делать до приезда скорой</h1>
                <p class="hero-text">
                    Восемь часов на манекенах и в парах: остановить кровотечение, провести СЛР, помочь
                    при травме и ожоге. Ведут врачи скорой и инструкторы Красного Креста.
                </p>
                <ul class="hero-points">
                    <li><strong>10:00 – 18:00</strong>, Москва, ул. Примерная, 10</li>
                    <li><strong>от 4 900 ₽</strong> или 4 платежа по 1 225 ₽ — Яндекс Сплит, без переплаты</li>
                    <li><strong>Бронь бесплатна</strong>, оплата после подтверждения места</li>
                    <li><strong>Группа до 14 человек</strong> — практика доходит до каждого</li>
                </ul>
                <div class="hero-note">
                    <strong>1 200+ выпускников с 2019 года.</strong> Каждый уходит с именным сертификатом,
                    памяткой по алгоритмам и навыком, отработанным руками, а не прослушанным на лекции.
                </div>
            </div>

            <section class="registration-section" id="registration">
                <div class="registration-panel">
                    <h2 class="panel-title">Забронировать место</h2>
                    <p class="panel-lead">Имя и телефон — всё. Перезвоним в течение рабочего дня.</p>
                    <div class="order-summary" id="order-summary">
                        <div class="order-row">
                            <span>Тариф</span>
                            <strong id="order-tariff">Базовый — 4 900 ₽ или 4 × 1 225 ₽ Сплитом</strong>
                        </div>
                        <div class="order-row">
                            <span>Курс</span>
                            <strong>15 августа, 10:00 – 18:00, ул. Примерная, 10</strong>
                        </div>
                    </div>
                    <form class="form-grid" id="registration-form" action="api/submit.php" method="post" novalidate>
                        <label>
                            Имя
                            <input type="text" name="name" required autocomplete="name" placeholder="Как к вам обращаться">
                        </label>
                        <label>
                            Телефон
                            <input type="tel" name="phone" required autocomplete="tel" inputmode="tel" placeholder="+7 900 000-00-00">
                        </label>
                        <label>
                            E-mail <span class="field-optional">необязательно — пришлём памятку и чек</span>
                            <input type="email" name="email" autocomplete="email" placeholder="you@example.com">
                        </label>
                        <div class="purpose-field">
                            <span class="purpose-label">Зачем вам курс <span class="field-optional">выбрано, можно поменять</span></span>
                            <div class="purpose-chips" id="purpose-chips">
                                <button type="button" class="purpose-chip" data-purpose="Хочу защитить семью и детей">Защитить семью и детей</button>
                                <button type="button" class="purpose-chip" data-purpose="Нужно для работы">Нужно для работы</button>
                                <button type="button" class="purpose-chip" data-purpose="Для поездок и спорта">Для поездок и спорта</button>
                                <button type="button" class="purpose-chip" data-purpose="Просто хочу уметь помочь" data-default="true">Просто хочу уметь помочь</button>
                            </div>
                            <details class="purpose-custom">
                                <summary>Написать своими словами</summary>
                                <label class="purpose-textarea">
                                    <textarea name="purpose" placeholder="Например: работаю с детьми, хочу уверенно действовать при травме"></textarea>
                                </label>
                            </details>
                        </div>
                        <button type="submit" class="btn btn-submit">Забронировать место бесплатно</button>
                        <p class="form-microcopy">
                            Бесплатно · оплата после подтверждения · можно частями через Яндекс Сплит
                        </p>
                        <p class="form-legal">
                            Нажимая кнопку, вы соглашаетесь на обработку персональных данных: используем их
                            только для связи по этой заявке.
                        </p>
                    </form>
                    <p class="form-message" id="form-message" aria-live="polite"></p>
                    <div class="form-proof">
                        <span>Перезвоним в течение рабочего дня</span>
                        <span>Вернём или перенесём, если планы изменятся</span>
                        <span>1 200+ выпускников</span>
                    </div>
                </div>
            </section>
        </div>
    </header>

    <main>
        <section class="proof-band">
            <div class="container">
                <div class="proof-row">
                    <div class="proof-item"><strong>1 200+</strong> выпускников с 2019 года</div>
                    <div class="proof-item"><strong>4,9 из 5</strong> средняя оценка группы</div>
                    <div class="proof-item"><strong>Лицензия № 041-25</strong> на образовательную деятельность</div>
                    <div class="proof-item"><strong>14 человек</strong> максимум в группе</div>
                </div>
            </div>
        </section>

        <section class="section pricing-section">
            <div class="container">
                <h2 class="section-title">Тарифы</h2>
                <p class="section-lead">
                    Во все тарифы входят материалы, сертификат и памятка. Оплата — после подтверждения места
                    менеджером, можно частями через Яндекс Сплит. Планы изменятся — вернём деньги или перенесём на другую дату.
                </p>
                <div class="pricing-grid">
                    <article class="pricing-card" data-tariff="Базовый" data-price="4 900 ₽" data-split="4 × 1 225 ₽">
                        <h3>Базовый</h3>
                        <div class="price">4 900 ₽</div>
                        <p class="price-split">или 4 платежа по 1 225 ₽ — Яндекс Сплит, без переплаты</p>
                        <ul class="pricing-list">
                            <li>Полный однодневный курс</li>
                            <li>Сертификат и памятка</li>
                            <li>Кофе-брейки</li>
                        </ul>
                        <button type="button" class="btn btn-register">Записаться на базовый</button>
                    </article>
                    <article class="pricing-card featured" data-tariff="Расширенный" data-price="7 900 ₽" data-split="4 × 1 975 ₽">
                        <h3>Расширенный</h3>
                        <div class="price">7 900 ₽</div>
                        <p class="price-split">или 4 платежа по 1 975 ₽ — Яндекс Сплит, без переплаты</p>
                        <ul class="pricing-list">
                            <li>Всё из базового тарифа</li>
                            <li>Набор перевязочных материалов</li>
                            <li>Дополнительный практический блок</li>
                        </ul>
                        <button type="button" class="btn btn-register">Записаться на расширенный</button>
                    </article>
                    <article class="pricing-card" data-tariff="Корпоративный" data-price="12 900 ₽" data-split="4 × 3 225 ₽">
                        <h3>Корпоративный</h3>
                        <div class="price">12 900 ₽</div>
                        <p class="price-split">или 4 платежа по 3 225 ₽ — Яндекс Сплит, без переплаты</p>
                        <ul class="pricing-list">
                            <li>Разбор рисков вашей профессии</li>
                            <li>Консультация для HR или руководителя</li>
                            <li>Отчёт о прохождении для работодателя</li>
                        </ul>
                        <button type="button" class="btn btn-register">Записаться на корпоративный</button>
                    </article>
                </div>
            </div>
        </section>

        <section class="section reviews-section">
            <div class="container">
                <h2 class="section-title">Что говорят выпускники</h2>
                <p class="section-lead">
                    Средняя оценка группы после занятия — 4,9 из 5. Три отзыва про то, что человек смог сделать
                    после курса.
                </p>
                <div class="reviews-grid">
                    <article class="review-card">
                        <div class="review-rating">★★★★★</div>
                        <p class="review-text">
                            Через месяц после курса сын подавился на детском празднике. Я не думала — просто
                            сделала то, что отрабатывали на манекене. Всё закончилось хорошо.
                        </p>
                        <p class="review-author"><strong>Ольга Т.</strong> — мама двоих детей, курс в марте 2026</p>
                    </article>
                    <article class="review-card">
                        <div class="review-rating">★★★★★</div>
                        <p class="review-text">
                            Работаю мастером на производстве. После блока по кровотечениям наложил давящую
                            повязку коллеге до приезда скорой. Раньше бы просто растерялся.
                        </p>
                        <p class="review-author"><strong>Сергей М.</strong> — мастер участка, курс в феврале 2026</p>
                    </article>
                    <article class="review-card">
                        <div class="review-rating">★★★★★</div>
                        <p class="review-text">
                            Шла за галочкой для работы, а ушла с реальным навыком: СЛР сделала шесть раз,
                            в том числе с дефибриллятором. Инструктор поправлял каждое движение.
                        </p>
                        <p class="review-author"><strong>Ирина К.</strong> — фитнес-тренер, курс в апреле 2026</p>
                    </article>
                </div>
                <div class="inline-cta">
                    <div class="inline-cta-text">
                        <strong>Группа 15 августа — 14 мест, осталось 6.</strong>
                        Бронь бесплатна, оплата после подтверждения. Доступен Яндекс Сплит.
                    </div>
                    <a class="btn btn-inline" href="#registration">Занять место</a>
                </div>
            </div>
        </section>

        <section class="section instructors-section">
            <div class="container">
                <h2 class="section-title">Кто ведёт курс</h2>
                <div class="instructors-grid">
                    <article class="instructor-card">
                        <div class="instructor-photo">АК</div>
                        <h3>Алексей Кравцов</h3>
                        <p class="instructor-title">Врач скорой, стаж 14 лет · 8 000+ выездов · сертификат ERC BLS</p>
                    </article>
                    <article class="instructor-card">
                        <div class="instructor-photo">МС</div>
                        <h3>Марина Соколова</h3>
                        <p class="instructor-title">Инструктор РКК, фельдшер, стаж 11 лет · обучила 1 200+ человек</p>
                    </article>
                    <article class="instructor-card">
                        <div class="instructor-photo">ДН</div>
                        <h3>Дмитрий Новиков</h3>
                        <p class="instructor-title">Парамедик, наставник центра · сертификат ERC First Aid Provider</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="emotional-photo">
            <img src="images/cpr-training.jpg" alt="Практика сердечно-легочной реанимации на манекене">
        </section>

        <section class="section program-section">
            <div class="container">
                <h2 class="section-title">Программа дня</h2>
                <p class="section-lead program-intro">
                    Шесть модулей, больше половины времени — практика. Нажмите «Подробнее», если хотите
                    увидеть, как устроен конкретный блок.
                </p>
                <div class="program-list">
                    <article class="program-module">
                        <h3>10:00 – 11:00 · Оценка обстановки и безопасность</h3>
                        <p class="module-lead">
                            Как подойти к пострадавшему и не пострадать самому: осмотр места, проверка
                            сознания и дыхания, чёткий вызов скорой через свидетелей.
                        </p>
                        <details class="module-more">
                            <summary>Подробнее</summary>
                            <p>
                                Разбираем последовательность действий при любом происшествии: остановиться,
                                оглядеть место, определить число пострадавших, понять, насколько ситуация
                                опасна. Отдельно — как проверить сознание и дыхание, не повредив шею, и как
                                громко попросить свидетеля вызвать скорую, пока вы начинаете помощь.
                                Отработка на манекене и в паре.
                            </p>
                        </details>
                    </article>
                    <article class="program-module">
                        <h3>11:00 – 12:30 · Сердечно-легочная реанимация</h3>
                        <p class="module-lead">
                            Центральные полтора часа: компрессии на манекене до автоматизма, работа в паре
                            и втроём, тренировочный дефибриллятор AED.
                        </p>
                        <details class="module-more">
                            <summary>Подробнее</summary>
                            <p>
                                Когда нужна реанимация, как положить пострадавшего, куда и с какой частотой
                                давить, когда можно обойтись без искусственного дыхания. Отрабатываем смену
                                спасателя и работу с тренировочным AED: включить, приложить электроды, не
                                мешать анализу ритма. Каждый несколько раз проходит полный цикл.
                            </p>
                        </details>
                    </article>
                    <article class="program-module">
                        <h3>12:30 – 13:30 · Обед и разбор кейсов</h3>
                        <p class="module-lead">
                            Пауза и живой разбор реальных случаев инструкторов — где помощь очевидца спасла
                            жизнь, а где навредила.
                        </p>
                        <details class="module-more">
                            <summary>Подробнее</summary>
                            <p>
                                Разбираем случаи, когда помощь очевидца спасла жизнь, и ситуации, где из-за
                                неправильных действий стало хуже. Можно задать любой вопрос: про страх крови,
                                про ответственность, про то, как не «замереть» в первую минуту.
                            </p>
                        </details>
                    </article>
                    <article class="program-module">
                        <h3>13:30 – 15:00 · Кровотечения и шок</h3>
                        <p class="module-lead">
                            Давящая повязка из подручного, турникет, признаки шока. Практика на имитаторах ран.
                        </p>
                        <details class="module-more">
                            <summary>Подробнее</summary>
                            <p>
                                Отличить капиллярное, венозное и артериальное кровотечение, наложить давящую
                                повязку из того, что под рукой, правильно применить турникет. Признаки шока:
                                бледность, холодный пот, слабый пульс — и что делать: уложить, сохранить тепло,
                                следить за дыханием, не давать пить.
                            </p>
                        </details>
                    </article>
                    <article class="program-module">
                        <h3>15:00 – 16:30 · Переломы, вывихи, ожоги</h3>
                        <p class="module-lead">
                            Самые бытовые травмы: шина из ремня и журнала, когда пострадавшего нельзя трогать,
                            что нельзя делать с ожогом.
                        </p>
                        <details class="module-more">
                            <summary>Подробнее</summary>
                            <p>
                                Признаки перелома и вывиха, фиксация конечности подручными средствами,
                                безопасное перемещение и случаи, когда трогать нельзя до приезда медиков.
                                Помощь при ожогах: охладить, закрыть стерильно, не мазать маслом и кремом.
                                Каждый пробует иммобилизацию на напарнике.
                            </p>
                        </details>
                    </article>
                    <article class="program-module">
                        <h3>16:30 – 18:00 · Итоговая практика и сертификация</h3>
                        <p class="module-lead">
                            Цельные сценарии с несколькими пострадавшими и шумом, обратная связь инструктора
                            и вручение сертификатов.
                        </p>
                        <details class="module-more">
                            <summary>Подробнее</summary>
                            <p>
                                Упражнения с несколькими пострадавшими, ограниченным временем и необходимостью
                                расставить приоритеты. Инструкторы разбирают действия сразу после каждого
                                прогона, в конце — индивидуальная обратная связь и сертификат.
                            </p>
                        </details>
                    </article>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <h2 class="section-title">После курса вы сможете</h2>
                <div class="injury-grid">
                    <article class="injury-card">
                        <h3>Остановить кровь</h3>
                        <p>Давящая повязка и турникет — из того, что под рукой.</p>
                    </article>
                    <article class="injury-card">
                        <h3>Провести СЛР</h3>
                        <p>Компрессии и дефибриллятор — до приезда скорой.</p>
                    </article>
                    <article class="injury-card">
                        <h3>Зафиксировать перелом</h3>
                        <p>Шина из подручного и безопасное перемещение.</p>
                    </article>
                    <article class="injury-card">
                        <h3>Помочь при ожоге</h3>
                        <p>Охладить, закрыть, не навредить маслом и кремом.</p>
                    </article>
                    <article class="injury-card">
                        <h3>Распознать шок</h3>
                        <p>Уложить, согреть, следить за дыханием до медиков.</p>
                    </article>
                    <article class="injury-card">
                        <h3>Не навредить при травме головы</h3>
                        <p>Когда нельзя менять положение и как удержать голову.</p>
                    </article>
                </div>
                <ul class="legal-notes">
                    <li><strong>Добросовестный помощник.</strong> Помогаете в разумных пределах и без грубой неосторожности — закон защищает вас от необоснованных претензий.</li>
                    <li><strong>Границы ответственности.</strong> Разбираем, какие действия считаются разумными и когда правильнее дождаться медиков.</li>
                    <li><strong>Вызов служб.</strong> Что сказать диспетчеру, что передать медикам по прибытии, какие данные сохранить.</li>
                </ul>
            </div>
        </section>

        <section class="section final-cta-section">
            <div class="container">
                <div class="final-cta">
                    <h2>Осталось 6 мест из 14 на 15 августа</h2>
                    <p>
                        Бронь бесплатна и ни к чему не обязывает: менеджер перезвонит, подтвердит место
                        и ответит на вопросы. Оплата после подтверждения — целиком или частями через Яндекс Сплит.
                    </p>
                    <a class="btn btn-final" href="#registration">Забронировать место бесплатно</a>
                    <p class="final-cta-note">Запись в группу закроется через <strong id="final-countdown">—</strong>. Дальше — перенос на следующую дату.</p>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">
            © 2026 Учебный центр «Спаси-Себя». Курс первой помощи, Москва. Лицензия № 041-25.
        </div>
    </footer>
</body>
</html>

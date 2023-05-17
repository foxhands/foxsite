<!DOCTYPE html>
<html>
<head>
    <title>Бутенко Руслан - фрилансер</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .theme-switch {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 9999;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 20px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:checked + .slider:before {
            transform: translateX(20px);
        }
        .dark-theme {
            background-color: #343a40;
            color: #fff;
        }
    </style>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Бутенко Руслан - фрилансер</a>
        <div class="theme-switch">
            <label class="switch">
                <input type="checkbox" id="theme-switch-checkbox">
                <span class="slider round"></span>
            </label>
        </div>
    </nav>
</header>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Обо мне</h2>
                <p>
                    Я занимаюсь разработкой web-сайтов, движков, модулей, ботов и других проектов уже более 5 лет. Владею различными языками программирования, такими как PHP, JavaScript, Python, а также базами данных и фреймворками.
                </p>
                <p>
                    Постоянно развиваю свои навыки и следую лучшим практикам программирования. Готов работать над сложными проектами и интересными задачами, как индивидуально, так и в команде с другими разработчиками.
                </p>
                <p>
                    Если у вас есть интересный проект, пишите мне, вместе мы сможем превратить идею в реальность.
                </p>
            </div>
            <div class="col-md-6">
                <h2>Навыки и технологии</h2>
                <ul>
                    <li>PHP 5, 7, 8 (ООП включительно)</li>
                    <li>Sql, MySQL(i)\SQLite, NoSql, PostgreSql, MongoDB</li>
                    <li>JavaScript, Ajax, JQuery</li>
                    <li>HTML, CSS\SAAS\SCSS\LESS, Twig\tpl</li>
                    <li>Python, Node.js, GULP / WEBPACK</li>
                    <li>Laravel, Symfony, Yii2, Zend Framework, CodeIgniter, Shop-Script</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Дополнительные услуги</h2>
                <ul>
                    <li>Настройка сайтов и подключение доменов</li>
                    <li>Интеграция с различными CRM системами</li>
                    <li>Установка и настройка сайтов</li>
                    <li>Исправлениеошибок</li>
                    <li>Перенос сайтов на другие хостинги / VDS и домены</li>
                    <li>Внесение различных правок и улучшений</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h2>Рабочее время и контакты</h2>
                <p>
                    Рабочее время: ПН-ПТ: с 10 до 18 (UTC +3)<br>
                    СБ-ВС: при интересном проекте готов работать даже в выходные, если это удобно обоим сторонам.
                </p>
                <p>
                    Вы можете связаться со мной по следующим контактам:<br>
                    Email: <a href="mailto:foxhand7@gmail.com">foxhand7@gmail.com</a><br>
                    Телефон: <a href="tel:380687541443">+380-68-754-14-43</a><br>
                    Telegram: <a href="https://t.me/foxhand">Foxhand</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    // Функция для проверки текущего времени и применения соответствующей темы
    function toggleThemeByTime() {
        var currentHour = new Date().getHours();
        var themeSwitchCheckbox = document.getElementById("theme-switch-checkbox");

        // Если текущее время между 18:00 и 6:00, включаем темную тему
        if (currentHour >= 18 || currentHour < 6) {
            themeSwitchCheckbox.checked = true;
            document.body.classList.add("dark-theme");
        } else {
            themeSwitchCheckbox.checked = false;
            document.body.classList.remove("dark-theme");
        }
    }

    // Вызов функции при загрузке страницы
    toggleThemeByTime();

    // Обработчик события изменения состояния переключателя
    document.getElementById("theme-switch-checkbox").addEventListener("change", function() {
        if (this.checked) {
            document.body.classList.add("dark-theme");
        } else {
            document.body.classList.remove("dark-theme");
        }
    });
</script>
</body>
</html>

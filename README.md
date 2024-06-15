# Послідовність того, що робив

## Етап 1 - 06-06-2024

1. Створюємо папку `public`
2. В цій папці буде папка `assets` в ній будуть лежати стилі
3. Далі в папці `public` розташовуємо файли
   1. `index.tpl.php` - цей файл буде слугувати для відображення видів від логіки
   2. `index.php` - в цьому файлі буде сама логіка
   3. Слід звернути увагу, які лінки ми використовуємо. Тобто, якщо нам потрібно зробити перехід з файлу по навігації. то в тегові `<a href="about.php">About</a>` має бути посилання на файл `about.php` - який по суті в нас і являється контролером, а не на файл `about.tpl.php`. Бо це буде викликати таку складність, що змінні з файлу `about.php`, не будуть потрапляти у вид файлу `about.tpl.php`

## Етап 2 - 06-06-2024

1. Створив папки `app`, `core`
   1. В папці `app` поки папка `views` в ній ще папка `components` це мені потрібно, щоб зробити більш кращу структуру проекту Доброго ранку, будуть лежати ті частини які частіше всього повторюються. в моєму випадку, це файл `header.php`, `footer.php`, `sidebar.php` - які я потім буду підключати у їх відповідних видах
   2. В папці `core` в мене поки тільки файл `constatnts.php` - тут константи до мого проекту які будуть полегшувати різного роду підключення папок, та файлів
2. Ініціював файл `composer.json`
   1. Та поки інсталював `larapack/dd` для більш зручної відладки проекту

## Етап 3 - 06-06-2024

1. Створив папку `controllers`, куди перемістив наші перші два контролери `index.php`, `about.php`
2. Ми створюємо фронт конт контроллер. Тут суть в тому, щоб створити файл `.htaccess` яки буде приймати запит і відправляти його у папку `public/index.php`. І в цій же папці `public`, має бути файл `.htaccess`, який цей запит обробить

## Етап 4 - 07-06-2024

1. Ми зробили протенький роутінг у файлі `index.php`, ми додали таку строку `$uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');`, де:
   1. `trim` - по бокам буде обрізати якщо є `\`
   2. `parse_url` - функція, яка розбиває наш URL на `scheme`, `host`, `path`,`query`. В нашогму випадку, ми будемо вивкорристовувати `path`, що отримувати доступ до певної сторінки
      1. `scheme` - https
      2. `host` - це доменне імя нашого сайту
      3. `path` - це шлях на певну сторінку, який ми і будемо використовувати для роутінгу
      4. `query` - GET параметри, для отримання доступу для певних постів, товарів, пошуку, фільтрів тощо.
   3. `$_SERVER['REQUEST_URI']` - містить URI (Uniform Resource Identifier) поточного запиту. Вона використовується для отримання повного шляху до сторінки, включаючи параметри запиту.
2. Зробили у файлі `func.php` функцію `aboard` яку будемо використовувати, щоб редіректити користувачів на сторінку з помилкою, якщо запитуваної стоірнки не існує
3. Поправили файлик `.htaccess` а саме поле `RewriteRule (.*) index.php?$1 [L,QSA]`, додали `[L,QSA]`, якщо простими словами, то це дозволить нам, не втрачати `GET` параметри, які ми отримуємо з URL строки і потім вже коректно з ними працювати
   1. `[L,QSA]`: Це прапори, які змінюють поведінку правила: 1. `L (Last)`: Вказує, що це останнє правило, яке потрібно виконати. Після нього більше ніякі правила не обробляються. 2. `QSA (Query String Append)`: Вказує, що до кінцевого URL потрібно додати вихідний рядок запиту (query string).
      [Приклад того, як це буде виглядати якщо задампити наш GET запит](https://i.imgur.com/ExgIC6w.png) - тобто ми будемо конкретно бачити, який `ID` прийшов в `GET` запиті

## Етап 5 - 07-06-2024

1. Зробив невелику перестановку файлів
2. Зробив окремий файл в `config/routes.php` - який в нам буде відповідати за карту маршрутів
3. Створив окремий файл `core/router.php` - яка буде оброблювати наші роути. Виніс через ту причину, що наш файл, який є точкою входу `index.php` має бути максимально тонким
4. Підготував базу даних `blog`, з таблицею `posts` [Приклад таблиці](https://i.imgur.com/9VsLXXe.png)

## Етап 6 - 11-06-2024

1. Спочатку інталювали пакет `dotend` [phpdotenv](https://packagist.org/packages/vlucas/phpdotenv). Та створили два файла `.env` and `.env.examples`
2. Створили файл конфігурацій `config/db_config` = тут будемо передавати дані для підключення до бази даних через `PDO`
3. Створили класс `core/classes/Database.php` - де будемо безпосередньо виконувати підключення до бази даних
4. Змінив назву для контролера `index.php` на `home.php`, та змінив віцдповідні його види
5. У файлі `home.php` за допомогою підключення до бази даних, та `SQL` запиту, отримав з бази всі пости та відобразив їх у відповідному виді. Та також запитом `SELECT * FROM `posts`ORDER BY`id`DESC LIMIT`, отримав три останні пости, щоб відобразити їх у `sidebar` з відповідної змінної `$list_group`

## Етап 7 - 14-06-2024

1. У файлі `Database` - створили декілька методів для отриманні даних з таблиці
   1. `findAll` - метод який буде діставати з талиці всі пости
   2. `find` - метод який буде діставати один пост по його ID
   3. `findOrFail` - метод який буде перевіряти, чи є пост в методі `find` за його `ID`. Та якшо такого поста немає, буде запускати функцію `aboard`
2. Також в файлі `Database` - переписали метод `query`, таким чином, щоб він повертав методи цього класу ланцюжком, та зробили запобігання SQL інєкціям

   ```php
      public function query ($query, $params = []) {
         $this->statement = $this->connection->prepare($query);
         $this->statement->execute($params);

         return $this;
      }
   ```

   1. `$query` - Строка, що містить SQL-запит з плейсхолдерами для параметрів (наприклад, ? або :param).
   2. `$params` - Масив параметрів, які будуть підставлені у відповідні місця у запиті. За замовчуванням це порожній масив.
   3. `$this->statement = $this->connection->prepare($query);` - Підготовка SQL-запиту з використанням методу prepare.
   4. `$this->statement->execute($params);` - Виконання підготовленого SQL-запиту з переданими параметрами.
   5. `return $this;` - Повертає поточний об'єкт, що дозволяє викликати методи класу ланцюжком.

   > Приклад використання
   > `$post = $db->query("SELECT * FROM posts WHERE id = ? LIMIT 1", [$id])->findOrFail();`

   1. Викликається метод query, який готує та виконує SQL-запит для вибірки запису з таблиці posts, де `id` дорівнює значенню змінної `$id`. Плейсхолдер ? у запиті замінюється значенням $id з масиву параметрів `$id`.
   2. Після виконання запиту викликається метод `findOrFail` на об'єкті, який повернув метод `query`. Цей метод має бути реалізований в класі `Database` і повинен або повертати знайдений запис, або генерувати помилку, якщо запис не знайдено.

3. Створив контролер `post.php` та його вид `post.tpl.php`

## Етап 8 - 14-06-2024

1. Застосував патерни Singleton [Одинак на PHP](https://refactoring.guru/uk/design-patterns/singleton/php/example)
   Патерн Singleton потрібен для того, щоб гарантувати, що в програмі існує тільки один екземпляр певного класу. Він забезпечує глобальну точку доступу до цього екземпляра.

   ### Основні цілі:

   1. **Єдиний екземпляр**: Забезпечує наявність тільки одного об'єкта класу.
   2. **Глобальний доступ**: Дозволяє будь-де в коді отримати доступ до цього об'єкта.

   ### Використання:

   - **Логування**: Всі частини програми можуть записувати логи в один і той же об'єкт.
   - **Налаштування**: Глобальні конфігурації, доступні з будь-якого місця в програмі.
   - **Робота з базою даних**: Єдиний об'єкт для керування з'єднанням з базою даних.

   ### Приклад:

   ```php
   class Singleton {
      private static $instance = null; // Приватна змінна для зберігання єдиного екземпляра

      private function __construct() {} // Приватний конструктор
      private function __clone() {} // Заборона клонування
      private function __wakeup() {} // Заборона десеріалізації

      public static function getInstance() {
         if (self::$instance === null) {
               self::$instance = new self(); // Створення єдиного екземпляра
         }
         return self::$instance; // Повернення екземпляра
      }
   }

   // Використання Singleton
   $db = (Database::getInstance())->getConnection($db_config);
   ```

## Етап 9 - 15-06-2024

1. Створили контролер `post-create.php`, та його вид `post-create.tpl.php`
2. Контролер `post-create.php`, буде приймати дані з форми, з сторінки `post-create.tpl.php`, обробляти їх, та відправляти в базу
   1. При обробленні даних, які приходять методом `POST` слід враховувати, що при перезавантаженні сторінки, браузер буде просити відправити ці дані ще раз. Щоб цього не було, нампотрібно використовувати `headers`, щоб повторно редіректити на сторінку зі створення поста
3. `$_SERVER['REQUEST_METHOD']` - цей метод дозволяє нам, зрозуміти, яким методом, були відправлені дані з форми, та таким чином, робити їх обробку
   > Приклад:

```php
   if ($_SERVER['REQUEST_METHOD'] == "POST") {
      // виконати код
   }
```

4. `$fillable` - ця змінна дозволить нам, передавати параметри в функцію `vlidateInputsWithForm`
   1. `vlidateInputsWithForm` - Логіка цієї функції полягає в тому, щоб перевірити і відфільтрувати дані, що надійшли через `POST-запит`, залишивши тільки ті поля, які дозволені (згідно з масивом `$fillable`). Це корисно для захисту від надмірних або небажаних даних, які можуть бути надіслані користувачем через форму.
5. `validateOnEmpty` - призначена для перевірки масиву на наявність порожніх значень. Вона приймає масив елементів, перевіряє кожен елемент на порожність та повертає асоціативний масив з помилками для тих елементів, які виявилися порожніми.
6. Додав валідацію полів, які будуть відправлені з форми. [Приклад:](https://i.imgur.com/GlwRdEP.png) - тут використовуємо стандартну валідацію [Bootstrap](https://getbootstrap.com/docs/5.3/forms/validation/)

## Етап 10 - 15-06-2024

1. Зробив так, щоб за умови, якщо якесь з полів заповнено, а якесь ні. То при відправці форми не було такого, що всі введені дані зникнуть. [Приклад](https://i.imgur.com/uP9uJC8.png)
2. Створив функцію `old` - призначена для зручного відновлення значення поля форми після відправки форми. Це корисно, коли форма відправляється, але не проходить валідацію, і потрібно відобразити вже введені користувачем значення у формах знову, щоб він не заповнював їх заново.

```php
   function old($fieldname){
      return isset($_POST[$fieldname]) ? $_POST[$fieldname] : '';
   }
```

[приклад в коді](https://i.imgur.com/gb6HnjM.png)

3. Застосував у функції `validateInputsWithForm` метод `htmlspecialchars` - який дозволить запобігти передачі в базу коде, тобто активних тегів
4. Ще є такий прикол, ми можемо у форму вводити дані таким чином, що ці дані можуть мати **апостроф, дужки, або будь які інши знаки**, а ці знаки, може повпливати на дані в формі, таким чином, що браузер їх просто проігнорує. А проігнорує тому що, ми в тег `input` в його властивість `value` вставимо дані з методу POST, а ці дані наприклад будуть формату `Data " Hello` і тут вийде так, що слово `Hello` буде тупо обрізано, через те що в реченні є подвійні лапки [Приклад](https://i.imgur.com/GO4s3Rx.png). Тому щоб цього запобігти, створив функцію `specialChars` - приймає рядок `$str` як вхідний параметр і обробляє його за допомогою функції `htmlspecialchars`. Ця обробка перетворює спеціальні символи HTML у відповідні HTML-ентітіз, що допомагає запобігти XSS-атакам та іншим проблемам, пов'язаним з небезпечним введенням даних.

```php
function specialChars($str){
    return htmlspecialchars($str, ENT_QUOTES|ENT_SUBSTITUTE);
}
```

[Приклад застосування для запобігання](https://i.imgur.com/PNrh89T.png)

5. Змінив на використанна **іменованих плейсхолдерів** для відправлення запиту в базу [Приклад](https://i.imgur.com/X4fSW7S.png)

   - Тут слід звернути увагу, що ми тепер не повинні передавати дані масивом, а просто передаємо змінну `$data` в яку ми записали масив, після валідації даних функцією `validateInputsWithForm`
   - Вже з цієї змінної будуть взяти **іменовані плейсхолдери**

6. Створив функцію `redirect` - призначена для перенаправлення користувача на вказану URL-адресу. Якщо URL-адреса не вказана, користувач буде перенаправлений на попередню сторінку, з якої він прийшов, або на стандартну адресу, визначену константою `PATH`.

   - Якщо параметр `$url` не порожній, він призначається змінній `$redirect`.
   - Якщо параметр `$url` порожній, функція перевіряє наявність значення в глобальному масиві $\_SERVER за ключем HTTP_REFERER. Цей ключ містить URL сторінки, з якої користувач перейшов на поточну сторінку.
   - Якщо `$_SERVER['HTTP_REFERER']` існує, його значення призначається змінній `$redirect`. Якщо ж ні, використовується константа PATH (яка має бути визначена раніше в коді).

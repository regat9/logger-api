## Logger API

Необходимо создать простой API-эндпоинт на PHP с использованием фреймворка Laravel. API-эндпоинт должен предоставлять один маршрут, по которому будет доступна кнопка. При нажатии на эту кнопку должны выполняться следующие действия:

Логирование:
 - Записать информацию о нажатии кнопки в лог-файл с указанием даты и времени события.
 - Запись в базу данных: Сохранить информацию о нажатии кнопки в базе данных. Создайте таблицу в базе данных с полями, например, "id", "timestamp", "user_ip" и "user_agent", чтобы хранить данные о событии.
 - Требования:
 - Используйте PHP и выбранный фреймворк для создания API-эндпоинта.
 - Предоставьте маршрут для доступа к кнопке и обработки нажатия.
 - Обеспечьте логирование события в файл. Используйте стандартные средства логирования фреймворка или выбранной вами библиотеки.
 - Создайте соответствующую таблицу в базе данных и реализуйте механизм записи данных о событии.
 - Обеспечьте безопасность и валидацию данных, особенно в отношении пользовательских данных, таких как IP-адрес и User-Agent.
 - Добавьте возможность просмотра лог-файла и данных в базе данных (например, создайте второй API-маршрут для получения информации о событиях).

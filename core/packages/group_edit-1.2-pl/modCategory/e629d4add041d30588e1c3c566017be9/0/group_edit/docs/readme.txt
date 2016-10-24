
http://www.simpledream.ru/ - Студия "Симпл Дрим"

http://modx-shopkeeper.ru/ - MODX Shopkeeper

=======================================

Group Edit 1.2 pl for MODx Revolution

---

Компонент для группового редактирования ресурсов.

---------------------------------------

Component for group editing of resources.

=======================================

Русский
-------

Настройка

Для настройки компонента перейти "Система" -> "Настройки системы" -> "group_edit" (пространство имен).

Настройки по умолчанию такие:

Название раздела: Новости,Каталог
ID раздела: 1,2
Поля и TV ID для вывода в таблице: pagetitle,alias,publishedon||pagetitle,alias,1,2

Можно делать разные настройки для разных разделов. Т.е. можно, не копируя сам компонент, сделать их несколько.

Например, чтобы сделать дополнительный компонент (в меню "Компоненты") для каталога нужно:

1. Перейти "Система" -> "Действия".

3. В блоке "Верхнее меню" нажать правой кнопкой на пункте "Компоненты" и выбрать "Добавить пункт меню".

4. Заполнить поля:
   Имя: Каталог (как в настройках компонента).
   Действие: group_edit - index.
   Параметры: &type=2 (порядковый номер пункта "Каталог" в конфигурации).
   
5. Пункт "Групповое редактирование ресурсов" (запись в словаре "group_edit") можно переименовать в "Новости", как в настройках компонента.

6. Нажать в меню "Панель". Теперь в разделе меню "Компоненты" вместо одного компонента два: "Новости" и "Каталог".

=======================================

English
-------

Settings

To configure a component go to the "System" -> "System Settings" -> "group_edit" (namespace).

The default settings are:

Parent name: Catalog,News
Parent ID: 1,2
Fields and ID TV for grid: pagetitle,alias,publishedon||pagetitle,alias,1,2

You can make different settings for different sections. Ie can not copy the component itself, make them a multiple.

For example, to make an additional component (in the "Components") for the directory to:

1. Go to "System" -> "Actions".

3. In the "Top Menu" right-click on the "Components" and select "Place action Here"

4. Заполнить поля:
   Lexicon Key: Catalog (as in the component settings).
   Action: group_edit - index.
   Parameters: &type=2 (serial number of the item "Catalog" in the configuration).
   
5. Item "Group editing Resources" (entry in the lexicon "group_edit") can be renamed to "News," as in the component settings.

6. Press in the top menu - "Dashboard". Now in the menu "Components" instead of two components: "News" and "Catalog".



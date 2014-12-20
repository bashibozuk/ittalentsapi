ITTallents Season 3 JavaScript Projects API

Общо описание:

Апито поддържа следните функционалности :
 - листинг на потребители
 - регистрация на потребители
 - логин на потребители
 - смяна на парола на потребители

 - листинг на игри
 - старт на игра
 - край на игра

 За да ползвате АПИ-то за всяка заявка трябва да подавате
 параметър в УРЛ-а X-GameID:<id-то на вашата игра>
 <url>/?X-GameID=<gameId>
 ид-тата са
 101
 102
 103
 104
 105



Actions
----------------------------------------------
1) users - списък на потребители в определена игра
    GET  request
    url - http://ittalentsapi.bashibozuk.eu/users?page=<Number|default: 1>&per-page=<Number|default: 20>&sortField=<Number|default: id>&sortDirection=<Number|default: 4|4 or 3>
    params:
        - page=<Number> - Номер на страница по подразбиране 1
        - per-page - по колко на страница резултата да имате
        - sortField - по кое поле да ви се сортира резултата
        - sortDirection - посока на сортиране - ASC (по подразбиране) - нарастваща, DESC - намаляваща

2) users/register - регистрира потребител за определената игра връща всички данни за новия потребител или грешките при валидация
   url - http://ittalentsapi.bashibozuk.eu/users/register
   POST request

   POST params - 
            username - Потребителско име - уникално за всички игри, т.е. ако има потребителско име регистрирано в една игра,
            не може да се регистрира в друга
        
            email - имейл
        
            password - парола
        
            password_repeat - повотрена парола , трябва да е еднаква с password полето
        
            avatar - аватар на потребителя - url към снимка или base64 encoded стринг
3) users/login - логва потребител за определената игра,  връща всички данни за логнатия потребител или грешките при валидация
   url - http://ittalentsapi.bashibozuk.eu/users/login
   POST request

   POST params -
            username - Потребителско име - уникално за всички игри, т.е. ако има потребителско име регистрирано в една игра,

            password - парола

4)  users/change-password - връща true или обект с грешки
    url - http://ittalentsapi.bashibozuk.eu/users/change-password
    POST request

    POST params -
        email - email на потребителя

        password - парола
        password_repeat - повторена парола

5) game - списък с игри на потребители
    url - http://ittalentsapi.bashibozuk.eu/games?exapand=user&page=<Number|default: 1>&per-page=<Number|default: 20>&sortField=<Number|default: id>&sortDirection=<Number|default: 4|4 or 3>
    params:
     - expand - трябва да е равно на user за да ви даде данните за потребителя
     - page=<Number> - Номер на страница по подразбиране 1
     - per-page - по колко на страница резултата да имате
     - sortField - по кое поле да ви се сортира резултата
     - sortDirection - посока на сортиране - 3(по подразбиране) - нарастваща, 4- намаляваща

6) game/start-game - връща целия обект при съксес , ид-то ви трябва за да приключите играта
    url -http://ittalentsapi.local/game/game-start?user_id=<Number>

7) game/end-game - приключва игра на определен потребител
    url -http://ittalentsapi.local/game/game-end?id=<Number>&score=<Number>
    params:
        - id - id-то на започнатата игра
        - score - точките с които завършва играта

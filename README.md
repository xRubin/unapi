# Unapi
Облегченный набор инструментов для асинхронного парсинга интернетов. Работает на основе промисов _guzzle/promises_ и HTTP клиента _guzzle/guzzle_.

В этом репозитории только общие классы, все остальное доставляется через composer.

### Установка:
composer require unapi/unapi

### Обертки для вcпомогательных сервисов
| Тип сервиса | URL сервиса | Модуль |
| --- | ---| --- |
| Антикапча | http://antigate.com/ | [unapi/anticaptcha-antigate](https://github.com/xRubin/unapi-anticaptcha-antigate) |
| Антикапча | https://2captcha.com/ | [unapi/anticaptcha-2captcha](https://github.com/xRubin/unapi-anticaptcha-2captcha) |
| СМС | http://sms-area.org/ | [unapi/sms-smsarea](https://github.com/xRubin/unapi-sms-smsarea) |

### Парсинг данных
| Тип сервиса | URL сервиса | Модуль |
| --- | ---| --- |
| DaData | https://dadata.ru/ | [unapi/dadata](https://github.com/xRubin/unapi-dadata) |
| DEF Tele2 | https://tele2.ru/ | [unapi/def-tele2](https://github.com/xRubin/unapi-def-tele2) |
| Fake Name Generator | https://www.fakenamegenerator.com/ | [unapi/generator-user](https://github.com/xRubin/unapi-generator-user) |
| GSM Megafon | https://api.megafon.ru/ | [unapi/gsm-megafon](https://github.com/xRubin/unapi-gsm-megafon) |
| Арбитражный суд РФ | http://www.arbitr.ru/ | [unapi/arbitration](https://github.com/xRubin/unapi-arbitration) |
| Росреестр | https://rosreestr.ru/ | [unapi/rosreestr](https://github.com/xRubin/unapi-rosreestr) |
| Федеральная миграционная служба | http://services.fms.gov.ru/ | [unapi/fms](https://github.com/xRubin/unapi-fms) |
| Федеральная налоговая служба | http://nalog.ru/ | [unapi/fns](https://github.com/xRubin/unapi-fns) |
| Федеральная служба судебных приставов | http://fssprus.ru | [unapi/fssp](https://github.com/xRubin/unapi-fssp) |
| Центробанк РФ | http://www.cbr.ru/ | [unapi/cbr](https://github.com/xRubin/unapi-cbr) |

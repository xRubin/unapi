# Unapi
Облегченный набор инструментов для асинхронного парсинга интернетов. Работает на основе промисов _guzzle/promises_ и HTTP клиента _guzzle/guzzle_.

В этом репозитории только ссылки на общие вещи, все остальное доставляется через composer.

### Ядро:
composer require unapi/unapi

### Обертки для вcпомогательных сервисов
| Тип сервиса | URL сервиса | Ссылка |
| --- | ---| --- |
| Антикапча | http://antigate.com/ | [unapi/anticaptcha-antigate](https://github.com/xRubin/unapi-anticaptcha-antigate) |
| СМС | http://sms-area.org/ | [unapi/sms-smsarea](https://github.com/xRubin/unapi-sms-smsarea) |
| Очистка | https://dadata.ru/ | [unapi/dadata](https://github.com/xRubin/unapi-dadata) |

### Парсинг данных
| Тип сервиса | URL сервиса | Ссылка |
| --- | ---| --- |
| ФМС | http://services.fms.gov.ru/ | [unapi/fms](https://github.com/xRubin/unapi-fms) |
| Центробанк РФ | http://www.cbr.ru/ | [unapi/cbr](https://github.com/xRubin/unapi-cbr) |

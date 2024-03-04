Скачать docker.
Связать ваш редактор кода (vs code, phpstorm) со своим акком гитхаба.
Клонировать проект к себе (сменить ветку на master).
Добавить файл .env в папки deploy и mlteam.
// .env
APP_NAME=Laravel

APP_ENV=local

APP_KEY=base64:aNINr0/ZTvByumU0Exc5WTN25zBP88QU71vc6x5f0gA=

APP_DEBUG=true

APP_URL=http://localhost

LOG_CHANNEL=stack

LOG_DEPRECATIONS_CHANNEL=null

LOG_LEVEL=debug

DB_CONNECTION=pgsql

DB_HOST=mlteam-db

DB_PORT=5432

DB_DATABASE=mlteam

DB_USERNAME=mlteam

DB_PASSWORD=mlteam

BROADCAST_DRIVER=log

CACHE_DRIVER=file

FILESYSTEM_DISK=local

QUEUE_CONNECTION=sync

SESSION_DRIVER=file

SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1

REDIS_PASSWORD=null

REDIS_PORT=6379

MAIL_MAILER=smtp

MAIL_HOST=mailpit

MAIL_PORT=1025

MAIL_USERNAME=null

MAIL_PASSWORD=null

MAIL_ENCRYPTION=null

MAIL_FROM_ADDRESS="hello@example.com"

MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=

AWS_SECRET_ACCESS_KEY=

AWS_DEFAULT_REGION=us-east-1

AWS_BUCKET=

AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=

PUSHER_APP_KEY=

PUSHER_APP_SECRET=

PUSHER_HOST=

PUSHER_PORT=443

PUSHER_SCHEME=https

PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"

VITE_PUSHER_HOST="${PUSHER_HOST}"

VITE_PUSHER_PORT="${PUSHER_PORT}"

VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"

VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

UID=1001

GID=1001
//
в консоле вашего редактора перейти к директорию deploy (cd deploy). запустить команду docker-compose up --build. в браузере написать localhost, должен открыть страницу laravel.




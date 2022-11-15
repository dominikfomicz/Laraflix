## Installation

### Clone repo

```bash
git clone https://github.com/dominikfomicz/Laraflix.git
```

### Run docker

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

### Run Laravel Sail

```bash
./vendor/bin/sail up -d
```

### Install dependencies

```bash
./vendor/bin/sail composer install && ./vendor/bin/sail npm i
```

### Build dependencies

```bash
./vendor/bin/sail npm run dev
```

### Run the migrations and seed the database

```bash
./vendor/bin/sail artisan migrate:fresh --seed
```

### Tests

```bash
./vendor/bin/sail artisan test
```

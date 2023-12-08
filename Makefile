build:
	docker build --pull -t adventofcode2023 .

remove:
	docker rmi adventofcode2023

run:
	docker run --rm -it -v $(PWD):/src adventofcode2023 bash

test:
	docker run --rm -it -v $(PWD):/src adventofcode2023 ./vendor/bin/phpunit tests	

composer-install:
	docker run --rm -it -v $(PWD):/src adventofcode2023 composer install	
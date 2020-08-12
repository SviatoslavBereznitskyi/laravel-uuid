# Install the app
install: build dependencies

# Build app container
build:
	docker build -t app .

# Install app dependencies
dependencies:
	docker run --rm -it -v ${PWD}:/app app composer install

# Update app dependencies
update:
	docker run --rm -it -v ${PWD}:/app app composer update

# Show outdated dependencies
outdated:
	docker run --rm -it -v ${PWD}:/app app composer outdated

# Fix code style
fix:
	docker run --rm -it -v ${PWD}:/app app vendor/bin/php-cs-fixer fix

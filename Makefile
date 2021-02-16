# Install the app
install: build dependencies test

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

# Run the testsuite
test:
	docker run --rm -it -v ${PWD}:/app app vendor/bin/phpunit

# Generate a coverage report as text
coverage-text:
	docker run --rm -it -v ${PWD}:/app app vendor/bin/phpunit --coverage-text

# Generate a coverage report as HTML
coverage-html:
	docker run --rm -it -v ${PWD}:/app app vendor/bin/phpunit --coverage-html=tests/report

# Coverage text alias
coverage: coverage-text

# Fix code style
fix:
	docker run --rm -it -v ${PWD}:/app app vendor/bin/php-cs-fixer fix

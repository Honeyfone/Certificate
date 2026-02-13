#!/bin/bash
echo "Building Docker image..."
docker build -t php-cert-gen .

echo "Installing dependencies..."
docker run --rm -v "$(pwd):/var/www/html" php-cert-gen composer install

# Stop any existing container
docker stop cert-app 2>/dev/null || true

echo "Starting server in background..."
docker run -d --rm -p 8000:80 --name cert-app -v "$(pwd):/var/www/html" php-cert-gen

echo "Server running at http://localhost:8000"
echo "To stop the server, run: docker stop cert-app"

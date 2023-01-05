FROM php:7.4.3-fpm

# Install the npm
RUN apt-get update && apt-get upgrade -y &&  \
    apt-get install -y nodejs npm

# Install the ws library
RUN npm install ws

# Copy the PHP code into the container
COPY . /app/
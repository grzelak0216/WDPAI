FROM nginx:1.17.8-alpine

# Copy the public directory
# COPY ./public/ /app/public/
COPY . /app/

# Create a new location block file for the WebSocket server
# RUN echo "location /ws {  \
#     proxy_pass http://websocket:8080;  \
#     proxy_http_version 1.1;  \
#     proxy_set_header Host $host;  \
#     proxy_cache_bypass $http_upgrade; \
#      }" > /etc/nginx/conf.d/websocket.conf

# Copy the nginx config file
COPY ./docker/nginx/nginx.conf /etc/nginx/conf.d/default.conf

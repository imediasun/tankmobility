FROM node:18.0 as build-stage

WORKDIR /app

COPY ./frontend/ /app/

RUN npm install 
RUN npm run build

#Build Files
FROM nginx:1.19.10-alpine
COPY ./docker/etc/react/nginx.conf /etc/nginx/conf.d/default.conf
COPY --from=0 /app/build /usr/share/nginx/html
EXPOSE 3000
CMD ["nginx", "-g", "daemon off;"]

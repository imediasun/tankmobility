FROM node:latest

WORKDIR /app

COPY ./frontend/package*.json ./

RUN npm install -g npm@9.1.1

RUN npm install --force
RUN npm install --save react-bootstrap bootstrap

EXPOSE 3000

CMD ["npm", "run","start"]
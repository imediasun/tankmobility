CREATE USER imediasun WITH PASSWORD 'sunimedia' CREATEDB;
CREATE DATABASE client
    WITH
    OWNER = imediasun
    ENCODING = 'UTF8'
    LC_COLLATE = 'en_US.utf8'
    LC_CTYPE = 'en_US.utf8'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;

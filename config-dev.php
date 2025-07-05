<?php 
# MySQL
const DB_HOST = "localhost";
const DB_NAME = "TI3_2025";
const DB_LOGIN = "root";
const DB_PWD = "";
const DB_PORT = 3306;
const DB_CHARSET = "utf8mb4";

const DB_DSN = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET;


# pour la pagination (BONUS)
const PAGINATION_NB = 8; // nombre d'éléments par page
const PAGINATION_GET = "pg"; // nom de la variable GET pour la pagination
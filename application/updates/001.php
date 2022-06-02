<?php
$this->db->query('CREATE DATABASE IF NOT EXISTS cube_dev');

$this->db->query('use cube_dev');

$this->db->query('DROP TABLE IF EXISTS t_commentaires');
$this->db->query('CREATE TABLE IF NOT EXISTS t_commentaires (
    id_commentaire int(11) auto_increment primary key,
    contenu varchar(500) NOT NULL,
    date_commentaire date NOT NULL,
    id_ressource int(11) NOT NULL,
    id_utilisateur int(11) NOT NULL,
    active int default 1)');

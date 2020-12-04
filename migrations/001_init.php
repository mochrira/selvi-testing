<?php 

return function ($schema, $direction) {

    if($direction == 'up') {
        $schema->create('kontak', [
            'idKontak' => 'INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'nmKontak' => 'VARCHAR(50) DEFAULT NULL'
        ]);
    }

    if($direction == 'down') {
        $schema->drop('kontak');
    }

};
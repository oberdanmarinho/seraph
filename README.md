## Seraph

Teste Dev Oberdan dos Reis marinho

1) Desafio 1 - CRUD       (Concluido)
2) Desafio 2 - API 01     (Concluido)
3) Desafio 3 - Autenticar (Concluido)
4) Desafio 4 - PDF        (Concluido)
5) Desafio 5 - API 02     (Concluido)
6) GitHUB                 (Concluido)
_______________________________________________________________________________________

Para consumir api

Novo
http://localhost/seraph/api/create
{
"name": "",
"office": ""
}

Update
http://localhost/seraph/api/udpate
{
"id": "",
"name": "",
"office": ""
}

delete
http://localhost/seraph/api/delete
{
"id": "",
}

pegar todos
http://localhost/seraph/api/getall

pegar por id
http://localhost/seraph/api/getbyid/{id}

_______________________________________________________________________________________

## Banco de dados: seraph_crud

SQL CREATE TABLE `crud_login` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `login` varchar(15) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `crud_members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `office` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
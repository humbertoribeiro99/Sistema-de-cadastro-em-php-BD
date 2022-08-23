create database projetoDois;

use projetoDois;

CREATE TABLE if not exists usuario (
id_usuario smallint auto_increment primary key,
login varchar(50) not null,
senha varchar(50) not null,
nome varchar(50) not null,
data_nasc date not null
);

create table if not exists videos (
id_video smallint auto_increment primary key,
nome varchar(100)not null,
descricao varchar(200) not null,
data_envio TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
imagem longblob NOT NULL,
id_video_usuario smallint not null,
CONSTRAINT fk_id_usaurio foreign key (id_video_usuario)
REFERENCES usuario (id_usuario)
); 

/* Alterar uma tabela
ALTER TABLE videos
ADD meta varchar(255) not null;
*/

/*Deletar uma linha de uma tabela
DELETE FROM videos
where id_video = 1;
*/

select * from videos;
select * from usuario;

/*drop database projetoDois;